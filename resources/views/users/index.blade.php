@extends('layout')

@section('content')
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
    @foreach ($usertypes as $usertype)
        @if ($user->users_types_id == $usertype->id)
            {{ $usertype->user_types_name }}
        @endif
    @endforeach
    </td>
    <td> <a href='/users/delete/{{ $user->id }}'onsubmit="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
@endsection