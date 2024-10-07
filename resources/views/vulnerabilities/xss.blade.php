<h2>XSS Vulnerability</h2>
<form action="{{ route('xss.submit') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter Name">
    <button type="submit">Submit</button>
</form>

@if(session('name'))
    <h3>Stored Name (potential XSS):</h3>
    <p> {{!!session('name')!!}}</p> <!-- This is where the XSS vulnerability can be demonstrated -->
@endif