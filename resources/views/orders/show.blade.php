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
            <tr>
                <td>{{$orders->order_status_name}}</td>
                <td>{{$orders->name}}</td>
                <td>{{$orders->created_at}}</td>
                <td><a href="/complete/{{$order->id }}" class="btn btn-warning" >Complete Order</a></td>
            </tr>
        </table>
    </div>
    <div class="col-md-2">
        @include('layouts.sidebar')
    </div>
</div>

@endsection