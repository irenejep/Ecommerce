@extends('layouts.layoutSeller')

@section('content')
<div class="row">
    <div class=col-md-8>
        <table class = "table table-condensed table-striped table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>created by</th>
                <th>created at</th>
                <th colspan="2">Actions</th>
            </tr>
            @foreach($orders as $order)
            <tr id="cartitems">
                <td>{{ $order->id }}</td>
                <td>{{$order->order_status_name}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->created_at}}</td>
                <td><a href="/vieworder/{{$order->id }}" class="btn btn-warning" >View</a></td>
                <td> 
                    <form class="form-horizontal" action="/cancelorder/{{$order->id}}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?')">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" >Cancel Order</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-2">
        @include('layouts.sidebar')
    </div>
</div>

@endsection