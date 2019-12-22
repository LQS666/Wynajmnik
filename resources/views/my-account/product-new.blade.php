@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product.edit') }}</h2>

        <div class="container">
            ADD
            {{--@if (count($categories) > 0)
                @foreach ($categories as $category)
                    {{ $category }}
                    {{ $category['subcategories'] }}
                @endforeach
            @endif--}}

            {{--@if (count($filters) > 0)
                @foreach ($filters as $filter)
                    {{ $filter }}
                    {{ $filter['values'] }}
                @endforeach
            @endif--}}
        </div>
    </div>
</div>

@endsection
