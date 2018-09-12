@extends('layout')

@section('content')
<a href='/categories/create' class="btn btn-warning">New Category<a>
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Name</th>
    <th>User Type</th>
    <th colspan="3">Actions</th>
</tr>
@foreach($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>
    @foreach($users as $user_types)
        @if($user_types->id == $users->user_types_id)
            {{ $user_types->user_types_name }}
        @endif
    @endforeach
    </td>
</tr>
@endforeach
@endsection