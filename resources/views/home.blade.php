@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col">
            <h1>Vulnerability Demonstrations</h1>
        </div>
    </div>
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @auth
        <p>You are logged in!</p>
        @if(session('api_token'))
            <p>Your API token: {{ session('api_token') }}</p>
        @endif
    @else
        <p>Please log in to access your API token.</p>
    @endauth
    <div class="list-group">
        <a href="{{ route('sqlInjection') }}" class="list-group-item list-group-item-action">
            SQL Injection
        </a>
        <a href="{{ route('xss.form') }}" class="list-group-item list-group-item-action">
            Cross-Site Scripting (XSS)
        </a>
        <a href="{{ route('csrf.form') }}" class="list-group-item list-group-item-action">
            Cross-Site Request Forgery (CSRF)
        </a>
        <a href="{{ route('idor') }}" class="list-group-item list-group-item-action">
            Insecure Direct Object References (IDOR)
        </a>
        <a href="{{ route('rce.form') }}" class="list-group-item list-group-item-action">
            Remote Code Execution (RCE)
        </a>
    </div>
</div>
@endsection