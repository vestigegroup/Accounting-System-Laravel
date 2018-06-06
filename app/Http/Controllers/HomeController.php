<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use AccountSystem\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use AccountSystem\Model\Admin;

use AccountSystem\Model\Project;
use AccountSystem\Model\Prixod;
use AccountSystem\Model\Rasxod;


class HomeController extends Controller
{
    //
    public function __construct() {
        $this->middleware('admin.auth');
    }

    public function initialize() {
        //
    }

    public function index() {
        $projects           = Project::with('rasxod')->get();

        $poslednirasxodi    = Rasxod::orderBy('created_at', 'desc')->first();
        $obwiyerasxodi      = Rasxod::sum('summa');

        $posledniprixodi    = Prixod::orderBy('created_at', 'desc')->first();
        $obwiyeprixodi      = Prixod::sum('summa');

        $ostatok            = $obwiyeprixodi - $obwiyerasxodi;

        return view('home', [
            'fa'                => 'fa fa-user',
            'title'             => 'Account System',
            'projects'          => $projects,
            'obwiyerasxodi'     => $obwiyerasxodi,
            'poslednirasxodi'   => $poslednirasxodi,
            'posledniprixodi'   => $posledniprixodi,
            'ostatok'           => $ostatok,
        ]);
    }

    public function getrasxodasJson(Request $request) {
        if ($request->ajax()) {
            if ($request->id) {
                $result   = Rasxod::orderBy('created_at', 'desc')->where('project_id', $request->id)->limit(30)->get(['summa', 'data']);

                if ($result) {
                    return response()->json(['success', $result]);
                } else {
                    return response()->json('error');
                }
            }
        }
    }
}
