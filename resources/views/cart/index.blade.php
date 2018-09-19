@extends('layouts.layoutBuyer')

@section('content')
@if(Session::has('cart'))
<div id="table">
    <table class = "table table-condensed table-striped table-bordered table-hover">
        <tr>
            <th>Product Name</th>
            <th>quantity</th>
            <th>Price</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>  
        @foreach($products as $product)
            <td>{{$product->product_name}}</td>
            <td> {{$product->qty}}</td>
            <td> {{$product->product_price}}</td>
            <td>  
                <form class="form-horizontal" action="/removefromcart/{{$product->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-warning">Remove from cart</button>
                </form>
            </td>
            <td>
                <form action="/complete/{{$product->id}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary" onsubmit()>Place order</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<script>
    document.getElementById("table").onsubmit = function() {myFunction()};

    function myFunction() {
        document.getElementById("table").style.display="none";
    }
</script>
@endif
@endsection