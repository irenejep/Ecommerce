@extends('layouts.layoutSeller')

@section('content')
<form action="/products/{{ $product->id }}" method="POST">
{{csrf_field() }}
{{method_field('PATCH') }}

<div class="form-group">
        <label for="name">Name of product</label>
        <input type="text" class="form-control" name="product_name"  value="{{ $product->product_name}}">
    </div>
    <div class="form-group">
        <label for="name">Status</label>
        <input type="text" class="form-control" name="product_status"  value="{{ $product->product_status}}">
    </div>
    <div class="form-group">
        <label for="name">Price</label>
        <input type="text" class="form-control"  name="product_price"  value="{{ $product->product_price}}">
    </div>
    <div class="form-group">
        <label for="name">Image</label>
        <input type="file" accept="image/*" class="form-control" name="product_image">
    </div>
    <div class="form-group">
        <label for="name">Description</label>
        <input type="text" class="form-control" name="product_description"  value="{{ $product->product_description}}">
    </div>
<a href='/products' class="btn btn-warning">Back</a>
<button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection