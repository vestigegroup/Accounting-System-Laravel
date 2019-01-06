<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;
use Carbon\Carbon;
use DB;

use AccountSystem\Model\Income;
// use AccountSystem\Model\Outgo;
use AccountSystem\Model\IncomesOutgos;

class IncomesController extends Controller
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
        // 
        $income = Income::with('getObshiye')->orderBy('created_at', 'desc')->limit('50')->get();
        return view('income.index', [
            'fa'                => 'fa fa-arrow-down fa-fw',
            'title'             => 'Приход',
            'addurl'            => 'income.create',
            'savedata'          => '',
            'print'             => 'income.printpdf',
            'goback'            => '',
            'incomes'            => $income
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
        return view('income.create', [
            'fa'                => 'fa fa-arrow-down fa-fw',
            'title'             => 'Приход',
            'addurl'            => '',
            'savedata'          => 'form-prixodi',
            'print'             => '',
            'goback'            => 'yes',
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
        // TODO
        $this->validate($request, [

        ]);

        $income = Income::create([
            'customer_name'     => $request->customer_name,
            'company_name'      => $request->company_name,
            'type_of_zakaz'     => $request->type_of_zakaz,
            'zakaz'             => $request->zakaz,
            'kolvo'             => $request->kolvo,
            'stoimost_zakaz'    => $request->stoimost_zakaz,
            'sena_zakaz'        => $request->sena_zakaz,
            'obshiye_summa'     => $request->obshiye_summa,
            'oplachno'          => $request->oplachno,
            'ostotok'           => $request->ostotok,
            'zametka'           => $request->zametka,
            'srok'              => $request->srok,
            'month'             => (integer)Carbon::now()->month
        ]);

        if ($request->obshiye_summa>=0) {
            $incomestosum = IncomesOutgos::where('daily', '=', Carbon::now()->format('Y-m-d'))->first();

            if ($incomestosum) {
                $incomestosum->incomes_sum_daily = $incomestosum->incomes_sum_daily + $request->obshiye_summa;

                $incomestosum->update();
            } else {
                IncomesOutgos::create([
                    'daily' => Carbon::now()->format('Y-m-d'),
                    'incomes_sum_daily' => $request->obshiye_summa,
                    'outgos_sum_daily'  => 0
                ]);
            }
        }

        if ($income) {
            alert()->success('Успешно', '')->autoClose(4000);
            return redirect()->route('income.index');
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
        return view('income.income', [
            'fa'                => 'fa fa-arrow-down fa-fw',
            'title'             => 'Приход',
            'addurl'            => '',
            'savedata'          => '',
            'print'             => '',
            'goback'            => 'yes',
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
            $income = Income::findOrFail($id);

            $params = [
                'fa'                => 'fa fa-arrow-down fa-fw',
                'title'             => 'Приход',
                'addurl'            => '',
                'savedata'          => 'update-prixodi',
                'print'             => '',
                'goback'            => 'yes',
                'income'            => $income
            ];

            return view('income.edit')->with($params);
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
            $income = Income::findOrFail($id);

            if ($request->obshiye_summa>=0) {
                $incomestosum = IncomesOutgos::where('daily', '=', Carbon::parse($income->created_at)->format('Y-m-d'))->first();

                if ($incomestosum) {
                    $incomestosum->incomes_sum_daily = $incomestosum->incomes_sum_daily + $request->obshiye_summa - $income->obshiye_summa;

                    $incomestosum->update();
                }
            }

            $income->update($request->all());

            alert()->success('Успешно', '')->autoClose(4000);

            return redirect()->route('income.index');
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
        return response()->route('home');
    }

    public function deleteAjax(Request $request) {
        if ($request->ajax()) {
            // get request ID
            $income = $request->id;
            if ($income) {
                // Search it from database
                try {
                    $income_data = Income::find($income);
                    if ($income_data) {

                        $tocarbon = new Carbon($income_data->created_at);

                        $incomestosum = IncomesOutgos::where('daily', '=', $tocarbon)->first();
                    
                        $incomestosum->incomes_sum_daily = $incomestosum->incomes_sum_daily - $income_data->obshiye_summa;

                        $incomestosum->update();

                        $result  = $income_data->delete();

                        if ($result) {
                            return response()->json(['success', $income]);
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
            return redirect()->route('income.index');
        }
    }

    public function printIncome(Request $request)
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

            $income = Income::whereBetween( 'created_at', [$period_starts_at, $period_ends_at])->orderBy('created_at', 'desc')->get();

            return view('income.pdf', [
                'title'     => 'Sample',
                'incomes'    => $income
            ]);

        } else {
            return redirect('income');
        }
    }
}
