@extends('layouts.layoutAdmin')

@section('content')
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Email</th>
    <th>User Type</th>
    <th colspan="3">Actions</th>
</tr>
@foreach($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
    @foreach ($usertypes as $usertype)
        @if ($user->users_types_id == $usertype->id)
            {{ $usertype->user_types_name }}
        @endif
    @endforeach
    </td>
    <td id="delete"> 
        <form class="form-horizontal" action="/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            @if ($user->users_types_id == 1)
            <script type="text/javascript">document.getElementById("delete").style.display="none"</script>
            @endif
            <button type="submit" class="btn btn-danger" >Delete</button>
        </form>
    </td>
</tr>
@endforeach
@endsection