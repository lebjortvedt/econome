@extends('layouts.app')
@section('content')

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">This month</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Category</td>     
          <td>Sum</td> 
        </tr>
    </thead>
    <tbody>
        @foreach($data['categories'] as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->amount}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection