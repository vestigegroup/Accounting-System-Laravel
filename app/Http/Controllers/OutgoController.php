<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;
use Carbon\Carbon;

use AccountSystem\Model\Outgo;
use AccountSystem\Model\Income;
use AccountSystem\Model\Sotrudniki;
use AccountSystem\Model\Partner;
use AccountSystem\Model\IncomesOutgos;

class OutgoController extends Controller
{

    //
    public function __construct() {
        $this->middleware('admin.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outgo = Outgo::orderBy('created_at', 'desc')->limit('50')->get();

        return view('outgo.index', [
            'fa'                => 'fa fa-arrow-up fa-fw',
            'title'             => 'Расход',
            'addurl'            => 'outgo.create',
            'savedata'          => '',
            'print'             => 'outgo.printpdf',
            'goback'            => '',
            'outgos'            => $outgo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $incomes    = Income::get(['id', 'company_name','customer_name']);
        $sotrudniki = Sotrudniki::get(['id', 'imja_sotrudnika']);
        $partner = Partner::get(['id', 'nazivaniye_firma', 'marketolog']);

        return view('outgo.create', [
            'fa'                => 'fa fa-arrow-up fa-fw',
            'title'             => 'Расход',
            'addurl'            => '',
            'savedata'          => 'form-rasxodi',
            'print'             => '',
            'goback'            => 'yes',
            'incomes'           => $incomes,
            'sotrudniki'        => $sotrudniki,
            'partners'          => $partner
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outgo_arr = explode('|', $request->rasxod_type);

        $this->validate($request, [

        ]);

        $outgo = Outgo::create([
            'ispolnitelni'      => $request->ispolnitelni,
            'summa'             => $request->summa,
            'data'              => $request->data,
            'naimenovanie'      => $request->naimenovanie,
            'ed_izm'            => $request->ed_izm,
            'kol_vo'            => $request->kol_vo,
            'sena'              => $request->sena,
            'obwiya'            => $request->obwiya,
            'tip_id'            => $outgo_arr[0],
            'tip_type_id'       => $outgo_arr[1],
            'tip_name'          => $outgo_arr[2],
            'ispolnitelni'      => $request->ispolnitelni,
            'month'             => Carbon::now()->month
        ]);
        
        if ($request->obwiya>=0) {
            $outgosum = IncomesOutgos::where('daily', '=', Carbon::now()->format('Y-m-d'))->first();

            if ($outgosum) {
                $outgosum->outgos_sum_daily = $outgosum->outgos_sum_daily + $request->obwiya;

                $outgosum->update();
            } else {
                IncomesOutgos::create([
                    'daily' => Carbon::now()->format('Y-m-d'),
                    'incomes_sum_daily' => 0,
                    'outgos_sum_daily'  => $request->obwiya
                ]);
            }
        }

        if ($outgo) {
            alert()->success('Успешно', '')->autoClose(4000);
            return redirect()->route('outgo.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('outgo.outgo', [
            'fa'                => 'fa fa-arrow-up fa-fw',
            'title'             => 'Расход',
            'addurl'            => 'outgo.create',
            'savedata'          => '',
            'print'             => 'outgo.printpdf',
            'goback'            => ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $outgo = Outgo::findOrFail($id);

            $incomes    = Income::get(['id', 'company_name','customer_name']);
            $sotrudniki = Sotrudniki::get(['id', 'imja_sotrudnika']);
            $partner = Partner::get(['id', 'nazivaniye_firma', 'marketolog']);

            $params = [
                'fa'                => 'fa fa-arrow-down fa-fw',
                'title'             => 'Расход',
                'addurl'            => '',
                'savedata'          => 'outgoupdate',
                'print'             => '',
                'goback'            => 'yes',
                'outgo'             => $outgo,
                'incomes'           => $incomes,
                'sotrudniki'        => $sotrudniki,
                'partners'          => $partner
            ];

            return view('outgo.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('shared.'.'error');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $outgo = Outgo::findOrFail($id);

            $outgo_arr = explode('|', $request->rasxod_type);

            if ($request->obwiya>=0) {
                $outgosum = IncomesOutgos::where('daily', '=', Carbon::parse($outgo->created_at)->format('Y-m-d'))->first();

                if ($outgosum) {
                    $outgosum->outgos_sum_daily = $outgosum->outgos_sum_daily - $outgo->obwiya + $request->obwiya;

                    $outgosum->update();
                }
            }

            $outgo->update([
                'ispolnitelni'      => $request->ispolnitelni,
                'summa'             => $request->summa,
                'data'              => $request->data,
                'naimenovanie'      => $request->naimenovanie,
                'ed_izm'            => $request->ed_izm,
                'kol_vo'            => $request->kol_vo,
                'sena'              => $request->sena,
                'obwiya'            => $request->obwiya,
                'tip_id'            => $outgo_arr[0],
                'tip_type_id'       => $outgo_arr[1],
                'tip_name'          => $outgo_arr[2],
                'ispolnitelni'      => $request->ispolnitelni,
                'month'             => Carbon::now()->month
            ]);

            alert()->success('Успешно', '')->autoClose(4000);

            return redirect()->route('outgo.index');
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('shared.'.'error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return response()->route('home');
    }

    public function deleteAjax(Request $request) {
        if ($request->ajax()) {
            // get request ID
            $outgo = $request->id;
            if ($outgo) {
                // Search it from database
                try {
                    $outgo_data = Outgo::find($outgo);
                    if ($outgo_data) {

                        $tocarbon = new Carbon($outgo_data->created_at);

                        $outgotosum = IncomesOutgos::where('daily', '=', $tocarbon)->first();
                    
                        $outgotosum->outgos_sum_daily = $outgotosum->outgos_sum_daily - $outgo_data->obwiya;

                        $outgotosum->update();

                        $result  = $outgo_data->delete();

                        if ($result) {
                            return response()->json(['success', $outgo]);
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
            return redirect()->route('outgo.index');
        }
    }

    public function printpdf(Request $request)
    {
        if ($request->isMethod('get')) {

            $period_starts    = $request->from_data;

            $period_ends     = $request->to_data;
            // $period_ends_at  = $period_ends->format('Y-m-d H:i:s');

            if ($period_starts == NULL ) {
                $period_starts_at   = date_create("2000-00-00");
                $period_starts_at   = $period_starts_at->format('Y-m-d H:i:s');
            } else {
                $period_starts_at   = date_create($period_starts);
                $period_starts_at   = $period_starts_at->format('Y-m-d H:i:s');
            }

            if ($period_ends == NULL ) {
                $period_ends_at   = date_create(now());
                $period_ends_at   = $period_ends_at->format('Y-m-d H:i:s');
            } else {
                $period_ends_at   = date_create($period_ends);
                $period_ends_at   = $period_ends_at->format('Y-m-d H:i:s');
            }

            $outgo = Outgo::whereBetween( 'created_at', [$period_starts_at, $period_ends_at])->orderBy('created_at', 'desc')->get();

            return view('outgo.pdf', [
                'title'     => 'Sample',
                'outgos'    => $outgo
            ]);

        } else {
            return redirect('outgo');
        }
    }
}
