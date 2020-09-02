<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Vendor;
use App\PaymentCategory;
use App\CalendarDay;
use App\UserDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SalaryController;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();   
        $payments = $user->payments()->get();
    
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
        $user = Auth::user();   
        $vendors = $user->vendors()->get();
        $paymentCategories = $user->paymentCategories()->get();

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
        $userId = Auth::id();   
        $isSubscription = ($request->subscription == 'on' ? 1 : 0);

        // $period = SalaryController::getCurrentPeriod();

        // return $period;

        $payment = New Payment();
        $payment->payment_category_id = $request->payment_category;
        $payment->vendor_id = $request->vendor;
        $payment->amount = $request->amount;
        $payment->cdate = $request->date;
        $payment->subscription = $isSubscription;
        $payment->user_id = $userId;
        // $payment->salary_period_id = $period->id;
        $payment->save();
        
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
     * 
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
        $curDate = date('Y-m-d');

        $user = auth()->user();
        $userId = Auth::id();

        $previousPayDay = $user->userDays()->where('cdate', '<=', $curDate)            
            ->where('is_payday', 1)
            ->orderBy('cdate', 'desc')
            ->first();

        $previousPayDayDate = $previousPayDay->cdate;
    
        $curCalDay = CalendarDay::where('cdate', $curDate);
       

        // Get all the payments of the current month
        $payments = $user->payments()->where('cdate', '>=', $previousPayDayDate)
            ->where('cdate', '<', $curDate)
            ->get();
   
        $categories = [];        

        // We want to get the categories from the payments
        foreach($payments as $payment) {
            $payment->payment_category = $payment->paymentCategory;
            $payment->vendor = $payment->vendor;
            array_push($categories, $payment->payment_category);
        }

        // Remove duplicate categories
        $uniqueCategories = array_unique($categories);
        
        // Loop the categories to get all current months payments
        foreach($uniqueCategories as $category) {
            $catSum = $category->payments()->where('cdate', '>=', $previousPayDayDate)
            ->where('cdate', '<', $curDate)->sum('amount');
            $category->amount=$catSum;
        }

        // Collect all the data for the view
        $data['sum'] = $payments->sum('amount'); 
        $data['categories'] = $uniqueCategories;
        $data['payments'] = $payments;
        
        return view('dash', compact('data'));
    }

}

