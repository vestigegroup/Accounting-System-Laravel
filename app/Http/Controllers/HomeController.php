<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use AccountSystem\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use AccountSystem\Model\Admin;
use Alert;


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

        return view('home', [
            'fa'                => 'fa fa-user',
            'title'             => 'Account System',
            'addurl'            => '',
            'savedata'          => '',
            'print'             => '',
            'goback'            => ''
        ]);
    }

    // public function getrasxodasJson(Request $request) {
    //     if ($request->ajax()) {
    //         if ($request->id) {
    //             $result   = Rasxod::orderBy('created_at', 'desc')->where('project_id', $request->id)->limit(30)->get(['summa', 'data']);

    //             if ($result) {
    //                 return response()->json(['success', $result]);
    //             } else {
    //                 return response()->json('error');
    //             }
    //         }
    //     }
    // }
}
