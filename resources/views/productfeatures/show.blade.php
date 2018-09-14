@extends('layouts.layoutSeller')

@section('content')
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Product</th>
    <th>Feature</th>
</tr>
<tr>
    <td>{{ $productfeature->id }}</td>
    <td>{{$productfeature->product->product_name}}</td>
    <td>{{$productfeature->feature->feature_name}}</td>
</tr>
@endsection