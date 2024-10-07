<h2>Remote Code Execution Vulnerability</h2>

<form action="{{ route('rce') }}" method="POST">
    @csrf
    <label for="code">Enter PHP Code to Execute:</label>
    <input type="text" name="code" id="code" placeholder="Enter PHP Code" style="width: 400px;">
    <button type="submit">Execute Code</button>
</form>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

@if (session('result'))
    <h3>Execution Result:</h3>
    <pre>{{ session('result') }}</pre>
@endif
