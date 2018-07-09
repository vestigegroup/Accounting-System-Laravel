<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use AccountSystem\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use AccountSystem\Model\Admin;
use Alert;

use AccountSystem\Model\Income;
use AccountSystem\Model\Outgo;


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

        // $poslednirasxodi    = Outgo::orderBy('created_at', 'desc')->first();
        // $obwiyerasxodi      = Income::sum('summa');

        // $posledniprixodi    = Prixod::orderBy('created_at', 'desc')->first();
        // $obwiyeprixodi      = Prixod::sum('summa');

        // $ostatok            = $obwiyeprixodi - $obwiyerasxodi;



        return view('home', [
            'fa'                => 'fa fa-user',
            'title'             => 'Account System',
            'addurl'            => '',
            'savedata'          => '',
            'print'             => '',
            'goback'            => ''
        ]);
    }

    public function getprixodiJson(Request $request) {
        if ($request->ajax()) {
            
            $income   = Income::groupBy('created_at')->limit(30)->get(['created_at', 'obshiye_summa']);

            if ($income) {
                return response()->json(['success', $income]);
            } else {
                return response()->json('error');
            }
        }
    }

    public function getrasxodasJson(Request $request) {
        if ($request->ajax()) {

            $outgo   = Outgo::groupBy('created_at')->limit(30)->get(['created_at', 'obwiya']);

            if ($outgo) {
                return response()->json(['success', $outgo]);
            } else {
                return response()->json('error');
            }
        }
    }
}
