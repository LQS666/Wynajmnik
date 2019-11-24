@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-addresses-panels">

    <div class="main-addresses-panel">
        <h2 class="font-semibold">{{ __('dashboard/address.title') }}</h2>

        <div class="container">
            <form method="post" action="{{ route('my-account.addresses') }}" id="addEditForm" class="form">
                @csrf
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.street') }}</label>
                    <input type="text" name="street" id="street" value="{{ old('street') }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.home_number') }}</label>
                    <input type="text" name="home_number" id="home_number" value="{{ old('home_number') }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.apartment_number') }}</label>
                    <input type="text" name="apartment_number" id="apartment_number" value="{{ old('apartment_number') }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.zip_code') }}</label>
                    <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.city') }}</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" />
                </div>
                <div class="flex justify-center">
                    <button id="button_save" class="button button--block">{{ __('dashboard/address.save') }}</button>
                    <button id="button_clear" class="button button--block">{{ __('dashboard/address.clear') }}</button>
                </div>
            </form>
            @if (count($addresses) > 0)
                @foreach ($addresses as $address)
                <a href="{{ route('my-account.address', ['address' => $address['id']]) }}">
                    <div id="template" class="address" data-id="{{ $address['id'] }}">
                        <div>
                            <span class="address__street">{{ $address['street'] }}</span>
                            <span class="address__home_number">{{ $address['home_number'] }}</span>
                            <span class="address__apartment_number">{{ $address['apartment_number'] }}</span>
                        </div>
                        <div>
                            <span class="address__zip_code">{{ $address['zip_code'] }}</span>
                            <span class="address__city">{{ $address['city'] }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', init);
function init() {
    document.getElementById("button_clear").addEventListener('click', clearForm);
}

function clearForm(e) {
    if (e) {
        e.preventDefault();
    }
    document.getElementById('addEditForm').reset();
}
</script>
