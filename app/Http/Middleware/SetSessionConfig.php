<?php

// app/Http/Middleware/SetSessionConfig.php
namespace App\Http\Middleware;

use Config;
use Closure;

class SetSessionConfig
{
    public function handle($request, Closure $next)
    {
        if ($request->is('online_store') || $request->is('online_store/*')) {
            Config::set('session.path', '/online_store');
            Config::set('session.cookie', 'store_session');
        } else {
            Config::set('session.path', '/');
            Config::set('session.cookie', 'web_session');
        }

        return $next($request);
    }
}
