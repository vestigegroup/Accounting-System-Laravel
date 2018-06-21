<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('income.index', [
            'fa'                => 'fa fa-arrow-down fa-fw',
            'title'             => 'Income',
            'addurl'            => 'income.create',
            'savedata'          => '',
            'print'             => 'printpage',
            'goback'            => ''
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
            'title'             => 'Income',
            'addurl'            => '',
            'savedata'          => 'income.store',
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
