@extends('layout')

@section('content')
<form action="/categories/{{ $category->id }}" method="POST">
{{csrf_field() }}
{{method_field('PATCH') }}

<div class="form-group">
    <label for="category">Name of Category</label>
    <input type="text" class="form-control" id="title" name="category_name" value = "{{ $category->category_name}}">
</div>
<div class="form-group">
    <label for="parent">Parent of Category</label>
    <input type="text" class="form-control" name="category_parent" id="body" value="{{ $category->category_parent}}">
</div>
<a href='/categories' class="btn btn-warning">Back</a>
<button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection