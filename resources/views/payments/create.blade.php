@extends('layouts.app')
@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a payment</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('payments.store') }}">
          @csrf
        <div class="form-group">    
            <label for="vendor">Vendor</label>
            <select class="form-control" name="vendor">
                <option value=-1>Select vendor</option> 
                @foreach ($data['vendors'] as $vendor)
                <option value={{ $vendor->id}}>{{ $vendor->name }}</option>                    
                @endforeach
            </select>
        </div>
        <div class="form-group">    
            <label for="payment_category">Payment category</label>
            <select class="form-control" name="payment_category">
                <option value=-1>Select category</option> 
                @foreach ($data['categories'] as $category)
                <option value={{ $category->id}}>{{ $category->name }}</option>                    
                @endforeach
            </select>
            <input type="checkbox" name="subscription"><label>Subscription</label>
        </div>  
          <div class="form-group">    
              <label for="date">Date</label>
              <input type="text" class="form-control" name="date"/>
          </div>
          <div class="form-group">    
            <label for="amount">Amount</label>
            <input type="text" class="form-control" name="amount"/>
        </div>                
          <button type="submit" class="btn btn-primary-outline">Add payment</button>
      </form>
  </div>
</div>
</div>
@endsection