<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Middleware global Anda (sudah benar)
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware grup 'web' Anda (sudah benar)
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Middleware grup 'api' Anda (sudah benar)
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api', // Menggunakan alias throttle
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases. <<<--- INI YANG HARUS ADA
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [ // <-- BUAT ATAU GUNAKAN ARRAY INI
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Alias throttle didefinisikan di sini
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // Pindahkan alias 'role' ke sini juga untuk konsistensi
        'role' => \App\Http\Middleware\CheckRole::class,

        // ---> Tambahkan alias admin Anda DI SINI <---
        'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,

    ];

     /**
      * The application's route middleware.
      * Sebaiknya kosong jika semua sudah dipindahkan ke $middlewareAliases
      *
      * @var array<string, class-string|string>
      */
     protected $routeMiddleware = [ // <-- HAPUS SEMUA ALIAS DARI SINI
         // Kosongkan array ini, karena semua alias sudah dipindahkan ke $middlewareAliases
     ];
}