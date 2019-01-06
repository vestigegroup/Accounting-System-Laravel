<?php

namespace AccountSystem\Http\Controllers;

use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use AccountSystem\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use AccountSystem\Model\Admin;
use AccountSystem\Model\Income;
use AccountSystem\Model\Outgo;
use AccountSystem\Model\Plan;
use AccountSystem\Model\Dolgi;
use AccountSystem\Model\IncomesOutgos;
use AccountSystem\Model\Setting;


class HomeController extends Controller
{
    //
    public function __construct() {
        $this->middleware('admin.auth');
    }

    public function index() {
        $income     = Income::groupBy('month')->orderBy('month', 'desc')->sum('oplachno');
        $outgo      = Outgo::groupBy('month')->orderBy('month', 'desc')->sum('obwiya');
        $plan       = Plan::groupBy('month')->orderBy('month', 'desc')->sum('total');
        $dolgi      = Income::groupBy('month')->orderBy('month', 'desc')->sum('ostotok');

        return view('home', [
            'fa'                => 'fa fa-calculator',
            'title'             => 'Система',
            'addurl'            => '',
            'savedata'          => '',
            'print'             => '',
            'goback'            => '',
            'income'            => $income,
            'outgo'             => $outgo,
            'plan'              => $plan,
            'dolgi'             => $dolgi
        ]);
    }

    public function  getAllDataJson(Request $request) {
        if ($request->ajax()) {
            $datatabe = IncomesOutgos::limit(15)->get();

            if ($datatabe) {
                return response()->json(['success',$datatabe]);
            } else {
                return response()->json(['error']);
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function getprixodiJson(Request $request) {
        if ($request->ajax()) {
            $income     = Income::groupBy('month')->orderBy('month', 'desc')->sum('oplachno');

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

    public function deletemonthlydata(Request $request){

        $passwd = Setting::where('password', $request->password)->get();

        if (count($passwd)>0) {
            (new IncomesOutgos)->newQuery()->delete();
            (new Dolgi)->newQuery()->delete();
            (new Income)->newQuery()->delete();
            (new Outgo)->newQuery()->delete();
            (new Plan)->newQuery()->delete();
            alert()->success('All data Successfully Deleted', 'Successfully')->autoClose(4000);
            return redirect()->route('home');
        } else {
            alert()->success('Password wrong try Again', 'Error')->autoClose(4000);
            return redirect()->route('home');
        }
    }
}
