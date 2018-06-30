<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;

use AccountSystem\Model\Sotrudniki;

class SotrudnikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sotrudniki = Sotrudniki::get();

        //
        return view('sotrudniki.index', [
            'fa'                => 'fa fa-user fa-fw',
            'title'             => 'Сотрудники',
            'addurl'            => 'sotrudniki.create',
            'savedata'          => '',
            'print'             => '',
            'goback'            => '',
            'sotrudnikis'       => $sotrudniki
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
        return view('sotrudniki.create', [
            'fa'                => 'fa fa-user fa-fw',
            'title'             => 'Сотрудники',
            'addurl'            => '',
            'savedata'          => 'sotrudnikiform',
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

        $sotrudniki = new Sotrudniki();

                
        $sotrudniki->imja_sotrudnika            = $request->imja_sotrudnika;
        $sotrudniki->data_rojdeniya             = $request->data_rojdeniya;
        $sotrudniki->mesto_rojdeniya            = $request->mesto_rojdeniya;
        $sotrudniki->telefon                    = $request->telefon;
        $sotrudniki->zarplata                   = $request->zarplata;
        $sotrudniki->doljnost                   = $request->doljnost;

        if ($request->photo_path) {
            // Profile photo
            $photopath = "";
            if ($request->hasFile('photo_path')) {
                $destinationpath    = 'images/sotrudniki';
                $imagefile          = $request->photo_path;                    
                $extension          = $imagefile->getClientOriginalExtension();
                $fileName           = str_slug(str_random(20)).'.'.$extension;

                $imagefile->move($destinationpath, $fileName); 
                $photopath = $destinationpath.'/'.$fileName;
            }
        }

        $sotrudniki->photo_path = $photopath;

        $sotrudniki->save();

    
        alert()->success('Сотрудники ', 'Создана Успешно.')->autoClose(4000);
        return redirect()->route('sotrudniki.index');

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
        try
        {
            $sotrudniki = Sotrudniki::findOrFail($id);

            $params = [
                'fa'                => 'fa fa-user fa-fw',
                'title'             => 'Сотрудники',
                'addurl'            => '',
                'savedata'          => 'sotrudnikiform',
                'print'             => '',
                'goback'            => 'yes',
                'sotrudniki'        => $sotrudniki
            ];

            return view('sotrudniki.edit')->with($params);
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
        try {
            $sotrudniki             = Sotrudniki::findOrFail($id);

            $sotrudniki->imja_sotrudnika            = $request->imja_sotrudnika;
            $sotrudniki->data_rojdeniya             = $request->data_rojdeniya;
            $sotrudniki->mesto_rojdeniya            = $request->mesto_rojdeniya;
            $sotrudniki->telefon                    = $request->telefon;
            $sotrudniki->zarplata                   = $request->zarplata;
            $sotrudniki->doljnost                   = $request->doljnost;


            // Doctors Profile photo
            $photopath = "";
            if ($request->hasFile('photo_path')) {
                if ($sotrudniki->photo_path) {
                    $path = public_path($sotrudniki->photo_path);
                    unlink($path);
                }

                $destinationpath    = 'images/sotrudniki';
                $imagefile          = $request->photo_path;                    
                $extension          = $imagefile->getClientOriginalExtension();
                $fileName           = str_slug(str_random(20)).'.'.$extension;

                $imagefile->move($destinationpath, $fileName); 
                $photopath = $destinationpath.'/'.$fileName;

                $sotrudniki->photo_path = $photopath;
            }

            $sotrudniki->update();

            alert()->success('Расход ', 'Создана Успешно.')->autoClose(4000);

            return redirect()->route('sotrudniki.index');

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
            $sotrudniki = $request->id;
            if ($sotrudniki) {
                // Search it from database
                try {
                    $sotrudniki_data = Sotrudniki::find($sotrudniki);
                    if ($sotrudniki_data) {
                        if ($sotrudniki_data->photo_path) {
                            $path = public_path($sotrudniki_data->photo_path);
                            unlink($path);
                        }

                        $result  = $sotrudniki_data->delete();

                        if ($result) {
                            return response()->json(['success', $sotrudniki]);
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
