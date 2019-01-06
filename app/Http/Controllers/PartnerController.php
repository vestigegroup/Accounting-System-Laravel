<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;

use AccountSystem\Model\Partner;

class PartnerController extends Controller
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
        $partner = Partner::get();

        return view('partner.index', [
            'fa'                => 'fa fa-list fa-fw',
            'title'             => 'Партнёры',
            'addurl'            => 'partner.create',
            'savedata'          => '',
            'print'             => '',
            'goback'            => '',
            'partners'           => $partner
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
        return view('partner.create', [
            'fa'                => 'fa fa-list fa-fw',
            'title'             => 'Partner',
            'addurl'            => '',
            'savedata'          => 'partnersave',
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
        // TODO
        $this->validate($request, [

        ]);

        $partner = new Partner();
 
        $partner->nazivaniye_firma          = $request->nazivaniye_firma;
        $partner->tip_zanyata               = $request->tip_zanyata;
        $partner->marketolog                = $request->marketolog;
        $partner->tip_skidka                = $request->tip_skidka;
        $partner->telefon                   = $request->telefon;
        $partner->mail                      = $request->mail;
        $partner->website                   = $request->website;
        $partner->adress                    = $request->adress;
        $partner->zametka                   = $request->zametka;

        if ($request->photo_path) {
            // Logo photo
            $photopath = "";
            if ($request->hasFile('photo_path')) {
                $destinationpath    = 'images/partner';
                $imagefile          = $request->photo_path;                    
                $extension          = $imagefile->getClientOriginalExtension();
                $fileName           = str_slug(str_random(20)).'.'.$extension;

                $imagefile->move($destinationpath, $fileName); 
                $photopath = $destinationpath.'/'.$fileName;
            }
        }

        $partner->photo_path = $photopath;

        $partner->save();

    
        alert()->success('Успешно', '')->autoClose(4000);

        return redirect()->route('partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::findOrFail($id);

        return view('partner.show', [
            'fa'                => 'fa fa-list fa-fw',
            'title'             => 'Partner',
            'addurl'            => '',
            'savedata'          => '',
            'print'             => '',
            'goback'            => '',
            'partner'           => $partner
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
        //
        try
        {
            $partner = Partner::findOrFail($id);

            $params = [
                'fa'                => 'fa fa-user fa-fw',
                'title'             => 'Partner',
                'addurl'            => '',
                'savedata'          => 'partnersaveedited',
                'print'             => '',
                'goback'            => 'yes',
                'partner'           => $partner
            ];

            return view('partner.edit')->with($params);
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
        try {

            $partner                            = Partner::findOrFail($id);

            $partner->nazivaniye_firma          = $request->nazivaniye_firma;
            $partner->tip_zanyata               = $request->tip_zanyata;
            $partner->marketolog                = $request->marketolog;
            $partner->tip_skidka                = $request->tip_skidka;
            $partner->telefon                   = $request->telefon;
            $partner->mail                      = $request->mail;
            $partner->website                   = $request->website;
            $partner->adress                    = $request->adress;
            $partner->zametka                   = $request->zametka;


            // Profile photo
            $photopath = "";
            if ($request->hasFile('photo_path')) {
                if ($partner->photo_path) {
                    $path = public_path($partner->photo_path);
                    unlink($path);
                }

                $destinationpath    = 'images/partner';
                $imagefile          = $request->photo_path;                    
                $extension          = $imagefile->getClientOriginalExtension();
                $fileName           = str_slug(str_random(20)).'.'.$extension;

                $imagefile->move($destinationpath, $fileName); 
                $photopath = $destinationpath.'/'.$fileName;

                $partner->photo_path = $photopath;
            }

            $partner->update();

            alert()->success('Успешно', '')->autoClose(4000);

            return redirect()->route('partner.index');

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
            $partner = $request->id;
            if ($partner) {
                // Search it from database
                try {
                    $partner_data = Partner::find($partner);
                    if ($partner_data) {
                        if ($partner_data->photo_path) {
                            $path = public_path($partner_data->photo_path);
                            unlink($path);
                        }

                        $result  = $partner_data->delete();

                        if ($result) {
                            return response()->json(['success', $partner]);
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
            return redirect()->route('partner.index');
        }
    }
}
