<?php

namespace AccountSystem\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;


use AccountSystem\Model\Plan;


class PlanController extends Controller
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
        $plans = Plan::get();

        return view('plan.index', [
            'fa'                => 'fa fa-check-circle fa-fw',
            'title'             => 'план',
            'addurl'            => 'plan.create',
            'savedata'          => '',
            'print'             => '',
            'goback'            => '',
            'plans'              => $plans
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
        return view('plan.create', [
            'fa'                => 'fa fa-home fa-fw',
            'title'             => 'план',
            'addurl'            => '',
            'savedata'          => 'plansave',
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
        $this->validate($request, [

        ]);

        $plan = Plan::create([
            'nalog'             => $request->nalog,
            'arenda'            => $request->arenda,
            'zarplata'          => $request->zarplata,
            'komunalni'         => $request->komunalni,
            'pitanie'           => $request->pitanie,
            'offisni_rasxod'    => $request->offisni_rasxod,
            'drugie'            => $request->drugie,
            'month'             => (integer)Carbon::now()->month,
            'total'             => $request->nalog + $request->arenda + $request->zarplata + $request->komunalni + $request->pitanie + $request->offisni_rasxod + $request->drugie,
        ]);

        if ($plan) {
            alert()->success('Успешно', '')->autoClose(4000);
            return redirect()->route('plan.index');
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
        return response()->route('home');
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
        return response()->route('home');
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
        return response()->route('home');
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
            $planId = $request->id;

            if ($planId) {
                // Search it from database
                try {
                    $plan = Plan::findOrFail($planId);
                    if ($plan) {
                        $result  = $plan->delete();

                        if ($result) {
                            return response()->json(['success', $planId]);
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
            return redirect()->route('plan.index');
        }
    }
}
