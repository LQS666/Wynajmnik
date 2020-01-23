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

    private static function isUnhandled(Offer $offer): bool
    {
        return (!is_null($offer['accepted_at']) || !is_null($offer['rejected_at']));
    }

    private static function isCanceled(Offer $offer): bool
    {
        return !is_null($offer['deleted_at']);
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
        if (self::isUnhandled($offer)) {
            throw new \Exception('offerAlreadyHandled');
        }

        self::valid($offer->toArray());
        //self::clear($offer->product_id); // TODO reject rubbish offers
    }

    public static function reject(Offer $offer): void
    {
        if (self::isUnhandled($offer)) {
            throw new \Exception('offerAlreadyHandled');
        }
    }

    public static function cancel(Offer $offer): void
    {
        if (self::isCanceled($offer)) {
            throw new \Exception('offerAlreadyCanceled');
        }

        self::reject($offer);
    }

    //private static function clear(int $pid): void
    //{
    //    $unhandledOffers = self::getUnhandledOffers($pid);
    //    if (count($unhandledOffers) > 0) {
    //        foreach ($unhandledOffers as $offer) {
    //            $offer->update([
    //                'rejected_at' => time()
    //            ]);
    //        }
    //    }
    //}

    private function __construct() {}
}
