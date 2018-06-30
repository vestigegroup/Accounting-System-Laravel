<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;

use AccountSystem\Model\Outgo;

class OutgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outgo = Outgo::orderBy('created_at', 'desc')->limit('50')->get();

        //
        return view('outgo.index', [
            'fa'                => 'fa fa-arrow-up fa-fw',
            'title'             => 'Расход',
            'addurl'            => 'outgo.create',
            'savedata'          => '',
            'print'             => '',
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
        return view('outgo.create', [
            'fa'                => 'fa fa-arrow-up fa-fw',
            'title'             => 'Расход',
            'addurl'            => '',
            'savedata'          => 'form-rasxodi',
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

        $outgo = Outgo::create($request->all());
        
        if ($outgo) {
            alert()->success('Расход ', 'Создана Успешно.')->autoClose(4000);
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

            $params = [
                'fa'                => 'fa fa-arrow-down fa-fw',
                'title'             => 'Расход',
                'addurl'            => '',
                'savedata'          => 'outgoupdate',
                'print'             => '',
                'goback'            => 'yes',
                'outgo'            => $outgo
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
        //
         try
        {
            $outgo = Outgo::findOrFail($id);

            $outgo->update($request->all());

            alert()->success('Outgo Updated', 'Successfully')->autoClose(5000);

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
}
