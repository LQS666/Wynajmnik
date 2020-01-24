<?php

namespace App\Services;

use App\Point;
use App\User;
use Illuminate\Support\Facades\Auth;

final class PointService
{
    public const ADD_OVER_LIMIT = 1;
    public const ADD_PREMIUM = 2;
    public const ADD_POINTS = 3;
    public const ACCEPT = 4;

    private const OPERATION = [
        self::ADD_OVER_LIMIT => 'ADD_OVER_LIMIT',
        self::ADD_PREMIUM => 'ADD_PREMIUM',
        self::ADD_POINTS => 'ADD_POINTS',
        self::ACCEPT => 'ACCEPT',
    ];

    private const SIGN = [
        self::ADD_OVER_LIMIT => '-',
        self::ADD_PREMIUM => '-',
        self::ADD_POINTS => '+',
        self::ACCEPT => '-',
    ];

    private const COST = [
        self::ADD_OVER_LIMIT => 500,
        self::ADD_PREMIUM => 500,
        self::ACCEPT => 1000,
    ];

    private static function checkTransaction(array $modes, User $user = null)
    {
        if (is_null($user) && !Auth::check()) {
            // TODO throw
        }

        foreach ($modes as $mode) {
            if (!in_array($mode, self::SIGN)) {
                // TODO throw
            }
        }
    }

    public static function checkIfEnough(array $modes, User $user = null)
    {
        self::checkTransaction($modes, $user);

        $user = !is_null($user) ? $user : Auth::user();
        $cost = 0;

        foreach ($modes as $mode) {
            $cost += self::COST[$mode];
        }

        return ($user->points - $cost) >= 0;
    }

    public static function makeAnyTransaction(int $mode, User $user = null, int $points = null)
    {
        self::checkTransaction([$mode], $user);

        $user = !is_null($user) ? $user : Auth::user();

        self::makeTransaction($user, $mode, !is_null($points) ? $points : self::COST[$mode]);
    }

    private static function makeTransaction(User $user, int $mode, int $points)
    {
        $source = $user->points;
        $result = $source + (self::SIGN[$mode] === '+' ? $points : -$points);

        if ($result >= 0) {
            $user->update([
                'points' => $result
            ]);

            Point::create([
                'user_id' => $user->id,
                'sign' => self::SIGN[$mode],
                'points' => $points,
                'source' => $source,
                'result' => $result,
                'operation' => self::OPERATION[$mode],
                'desc' => trans('points.operation.' . self::OPERATION[$mode])
            ]);

            return true;
        }
        return false;
    }

    private function __construct() {}
}
