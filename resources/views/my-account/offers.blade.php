@extends('layouts.admin')

@section('title', __('dashboard/offer.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/offer.title') }}</h2>

        @if (count($offers) > 0)

        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th>{{ __('dashboard/offer.photo') }}</th>
                    <th>{{ __('dashboard/offer.name') }}</th>
                    <th>{{ __('dashboard/offer.price') }}</th>
                    <th>{{ __('dashboard/offer.date_start') }}</th>
                    <th>{{ __('dashboard/offer.date_end') }}</th>
                    <th>{{ __('dashboard/offer.accepted_at') }}</th>
                    <th>{{ __('dashboard/offer.rejected_at') }}</th>
                </tr>

                @foreach($offers as $offer)
                <tr>
                    <td class="offer flex justify-center">
                        <img src="{{ asset('/assets/images/avatar.jpg') }}" alt="Item" />
                    </td>
                    <td class="offer">
                        <span class="block pb-2">{{ Str::limit($offer['name'], 80, ' ...') }}</span>
                    </td>
                    <td class="offer">
                        {{ $offer['price'] }} {{ __('dashboard/offer.currency') }}
                    </td>
                    <td class="offer">
                        {{ $offer['date_start'] }}
                    </td>
                    <td class="offer">
                        {{ $offer['date_end'] }}
                    </td>
                    <td class="offer">
                        {!! $offer['accepted_at'] ? $offer['accepted_at'] : '-' !!}
                    </td>
                    <td class="offer">
                        {!! $offer['rejected_at'] ? $offer['rejected_at'] : '-' !!}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        @else

        <div class="flex justify-center items-center bg-purple-main w-1/2 py-3 rounded-lg">
            {{ __('dashboard/offer.empty-table') }}
        </div>

        @endif

    </div>
</div>

@endsection
