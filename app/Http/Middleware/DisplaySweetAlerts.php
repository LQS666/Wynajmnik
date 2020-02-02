<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class DisplaySweetAlerts
{
    private function prepare(string $value) {
        return array_map('trim', explode('#', $value));
    }

    private function success($value) {
        $value = $this->prepare($value);

        Alert::success($value[0], !empty($value[1]) ? $value[1] : $value[0]);
    }

    private function info(string $value) {
        $value = $this->prepare($value);

        Alert::info($value[0], !empty($value[1]) ? $value[1] : $value[0]);
    }

    private function error(string $value) {
        $value = $this->prepare($value);

        Alert::error($value[0], !empty($value[1]) ? $value[1] : $value[0]);
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
        $types = ['alert', 'success', 'info', 'warning', 'error', 'question', 'image', 'html'];

        foreach ($types as $type) {
            if ($message = session('sweet.' . $type)) {
                if (method_exists(DisplaySweetAlerts::class, $type)) {
                    $this->{$type}($message);
                }
            }
        }

        return $next($request);
    }
}
