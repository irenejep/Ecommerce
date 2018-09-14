@extends('layouts.layoutSeller')

@section('content')
<form action="/features/{{ $feature->id }}" method="POST">
{{csrf_field() }}
{{method_field('PATCH') }}

<div class="form-group">
    <label for="feature">Name of Feature</label>
    <input type="text" class="form-control" name="feature_name" value = "{{ $feature->feature_name}}">
</div>
<div class="form-group">
    <label for="user_id">User</label>
    <input type="id" class="form-control" name="user_id"  value="{{ $feature->user_id}}" readonly>
</div>
<a href='/features' class="btn btn-warning">Back</a>
<button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection