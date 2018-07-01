<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;

use AccountSystem\Model\Dolgi;
use AccountSystem\Model\Income;


class DolgiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $income = Income::where('ostotok', '0')->with('dolgiData')->orderBy('created_at', 'desc')->paginate(15);
        $incomes = Income::where('ostotok', '>', '0')->with('dolgiData')->get();

        return view('dolgi.index', [
            'fa'                => 'fa fa-usd fa-fw',
            'title'             => 'Долги',
            'addurl'            => '',
            'savedata'          => '',
            'print'             => '',
            'goback'            => '',
            'incomes'            => $incomes
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->id) {
            
            $income = Income::findOrFail($request->id);

            $sum = $income->ostotok  - $request->summa;

            $income->ostotok = $sum;

            $income->update();

            // Dolgi
            $dolgi  = new Dolgi();

            $dolgi->income_id               = $request->id;
            $dolgi->naimenovanie_klienty    = $request->customer_name;
            $dolgi->data_dolgi              = $request->data;
            $dolgi->summa                   = $request->summa;

            $dolgi->save();

            alert()->success('Dolgi ', 'Создана Успешно.')->autoClose(4000);

            return redirect()->route('dolgi.index'); 
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }
}
