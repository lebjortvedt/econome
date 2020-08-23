@extends('layouts.app')
@section('content')


<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">This month's spendings</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Category</td>     
          <td>Amount</td> 
        </tr>
    </thead>
    <tbody>
        @foreach($data['categories'] as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->amount}}</td> 
        </tr>
        @endforeach
      </tr>
      <th bgcolor="lightblue">Grand total</th><th bgcolor="lightblue">{{ $data['sum']}} </th>
    <tr>
    </tbody>
  </table>
<div>
</div>

@endsection