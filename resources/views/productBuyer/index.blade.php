@extends('layouts.layoutBuyer')

@section('content')
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Category</th>
    <th>Product Name</th>
    <th>Status</th>
    <th>Price</th>
    <th>Image</th>
    <th>Description</th>
    
    <th colspan="3">Actions</th>
</tr>
@foreach($products as $product)
<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->category->category_name }}</td>
    <td>{{$product->product_name}}</td>
    <td>{{$product->product_status}}</td>
    <td>{{$product->product_price}}</td>
    <td>{{$product->product_image}}</td>
    <td>{{$product->product_description}}</td>
    <td> <a href='/productfeatures/{{ $product->id }}' class="btn btn-primary">Features</a></td>
    <td> <a href='/products/show/{{ $product->id }}' class="btn btn-primary">View</a></td>
    <td> <a class="btn btn-primary" href='/addtocart/{{ $product->id }}'><i class="fas fa-cart-plus"></i>Add to cart</a></td>
</tr>
@endforeach
@endsection