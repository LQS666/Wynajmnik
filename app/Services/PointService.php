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

    private const OPERATION = [
        self::ADD_OVER_LIMIT => 'ADD_OVER_LIMIT',
        self::ADD_PREMIUM => 'ADD_PREMIUM',
        self::ADD_POINTS => 'ADD_POINTS',
    ];

    private const SIGN = [
        self::ADD_OVER_LIMIT => '-',
        self::ADD_PREMIUM => '-',
        self::ADD_POINTS => '+',
    ];

    private const COST = [
        self::ADD_OVER_LIMIT => 300,
        self::ADD_PREMIUM => 300
    ];

    private static function checkTransaction(User $user, int $mode)
    {
        if (is_null($user) && !Auth::check()) {
            // TODO throw
        }

        if (!in_array($mode, self::SIGN)) {
            // TODO throw
        }
    }

    public static function makePositiveTransaction(User $user, int $mode, int $points, string $desc = null)
    {
        self::checkTransaction($user, $mode);
        if ($points > 0) {
            return self::makeTransaction($user, $mode, $points, $desc);
        }
    }

    public static function makeNegativeTransaction(int $mode, string $desc = null)
    {
        self::checkTransaction(null, $mode);

        return self::makeTransaction(Auth::user(), $mode, self::COST[$mode], $desc);
    }

    private static function makeTransaction(User $user, int $mode, int $points,  string $desc = null)
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
                'desc' => is_null($desc) ? trans('points.' . self::OPERATION[$mode]) : $desc
            ]);

            return true;
        }

        return false;
    }
}
