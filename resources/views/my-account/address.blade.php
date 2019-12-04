@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-addresses-panels">

    <div class="main-addresses-panel">
        <h2 class="font-semibold">{{ __('dashboard/address.edit') }}</h2>

        <div class="container">
            <form method="post" action="{{ route('my-account.address', ['address' => $address['id']]) }}" id="addEditForm" class="form">
                @csrf
                @method('PATCH')
                <div class="form--input-box" data-title="address">
                    <label for="street">{{ __('dashboard/address.street') }}</label>
                    <input type="text" name="street" id="street" value="{{ old('street', $address['street']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="home_number">{{ __('dashboard/address.home_number') }}</label>
                    <input type="text" name="home_number" id="home_number" value="{{ old('home_number', $address['home_number']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="apartment_number">{{ __('dashboard/address.apartment_number') }}</label>
                    <input type="text" name="apartment_number" id="apartment_number" value="{{ old('apartment_number', $address['apartment_number']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="zip_code">{{ __('dashboard/address.zip_code') }}</label>
                    <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', $address['zip_code']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="city">{{ __('dashboard/address.city') }}</label>
                    <input type="text" name="city" id="city" value="{{ old('city', $address['city']) }}" />
                </div>
                <div class="flex justify-center mt-12">
                    <button id="button_save" class="button">{{ __('dashboard/address.save') }}</button>
                </div>
            </form>
            <form method="post" action="{{ route('my-account.address', ['address' => $address['id']]) }}" id="addDeleteForm" class="form">
                @csrf
                @method('DELETE')
                <div class="flex">
                    <a href="{{ route('my-account.addresses') }}" class="button font-normal">{{ __('dashboard/address.return') }}</a>
                    <button id="button_save" class="button button--danger ml-3">{{ __('dashboard/address.delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
