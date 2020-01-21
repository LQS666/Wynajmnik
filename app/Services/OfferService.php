<?php

namespace App\Services;

use App\Offer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

final class OfferService
{
    private static function getConfirmedOffers(int $pid): Collection
    {
        return Offer::prod($pid)
            ->accepted()
            ->fromToday()
            ->orderBy('date_start')
            ->get();
    }

    private static function convertDate(string $date): Carbon
    {
        return Carbon::parse($date);
    }

    public static function valid(array $validated): void
    {
        $start = self::convertDate($validated['date_start'])->startOfDay();
        $end   = self::convertDate($validated['date_end'])->endofDay();

        // Start date bigger than end date
        if (!$start->lessThan($end)) {
            throw new \Exception(trans('message.offerDatesInWrongOrder'));
        }

        // Dates in the Past
        if (!$start->greaterThanOrEqualTo(Carbon::today()->startOfDay())) {
            throw new \Exception(trans('message.offerDatesInThePast'));
        }

        $confirmedOffers = self::getConfirmedOffers($validated['product_id']);

        if (count($confirmedOffers) > 0) {
            foreach ($confirmedOffers as $offer) {
                if (! ($end->lessThan($offer['date_start_full']) || $start->greaterThan($offer['date_end_full']))) {
                    throw new \Exception(trans('message.offerDatesAlreadyTaken'));
                }
            }
        }
    }

    private function __construct() {}
}
