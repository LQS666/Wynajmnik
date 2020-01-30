<?php

namespace App\Services;

use App\Offer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

final class OfferService
{
    private static function convertDate(string $date): Carbon
    {
        return Carbon::parse($date);
    }

    private static function convertDateToStart(string $date): Carbon
    {
        return self::convertDate($date)->startOfDay();
    }

    private static function convertDateToEnd(string $date): Carbon
    {
        return self::convertDate($date)->endOfDay();
    }

    private static function getConfirmedOffers(int $pid): Collection
    {
        return Offer::prod($pid)
            ->accepted()
            ->new()
            ->orderBy('date_start')
            ->get();
    }

    private static function getUnhandledOffers(int $pid): Collection
    {
        return Offer::prod($pid)
            ->unhandled()
            ->old()
            ->orderBy('date_start')
            ->get();
    }

    private static function valid(array &$validated): void
    {
        $start = self::convertDateToStart($validated['date_start']);
        $end   = self::convertDateToEnd($validated['date_end']);

        // Start date bigger than end date
        if (!$start->lessThan($end)) {
            throw new \Exception('offerDatesInWrongOrder');
        }

        // Dates in the Past
        if (!$start->greaterThanOrEqualTo(Carbon::today()->startOfDay())) {
            throw new \Exception('offerDatesInThePast');
        }

        $confirmedOffers = self::getConfirmedOffers($validated['product_id']);

        if (count($confirmedOffers) > 0) {
            foreach ($confirmedOffers as $offer) {
                if (! ($end->lessThan($offer['date_start_with_time']) || $start->greaterThan($offer['date_end_with_time']))) {
                    throw new \Exception('offerDatesAlreadyTaken');
                }
            }
        }
    }

    public static function create(array &$validated): void
    {
        self::valid($validated);
    }

    public static function accept(Offer $offer): void
    {
        if ($offer['isUnhandled']) {
            throw new \Exception('offerAlreadyHandled');
        }

        $offer = $offer->toArray();
        self::valid($offer);
    }

    public static function reject(Offer $offer): void
    {
        if ($offer['isRejected']) {
            throw new \Exception('offerAlreadyHandled');
        }
    }

    public static function cancel(Offer $offer): void
    {
        if ($offer['isCanceled']) {
            throw new \Exception('offerAlreadyCanceled');
        }

        self::reject($offer);
    }

    private function __construct() {}
}
