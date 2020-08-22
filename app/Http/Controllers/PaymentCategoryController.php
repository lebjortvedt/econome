<?php

namespace App\Http\Controllers;

use App\PaymentCategory;
use Illuminate\Http\Request;

class PaymentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentCategories = PaymentCategory::all();
        return view('paymentCategories.index', compact('paymentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paymentCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentCategory = new PaymentCategory();
        $paymentCategory->name = $request->name;      
        $paymentCategory->save();

        $paymentCategories= Vendor::all();
        return redirect()->route('paymentCategories.index')->with('success','Payment category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentCategory  $paymentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentCategory $paymentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentCategory  $paymentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentCategory $paymentCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentCategory  $paymentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentCategory $paymentCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentCategory  $paymentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentCategory $paymentCategory)
    {
        //
    }
}
