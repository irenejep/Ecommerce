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
                <th>Actions</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{$order->order_status_name}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->created_at}}</td>
                <td><a href="/vieworder/{{$order->id }}" class="btn btn-warning" >View</a></td>
            </tr>
            @endforeach
        </table>
        <a href="/complete/{{$order->id }}" class="btn btn-warning" >Complete Order</a>
    </div>
    <div class="col-md-2">
        @include('layouts.sidebar')
    </div>
</div>

@endsection