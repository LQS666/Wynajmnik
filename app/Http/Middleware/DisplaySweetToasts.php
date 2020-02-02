<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class DisplaySweetToasts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($errors = session('errors', false)) {
            if (is_string($errors)) {
                $errors = [$errors];
            } else {
                $errors = $errors->all();
            }

            $errors_concat = '<span style="text-align: left;">';
            foreach ($errors as $i => $error) {
                $errors_concat .= ($i > 0 ? '<br />' : '') . $error;
            }
            $errors_concat .= '</span>';

            Alert::toast($errors_concat, 'error');
        }

        return $next($request);
    }
}
