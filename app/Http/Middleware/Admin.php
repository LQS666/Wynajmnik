<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    private $user;

    public function __construct(Request $request)
    {
        $this->user = $request->user();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->user->admin) {
            return redirect(route('web.home'));
        }

        return $next($request);
    }
}
