@extends('layouts.layoutSeller')

@section('content')
<form action="/features/{{ $feature->id }}" method="POST">
{{csrf_field() }}
{{method_field('PATCH') }}

<<div class="form-group">
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
<a href='/features' class="btn btn-warning">Back</a>
<button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection