<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;


use DateTime;

use AccountSystem\Model\Income;

class ProsrochnieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $incomes = Income::all();

       foreach ($incomes as $income) {
            
            $today = date('Y-m-d');

            $end = new DateTime($today);

            $data_income = new DateTime($income->srok);

            $intervals = $data_income->diff($end);

            
            echo "today:".$today."---------";
            echo "<br>";
            echo "srok:".$income->srok;
        

            echo "<br>";

            $days =  $intervals->format("%d");

            echo $days;

            // echo "<hr>";
            

            

            // $data_income = $income->srok;

            // $data_diff = $today->diff($data_income);

            // echo $data_diff;

            // echo "<br>";

            // $a =  date_diff($today, $data_income);

            // echo $a;
            echo "<hr>";
       }

       die();

               


        //
        return view('prosrochniye.index', [
            'fa'                => 'fa fa-exclamation-triangle fa-fw',
            'title'             => 'Просрочние',
            'addurl'            => 'sotrudniki.create',
            'savedata'          => '',
            'print'             => '',
            'goback'            => '',
            // 'sotrudnikis'       => $sotrudniki
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
        //
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
