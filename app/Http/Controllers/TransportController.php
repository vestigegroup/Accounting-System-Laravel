<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use AccountSystem\Model\Project;
use AccountSystem\Model\Rasxod;
use AccountSystem\Model\RasxodPhoto;

class TransportController extends Controller
{
    public function __construct() {
        $this->middleware('admin.auth');
        $this->rasxodi = Rasxod::where('rasxod_type', '3')->with('photos')->orderBy('created_at', 'desc')->paginate(15);
    }

    public function index(Request $request){

        $project_id = $request->project_id;

        $project = Project::find($project_id);

        if($project) {
            $rasxodi = Rasxod::where(['rasxod_type' => '3', 'project_id' => $project_id])->with('photos')->where('project_id', $project_id)->orderBy('created_at', 'desc')->paginate(15);;

            return view('transport.home', [
                'url'           => $project_id.'/rasxodi/transports/printtransport',
                'fa'            => 'fa-car',
                'title'         => 'ТРАНСПОРТ',
                'rasxodi'       => $rasxodi,
                'project_id'    => $project_id
            ]);
        } else {
            return redirect('home');
        }
    }

    // Add transport 
    public function addtransport(Request $request) {
        if ($request->isMethod('post')) {
            $all_info = $request->all();

            $validator = Validator::make($request->all(), [
                'name'           => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back();
            }

            try {
                $rasxod = new Rasxod();

                $rasxod->project_id     = $request->project_id;
                $rasxod->rasxod_type    = 3;
                $rasxod->name           = $request->name;

                $ress                   = $request->reys;
                $senna                  = $request->sena;

                $summa = $ress * $senna; 

                $rasxod->res            = $ress; 
                $rasxod->narx           = $senna; 
                $rasxod->summa          = $summa;


                $rasxod->data           = ($request->data) ? $request->data : date('Y-m-d');
                $rasxod->comments       = ($request->comments) ? $request->comments : NULL;

                $rasxod->save();

                $photopath = "";
                if ($request->hasFile('photos')) {

                    $destinationpath    = 'images/rasxodi';

                    $imagefile  = $request->photos;
                    foreach ($imagefile as $imageone) {
                        $rasxodphoto = new RasxodPhoto();

                        $extension = $imageone->getClientOriginalExtension();
                        $fileName  = str_random(10).'.'.$extension;
                        $imageone->move($destinationpath, $fileName); 
                        $photopath = $fileName;

                        $rasxodphoto->photo_path = $photopath;
                        $rasxod->photos()->save($rasxodphoto);
                        $photopath = "";
                    }
                }

                return redirect()->back()
                    ->with('message', 'Добавлено успешно!!');


            } catch (Exception $e) {
                // Back to form with errors
                return redirect()->back()
                    ->withErrors( $e->getErrors() );
            }
        } 
        return redirect()->back();
    }

    // Delete transport
    public function deletetransport(Request $request) {
        if ($request->ajax()) {
            // get request ID
            $id_rasxod = $request->id;
            if ($id_rasxod) {
                // Search categories from database
                try {
                    $rasxod = Rasxod::find($id_rasxod);
                    if ($rasxod) {
                        foreach ($rasxod->photos as  $photo) {
                            $path = public_path('images/rasxodi/'.$photo->photo_path);
                            unlink($path);
                        }

                        $result  = $rasxod->delete();

                        if ($result) {
                            return response()->json(['success', $id_rasxod]);
                        } else {
                            return response()->json('error');
                        }
                    } else {
                        return response()->json('error');
                    }
                } catch (Exception $e) {
                    return response()->json('error', $e);
                }
            }
        } else {
            return redirect()->back();
        }
    }

    // Edit zarplata
    public function edittransport(Request $request) {
        if ($request->isMethod('post')) {
            $all_info = $request->all();

            $validator = Validator::make($request->all(), [
                'zarplata_id'   => 'required',
                'edit_name'     => 'required',
                'edit_data'     => 'required',
                'edit_summa'    => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back();
            }

            try {

                $rasxod = Rasxod::findorFail($request->zarplata_id);

                $rasxod->rasxod_type    = 3; 
                $rasxod->name           = $request->edit_name;
                $rasxod->summa          = $request->edit_summa;
                $rasxod->data           = ($request->edit_data) ? $request->edit_data : NULL;
                $rasxod->comments       = ($request->edit_comments) ? $request->edit_comments : NULL;

                $rasxod->update();

                return redirect()->back()
                    ->with('message', 'Отредактировано успешно!!');

            } catch (Exception $e) {
                // Back to form with errors
                return redirect()->back()
                    ->withErrors( $e->getErrors() );
            }
        } else {
            return redirect()->back();
        }
    }

    // Print transport
    public function printtransport(Request $request) {

        if ($request->isMethod('get')) {

            $project_id = $request->project_id;

            $project = Project::find($project_id);

            if ($project) {

                $period_starts_at   = $request->from_data;
                $period_ends_at     = $request->to_data;

                if ($period_starts_at == NULL ) {
                    $period_starts_at = "2000-00-00";
                }

                if ($period_ends_at == NULL ) {
                    $period_ends_at = date('Y-m-d');
                }

                $zarplatarasxods = Rasxod::where(['rasxod_type' => '3', 'project_id' => $project_id])->where('project_id', $project_id)->whereBetween('data', [$period_starts_at, $period_ends_at])->orderBy('created_at', 'desc')->get();

                return view('pdfjquery', [
                    'title'             => 'ТРАНСПОРТ Расходи',
                    'urlprint'          => $project_id.'/rasxodi/transports/printtransport',
                    'zarplatarasxods'   => $zarplatarasxods
                ]);
            }

            return redirect('home');
        }
    }
}
