@extends('layouts.app')

@section('content')
<div class="container">
    <h2>SQL Injection Vulnerability</h2>
    <form action="{{ route('sqlInjection') }}" method="GET" class="mb-4">
        <div class="form-group">
            <input type="text" name="id" class="form-control" placeholder="Enter User ID (e.g., 1 OR 1=1)" required>
        </div>
        <button type="submit" class="btn btn-primary">Show User</button>
    </form>

    @if(isset($users) && count($users) > 0)
        <h3>Users:</h3>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">{{ $user->name }} (ID: {{ $user->id }})</li>
            @endforeach
        </ul>
    @elseif(request()->has('id'))
        <div class="alert alert-warning">No users found for the given ID.</div>
    @endif
</div>
@endsection