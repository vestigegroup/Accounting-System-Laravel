<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use AccountSystem\Model\Prixod;
use AccountSystem\Model\PrixodPhoto;

class KarzPrixodController extends Controller
{
   	public function __construct() {
        $this->middleware('admin.auth');
    }

    public function index(Request $request){

        $prixodi = Prixod::where('prixod_type', '2')->with('photos')->orderBy('created_at', 'desc')->paginate(15);;

        return view('karzprixodi.home', [
            'url'           => '/prixodi/karz/printprixodi',
            'fa'            => 'fa-money',
            'title'         => 'Karz ПРИХОД',
            'prixodi'       => $prixodi,
        ]);
    }

    // Add karz prixodi 
    public function addkarzprixodi(Request $request) {
        if ($request->isMethod('post')) {
            $all_info = $request->all();

            $validator = Validator::make($request->all(), [
                'name'           => 'required',
                'summa'          => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back();
            }

            try {
                $prixod = new Prixod();

                $prixod->prixod_type    = 2;
                $prixod->name           = $request->name;
                $prixod->summa          = $request->summa;
                $prixod->data           = ($request->data) ? $request->data : date('Y-m-d');
                $prixod->comments       = ($request->comments) ? $request->comments : NULL;

                $prixod->save();

                $photopath = "";
                if ($request->hasFile('photos')) {

                    $destinationpath    = 'images/prixodi';

                    $imagefile  = $request->photos;
                    foreach ($imagefile as $imageone) {
                        $prixodiphoto = new PrixodPhoto();

                        $extension = $imageone->getClientOriginalExtension();
                        $fileName  = str_random(10).'.'.$extension;
                        $imageone->move($destinationpath, $fileName); 
                        $photopath = $fileName;

                        $prixodiphoto->photo_path = $photopath;
                        $prixod->photos()->save($prixodiphoto);
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
        return redirect('prixodi/karz');
    }

    // Print prixodi
    public function printprixodi(Request $request) {
        if ($request->isMethod('get')) {

            $period_starts_at   = $request->from_data;
            $period_ends_at     = $request->to_data;

            if ($period_starts_at == NULL ) {
                $period_starts_at = "2000-00-00";
            }

            if ($period_ends_at == NULL ) {
                $period_ends_at = date('Y-m-d');
            }

            $prixodi = Prixod::where('prixod_type', '2')->whereBetween('data', [$period_starts_at, $period_ends_at])->orderBy('created_at', 'desc')->get();

            return view('karzprixodi.pdfjquery', [
                'title'     => 'ПРИХОД',
                'urlprint'  => '/prixodi/karz/printprixodi',
                'prixodi'   => $prixodi
            ]);
        }
    }
}
