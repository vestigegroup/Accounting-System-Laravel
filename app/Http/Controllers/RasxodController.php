<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use AccountSystem\Model\Project;
use AccountSystem\Model\Rasxod;
use AccountSystem\Model\RasxodPhoto;

class RasxodController extends Controller
{
    public function __construct() {
        $this->middleware('admin.auth');
    }

    public function index(Request $request){

        $project_id = $request->project_id;

        $project = Project::find($project_id);

        if ($project) {
            $rasxodi = Rasxod::with('photos')->where('project_id', $project_id)->orderBy('created_at', 'desc')->paginate(15);

            return view('rasxodi', [
                'url'           => $project_id.'/rasxodi/printzarplata',
                'fa'            => 'fa-arrow-up',
                'title'         => 'Расходы',
                'rasxodi'       =>  $rasxodi,
                'project_id'    =>  $project_id
            ]);
        } else {
            return redirect('home');
        }
    }

    // Delete zarplata
    public function deletezarplata(Request $request) {
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
            return redirect('rasxodi');
        }
    }

    // Edit zarplata
    public function editzarplata(Request $request) {
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

                // $rasxod->rasxod_type    = 1; 
                $rasxod->name           = $request->edit_name;
                $rasxod->summa          = $request->edit_summa;
                $rasxod->data           = ($request->edit_data) ? $request->edit_data : NULL;
                $rasxod->comments       = ($request->edit_comments) ? $request->edit_comments : NULL;

                $rasxod->update();

                return redirect()->back()->with('message', 'Отредактировано успешно!!');

            } catch (Exception $e) {
                // Back to form with errors
                return redirect()->back()
                    ->withErrors( $e->getErrors() );
            }
        } else {
            return redirect()->back();
        }
    }

    // Print Zarplata
    public function printzarplata(Request $request) {
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

                $zarplatarasxods = Rasxod::where('project_id', $project_id)->whereBetween('data', [$period_starts_at, $period_ends_at])->orderBy('created_at', 'desc')->get();

                return view('pdfjquery', [
                    'title'             => 'Расходи',
                    'urlprint'          => $project_id.'/rasxodi/printzarplata',
                    'zarplatarasxods'   => $zarplatarasxods
                ]);
            } else {
                return redirect('home');
            }
        }
    }
}
