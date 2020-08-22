@extends('layouts.app')
@section('content')

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">paymentCategories</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>    
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($paymentCategories as $paymentCategory)
        <tr>
            <td>{{$paymentCategory->id}}</td>
            <td>{{$paymentCategory->name}}</td>
            <td>
                <a href="{{ route('paymentCategories.edit',$paymentCategory->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('paymentCategories.destroy', $paymentCategory->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection