@extends('layouts.layoutSeller')

@section('content')
<a href='/features/create' class="btn btn-warning">New Feature<a>
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Name</th>
    <th colspan="3">Actions</th>
</tr>
@foreach($features as $feature)
<tr>
    <td>{{ $feature->id }}</td>
    <td>{{$feature->feature_name}}</td>
    <td> <a href='/features/edit/{{ $feature->id }}' class="btn btn-primary">Edit</a></td>
    <td> 
        <form class="form-horizontal" action="/features/{{$feature->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger" >Delete</button>
        </form>
    </tr>
</tr>
@endforeach
@endsection