protected $routeMiddleware = [
    // other middleware
    'disable.csrf' => \App\Http\Middleware\DisableCsrf::class,
];