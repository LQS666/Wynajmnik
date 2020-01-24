@extends('layouts.admin')

@section('title', __('dashboard/offer.title-my'))

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/offer.title-my') }}</h2>

        <div class="flex mb-12 justify-around w-1/2">
            <a href="{{ route('my-account.my-offers') }}" class="mx-6">{{ __('dashboard/offer.all') }}</a>
            <a href="{{ route('my-account.my-offers', ['status' => 'accepted']) }}" class="mx-6">{{ __('dashboard/offer.accept') }}</a>
            <a href="{{ route('my-account.my-offers', ['status' => 'rejected']) }}" class="mx-6">{{ __('dashboard/offer.reject') }}</a>
            <a href="{{ route('my-account.my-offers', ['status' => 'waiting']) }}" class="mx-6">{{ __('dashboard/offer.wait') }}</a>
            <a href="{{ route('my-account.my-offers', ['status' => 'cancelled']) }}" class="mx-6">{{ __('dashboard/offer.cancel') }}</a>
        </div>

        @if (count($offers) > 0)

        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th>{{ __('dashboard/offer.item') }}</th>
                    <th>{{ __('dashboard/offer.note') }}</th>
                    <th>{{ __('dashboard/offer.price') }}</th>
                    <th>{{ __('dashboard/offer.date') }}</th>
                    <th>{{ __('dashboard/offer.status') }}</th>
                    <th>{{ __('dashboard/offer.cancel_btn') }}</th>
                </tr>

                @foreach($offers as $offer)
                <tr>
                    <td class="offer flex justify-center">
                        @if (count($offer->product->images) > 0)
                        <a href="{{ route('web.product', ['product' => $offer->product['slug']]) }}">
                            <img class="itemImg" src="{{ Storage::url($offer->product->images->first()['file']) }}" />
                        </a>
                        @else
                        <a href="{{ route('web.product', ['product' => $offer->product['slug']]) }}">
                            <img class="itemImg" src="{{ asset('/assets/images/item.jpeg')}}" />
                        </a>
                        @endif
                    </td>
                    <td class="offer">
                        {{ $offer['note'] }}
                    </td>
                    <td class="offer">
                        {{ $offer['price'] }} {{ __('dashboard/offer.currency') }}
                    </td>
                    <td class="offer">
                        {{ $offer['date_start'] }} - {{ $offer['date_end'] }}
                    </td>
                    <td class="offer">
                        {{ $offer['status'] }}
                    </td>
                    <td class="offer">
                        @if (!$offer['isUnhandled'] && !$offer['isCancelled'])
                            <form method="post" action="{{ route('my-account.my-offer', ['offer' => $offer['id']]) }}" class="mb-0">
                                @csrf
                                @method('delete')
                                <button class="button">{{ __('dashboard/offer.cancel_btn') }}</button>
                            </form>
                        @endif
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
