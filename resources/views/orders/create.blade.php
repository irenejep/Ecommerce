@extends('layouts.layoutSeller')

@section('content')
@foreach($products as $product)
<form action="/placeorder" method="post">
    {{csrf_field()}}
    <input type="hidden"name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden"name="order_status_id" value="{{$product->id}}">
    <button type="submit" class="btn btn-primary">Place order</button>
</form>
@endforeach

@endsection