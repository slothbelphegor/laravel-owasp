@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Remote Code Execution Vulnerability</h2>

    <form action="{{ route('rce') }}" method="POST" class="mb-3">
        @csrf
        <div class="form-group">
            <label for="code">Enter PHP Code to Execute:</label>
            <input type="text" name="code" id="code" class="form-control" placeholder="Enter PHP Code" style="width: 100%;">
        </div>
        <button type="submit" class="btn btn-primary">Execute Code</button>
    </form>

    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if (session('result'))
        <h3>Execution Result:</h3>
        <pre class="bg-light p-3 mt-3">{{ session('result') }}</pre>
    @endif
</div>
@endsection
