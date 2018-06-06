<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use AccountSystem\Model\Prixod;
use AccountSystem\Model\PrixodPhoto;

class PrixodController extends Controller
{
    public function __construct() {
        $this->middleware('admin.auth');
    }

    public function index(Request $request){

        $prixodi = Prixod::with('photos')->orderBy('created_at', 'desc')->paginate(15);;

        return view('prixodi', [
            'url'           => 'prixodi/printprixodi',
            'fa'            => 'fa-arrow-down',
            'title'         => 'ПРИХОД',
            'prixodi'       => $prixodi
        ]);
    }

    // Delete prixod
    public function deleteprixodi(Request $request) {
        if ($request->ajax()) {
            // get request ID
            $id_prixod = $request->id;
            if ($id_prixod) {
                // Search categories from database
                try {
                    $prixod = Prixod::find($id_prixod);
                    if ($prixod) {
                        foreach ($prixod->photos as  $photo) {
                            $path = public_path('images/prixodi/'.$photo->photo_path);
                            unlink($path);
                        }

                        $result  = $prixod->delete();

                        if ($result) {
                            return response()->json(['success', $id_prixod]);
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

    // Print prixodi
    public function printprixodi(Request $request) {
        if ($request->isMethod('get')) {

            $project_id = $request->project_id;


            $period_starts_at   = $request->from_data;
            $period_ends_at     = $request->to_data;

            if ($period_starts_at == NULL ) {
                $period_starts_at = "2000-00-00";
            }

            if ($period_ends_at == NULL ) {
                $period_ends_at = date('Y-m-d');
            }

            $prixodi = Prixod::whereBetween('data', [$period_starts_at, $period_ends_at])->orderBy('created_at', 'desc')->get();

            return view('pdfjqueryprixodi', [
                'title'     => 'ПРИХОД',
                'urlprint'  => '/prixodi/printprixodi',
                'prixodi'   => $prixodi
            ]);

            return redirect('home');
        }
    }

    // Edit Prixodi
    public function editprixodi(Request $request) {
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

                $prixodi = Prixod::findorFail($request->zarplata_id);

                $prixodi->name           = $request->edit_name;
                $prixodi->summa          = $request->edit_summa;
                $prixodi->data           = ($request->edit_data) ? $request->edit_data : NULL;
                $prixodi->comments       = ($request->edit_comments) ? $request->edit_comments : NULL;

                $prixodi->update();

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
}
