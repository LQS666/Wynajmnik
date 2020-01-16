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
                    <th>{{ __('dashboard/offer.item') }}</th>
                    <th>{{ __('dashboard/offer.price') }}</th>
                    <th>{{ __('dashboard/offer.date_start') }}</th>
                    <th>{{ __('dashboard/offer.date_end') }}</th>
                    <th>{{ __('dashboard/offer.status') }}</th>
                </tr>

                @foreach($offers as $offer)
                <tr>
                    <td class="offer flex justify-center">
                        @if (count($offer->product->images) > 0)
                        <img class="itemImg" src="{{ Storage::url($offer->product->images->first()['file']) }}" />
                        @else
                        <img class="itemImg" src="{{ asset('/assets/images/item.jpeg')}}" />
                        @endif
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
                        @if (true)
                            {{ __('dashboard/offer.accepted') }}
                        @endif
                        {{-- @if (true)
                            {{ __('dashboard/offer.rejected') }}
                        @endif
                        @if (true)
                            {{ __('dashboard/offer.waiting') }}
                        @endif --}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="pagination-container">
            {{ $offers->links() }}
        </div>

        @else

        <div class="flex justify-center items-center bg-purple-main w-1/2 py-3 rounded-lg">
            {{ __('dashboard/offer.empty-table') }}
        </div>

        @endif

    </div>
</div>

@endsection
