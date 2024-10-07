<h2>SQL Injection Vulnerability</h2>
<form action="{{ route('sqlInjection') }}" method="GET">
    <input type="text" name="id" placeholder="Enter User ID (e.g., 1 OR 1=1)" required>
    <button type="submit">Show User</button>
</form>
@if(isset($users))
    <h3>Users:</h3>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endif