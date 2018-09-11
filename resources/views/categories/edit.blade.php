@extends('layout')

@section('content')
<form action="/categories/{{ $category->id }}" method="POST">
{{csrf_field() }}
{{method_field('PATCH') }}

<div class="form-group">
    <label for="title">Name of Category</label>
    <input type="text" class="form-control" id="title" name="title" value = "{{ $category->name}}">
</div>
<div class="form-group">
    <label for="body">Parent of Category</label>
    <input type="text" class="form-control" name="body" id="body" value="{{ $category->parent}}">
</div>
<a href='/categories' class="btn btn-warning">Back</a>
<button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection