<h2>CSRF Vulnerability Demonstration</h2>
<form action="{{ route('csrf.submit') }}" method="POST">
    {{-- @csrf --}}
    <input type="text" name="name" placeholder="Enter Name">
    <button type="submit">Create User</button>
</form>

@if(session('message'))
    <p>{{ session('message') }}</p>
@endif