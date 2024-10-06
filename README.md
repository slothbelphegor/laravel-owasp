# laravel-owasp

## Setup
- Clone this project
- See the .env file and create a database with name stated on DB_DATABASE
- Migrate the database (php artisan migrate:fresh --seed)
- php artisan serve
## 1. SQL Injection
Open app\Http\Controllers\VulnerabilityController.php, inside the sqlInjection() function is two ways to query the database, one risky and one safe. Try enabling the risky one and go to route http://127.0.0.1:8000/vulnerabilities/sql-injection.
Then type in something like "0 OR 1=1" into the field. You will see all of the usernames inside the table.

## 2.XSS
Open app\Http\Controllers\VulnerabilityController.php, inside the xss() function, you will see a name is stored in the session.

Then type in something like "0 OR 1=1" into the field. You will see all of the usernames inside the table.

