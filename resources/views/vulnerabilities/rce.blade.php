<h2>Remote Code Execution Vulnerability</h2>
<form action="{{ route('rce') }}" method="POST">
    @csrf
    <input type="text" name="code" placeholder="Enter PHP Code">
    <button type="submit">Execute</button>
</form>
@if(session('message'))
    <p>{{ session('message') }}</p>
@endif