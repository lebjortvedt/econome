<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Vendor;
use App\PaymentCategory;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
    
        foreach($payments as $payment) {
            $payment->payment_category = $payment->paymentCategory;
            $payment->vendor = $payment->vendor;
        }

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        $paymentCategories = PaymentCategory::all();

        $data['vendors'] = $vendors;
        $data['categories'] = $paymentCategories;

        return view('payments.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $isSubscription = ($request->subscription == 'on' ? 1 : 0);

        $payment = New Payment();
        $payment->payment_category_id = $request->payment_category;
        $payment->vendor_id = $request->vendor;
        $payment->amount = $request->amount;
        $payment->paid_at = $request->date;
        $payment->subscription = $isSubscription;
        $payment->save();

        $payments= Payment::all();
        
        return redirect()->route('payments.index')->with('success','Payment added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
    
    public function getDashData()
    {
        $payments = Payment::all();
    
        foreach($payments as $payment) {
            $payment->payment_category = $payment->paymentCategory;
            $payment->vendor = $payment->vendor;
        }
        
        return view('dash', compact('payments'));
    }

}

