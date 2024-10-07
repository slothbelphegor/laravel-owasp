<h2>IDOR Vulnerability Demonstration</h2>
<form action="{{ route('idor') }}" method="GET">
    <input type="text" name="id" placeholder="Enter User ID">
    <button type="submit">View User</button>
</form>

@if(isset($user))
    <h3>User Details:</h3>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
@endif