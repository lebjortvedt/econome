<?php

namespace App\Http\Controllers;

use App\SalaryPeriod;
use Illuminate\Http\Request;

class SalarayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\SalaryPeriod  $salaryPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryPeriod $salaryPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalaryPeriod  $salaryPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryPeriod $salaryPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalaryPeriod  $salaryPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryPeriod $salaryPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalaryPeriod  $salaryPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryPeriod $salaryPeriod)
    {
        //
    }

    public function getCurrentPeriod()
    {
        $curDate = date('Y-m-d');
        $period = SalaryPeriod::where('start_date', '>=', $curDate)
            ->where('end_date', '=<', $curDate)
            ->first();

        return $period;        
    }
}
