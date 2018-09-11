@extends('layout')

@section('content')
<a href='/categories/create' class="btn btn-warning">New Category<a>
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Parent</th>
    <th>Name</th>
    <th colspan="3">Actions</th>
</tr>
@foreach($categories as $category)
<tr>
    <td>{{ $category->id }}</td>
    <td>
    @foreach($categories as $parent)
        @if($parent->id == $category->category_parent)
            {{ $parent->category_name }}
        @endif
    @endforeach
    </td>
    <td>{{$category->category_name}}</td>
    <td> <a href='/categories/edit/{{ $category->id }}' class="btn btn-primary">Edit</a></td>
    <td> <a href='/categories/delete/{{ $category->id }}'onsubmit="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
@endsection