<?php

namespace App\Http\Controllers;

use App\Models\FinancialPeriods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FinancialPeriodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('index');
        return FinancialPeriods::select('id', 'year','name','start_date','end_date', 'weeks')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('create');
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
        Log::info('store');
        $request->validate([
            'year'=>'required',
            'name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'weeks'=>'required'
        ]);
        try{
            FinancialPeriods::create($request->post());

            return response()->json([
                'message'=>'FinancialPeriods Created Successfully!!',
                'result'=>true
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message'=>'Something goes wrong while creating a product!!',
                'result'=>false
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinancialPeriods  $financialPeriods
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialPeriods $financialPeriods)
    {
        Log::info('SHOW ' . $financialPeriods);
        return response()->json([
            'financialPeriods' => $financialPeriods
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinancialPeriods  $financialPeriods
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialPeriods $financialPeriods)
    {
        Log::info('edit');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialPeriods  $financialPeriods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinancialPeriods $financialPeriods)
    {
        Log::info('update');
        // $request->validate([
        //     'year'=>'required',
        //     'name'=>'required',
        //     'start_date'=>'required',
        //     'end_date'=>'required',
        //     'weeks'=>'required'
        // ]);

        try{
            $param = $request->post();
            Log::info($param);
            FinancialPeriods::where('id', $param['id'])->update($param);

            return response()->json([
                'message'=>'FinancialPeriod Updated Successfully!!',
                'result'=>true
            ]);

        }catch(\Exception $e){
            return response()->json([
                'message'=>'Something goes wrong while updating a FinancialPeriod!!',
                'result'=>false
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinancialPeriods  $financialPeriods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FinancialPeriods $financialPeriods)
    {
        try {
            Log::info('destroy');
            $deleteItems = $request->all();
            Log::info($deleteItems);
            FinancialPeriods::whereIn('id', $deleteItems)->delete();

            return response()->json([
                'message'=>'FinancialPeriods Deleted Successfully!!',
                'result'=>true
            ]);
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a FinancialPeriods!!',
                'result'=>false
            ]);
        }
    }
}
