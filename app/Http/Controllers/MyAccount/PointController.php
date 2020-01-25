<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __invoke(Request $request)
    {
        $points = Point::user($request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('my-account.points', [
            'points' => $points
        ]);
    }
}
