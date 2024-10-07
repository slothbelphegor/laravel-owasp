@extends('layouts.app')
@section('content')
<div class="container">
    <h2>XSS Vulnerability</h2>
    <form action="{{ route('xss.submit') }}" method="POST" class="mb-3">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter the script code to attack">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if(session('name'))
        <h3>Stored Name (potential XSS):</h3>
        <div class="alert alert-warning">
            <p>{!!session('name')!!}</p> <!-- This is where the XSS vulnerability can be demonstrated -->
        </div>
    @endif
</div>
@endsection