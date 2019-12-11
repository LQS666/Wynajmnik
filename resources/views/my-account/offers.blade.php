@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product.title') }}</h2>

        @if (count($offers) > 0)

        <div class="table-items">
            @foreach($offers as $offer)
                {{ $offer }}
            @endforeach
        </div>

        @endif

    </div>
</div>

@endsection
