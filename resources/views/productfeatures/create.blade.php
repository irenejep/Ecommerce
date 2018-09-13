@extends('layouts.layoutSeller')

@section('content')
<form action="/productfeatures" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="product">Product</label>
        <select class="form-control" name="product_id">
            <option value="0">---Select Product---</option>
            @foreach ($products as $product) 
            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="feature">Feature</label>
        <select class="form-control" name="feature_id">
            <option value="0">---Select feature---</option>
            @foreach ($features as $feature) 
            <option value="{{ $feature->id }}">{{ $feature->feature_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection