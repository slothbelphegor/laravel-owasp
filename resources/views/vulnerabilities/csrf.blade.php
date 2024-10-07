@extends('layouts.app')

@section('content')
<div class="container">
    <h2>CSRF Vulnerability Demonstration</h2>
    <form action="{{ route('csrf.submit') }}" method="POST" class="mb-3">
        {{-- @csrf --}}
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
</div>
@endsection