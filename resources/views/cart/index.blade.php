@extends('layouts.layoutBuyer')

@section('content')
<div>
    <table class = "table table-condensed table-striped table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Price</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>  
        @foreach($products as $product)
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_price}}</td>
            <td>  
                <form class="form-horizontal" action="/removefromcart/{{$product->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-warning" >Remove from cart</button>
                </form>
            </td>
            <td>
                <form action="/placeorder" method="post">
                    {{csrf_field()}}
                    <input type="hidden"name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden"name="order_status_id" value="2">
                    <button type="submit" class="btn btn-primary">Place order</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection