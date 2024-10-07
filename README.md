# laravel-owasp

## Setup
- Clone this project
- See the .env file and create a database with name stated on DB_DATABASE
- Migrate the database (php artisan migrate:fresh --seed)
- php artisan serve
## 1. SQL Injection
Open app\Http\Controllers\VulnerabilityController.php, inside the sqlInjection() function is two ways to query the database, one risky and one safe. Try enabling the risky one and go to route http://127.0.0.1:8000/vulnerabilities/sql-injection.
Then type in something like "0 OR 1=1" into the field. You will see all of the usernames inside the table.

## 2. XSS
Open app\Http\Controllers\VulnerabilityController.php, inside the xss() function, you will see a name is stored in the session, which makes it vulnerable. Inside xss.blade.php you can also see that te view is vulnerable too.
At route http://127.0.0.1:8000/vulnerabilities/xss, type something like <script>alert('XSS');</script> into the field and it will work.
To fix this vulnerability, replace {{!!session('name')!!}} with {{session('name')}} inside xss.blade.php.

## 3. CSRF
When going to this route, you will get a form that simulates the 'create user' feature.
Create a HTML file with this as content:
'''
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malicious Page</title>
</head>
<body>
    <form action="http://localhost:8000/vulnerabilities/csrf" method="POST">
        <input name="name" value="Attacker's User">
        <button type="submit">Create User</button>
    </form>
</body>
</html>
'''
Open this HTML file, submit the form and you will be redirected to http://127.0.0.1:8000/vulnerabilities/csrf with the information inputted from the form, which means the hacker has successfully created his own user from a form outside the server.
Inside csrf.blade.php, add the tag `@csrf` inside the form shall fix the risk.



