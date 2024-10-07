<h1>User Information</h1>
@if(session('exploited'))
    <p>The system is vulnerable to XSS!</p>
@endif
@if($user)
    <p>Name: {{ $user->name }}</p>
@endif