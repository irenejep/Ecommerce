@extends('layout')

@section('content')
<form action="/features" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name of Feature</label>
        <input type="text" class="form-control" id="name" name="feature_name"  placeholder="Enter Name of Feature">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection