@extends('layouts.app')
@section('content')

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Payments</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Vendor</td>
          <td>Category</td>
          <td>Date</td>    
          <td>Amount</td> 
        </tr>
    </thead>
    <tbody>
        @foreach($payments as $payment)
        <tr>
            <td>{{$payment->id}}</td>
            <td>{{$payment->vendor->name}}</td>
            <td>{{$payment->payment_category->name}}</td>
            <td>{{$payment->paid_at}}</td>
            <td>{{$payment->amount}}</td>           
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection