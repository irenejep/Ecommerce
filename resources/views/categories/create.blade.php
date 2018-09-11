@extends('layout')

@section('content')
<form action="/categories" method="POST">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="Parent">Parent</label>
        <select class="form-control" name="category_parent" id="parent">
            <option value="0">---Select parent---</option>
            @foreach ($categories as $category) 
            <option value="{{ $category->id }}">{{ $category->category_parent }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name of Category</label>
        <input type="text" class="form-control" id="name" name="category_name"  placeholder="Enter Name of Category">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection