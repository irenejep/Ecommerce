@extends('layouts.layoutSeller')

@section('content')
<a href='/productfeatures/create' class="btn btn-warning">New Feature<a>
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Feature</th>
    <th colspan="3">Actions</th>
</tr>
@foreach($productfeatures as $productfeature)
<tr>
    <td>{{ $productfeature->id }}</td>
    <td>{{$productfeature->feature->feature_name}}</td>
    <td> <a href='/productfeatures/edit/{{ $productfeature->id }}' class="btn btn-primary">Edit</a></td>
    <td> 
        <form class="form-horizontal" action="/productfeatures/{{$productfeature->product->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger" >Delete</button>
        </form>
    </tr>
</tr>
@endforeach
@endsection