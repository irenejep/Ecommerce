@extends('layouts.layoutSeller')

@section('content')
<form action="/products" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="category_id">
            <option value="0">---Select category---</option>
            @foreach ($categories as $category) 
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name of product</label>
        <input type="text" class="form-control" name="product_name"  placeholder="Enter Name of product">
    </div>
    <div class="form-group">
        <label for="name">Status</label>
        <input type="text" class="form-control" name="product_status"  placeholder="Enter status of product">
    </div>
    <div class="form-group">
        <label for="name">Price</label>
        <input type="text" class="form-control"  name="product_price"  placeholder="Enter Price of product">
    </div>
    <div class="form-group">
        <label for="name">Image</label>
        <input type="file" accept="image/jpeg, image/jpg, image/gif" class="form-control" name="product_image">
    </div>
    <div class="form-group">
        <label for="name">Description</label>
        <input type="text" class="form-control" name="product_description"  placeholder="Enter description of product">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection