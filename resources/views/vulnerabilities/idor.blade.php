@extends('layouts.app')

@section('content')
<div class="container">
    <h2>IDOR Vulnerability Demonstration</h2>
    <form action="{{ route('idor') }}" method="GET" class="mb-3">
        <div class="form-group">
            <input type="text" name="id" class="form-control" placeholder="Enter User ID">
        </div>
        <button type="submit" class="btn btn-primary">View User</button>
    </form>

    @if(isset($user))
        <h3>User Details:</h3>
        <div class="card">
            <div class="card-body">
                <p class="card-text">Name: {{ $user->name }}</p>
                <p class="card-text">Email: {{ $user->email }}</p>
            </div>
        </div>
    @endif
</div>
@endsection