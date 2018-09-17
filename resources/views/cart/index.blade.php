@extends('layouts.layoutBuyer')

@section('content')
<div>
    <table class = "table table-condensed table-striped table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th >Actions</th>
        </tr>
        <tr>  
        @foreach($products as $product)
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$qty}}</td>
            <td>{{$product->product_price}}</td>
            <td>  
                <form class="form-horizontal" action="/removefromcart/{{$product->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-warning" >Remove from cart</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<div><a href="/quantity{{$product->id}}"class ="btn btn-primary" style="margin-left:90%;">Place order</a></div>
@endsection