@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">
        <h2 class="font-semibold">{{ __('dashboard/address.title') }}</h2>

        <div class="container">
            <div class="flex">
                <button class="main-addresses-panel__button button">{{ __('dashboard/address.add') }}</button>
            </div>
            @if (count($addresses) > 0)
            @foreach ($addresses as $address)
            <a href="{{ route('my-account.address', ['address' => $address['id']]) }}">
                <div class="address" data-id="{{ $address['id'] }}">
                    <div>
                        <div>
                            <span class="address__street">ul. {{ $address['street'] }}</span>
                            <span class="address__home_number">{{ $address['home_number'] }}</span>
                            <span class="address__apartment_number">{{ $address['apartment_number'] }}</span>
                        </div>
                        <div>
                            <span class="address__zip_code">{{ $address['zip_code'] }}</span>
                            <span class="address__city">{{ $address['city'] }}</span>
                        </div>
                    </div>
                    <div class="address__edit"><i class="fa fa-pencil mr-2" aria-hidden="true"></i><span>{{ __('dashboard/address.edit') }}</span></div>
                </div>
            </a>
            @endforeach
            @endif

            <div class="addAddress__popup">
                <div class="addAddress__popup__content">
                    <img class="addAddress__popup__close" src="{{ asset('/assets/images/close.svg')}}" alt="close" />
                    <h2 class="addAddress__popup__title">Dodaj adres</h2>
                    <form method="post" action="{{ route('my-account.addresses') }}" id="addEditForm" class="form">
                        @csrf
                        <div class="form--input-box" data-title="address">
                            <label for="street">{{ __('dashboard/address.street') }}</label>
                            <input type="text" name="street" id="street" value="{{ old('street') }}" />
                        </div>
                        <div class="form--input-box" data-title="address">
                            <label for="home_number">{{ __('dashboard/address.home_number') }}</label>
                            <input type="text" name="home_number" id="home_number" value="{{ old('home_number') }}" />
                        </div>
                        <div class="form--input-box" data-title="address">
                            <label for="apartment_number">{{ __('dashboard/address.apartment_number') }}</label>
                            <input type="text" name="apartment_number" id="apartment_number"
                                value="{{ old('apartment_number') }}" />
                        </div>
                        <div class="form--input-box" data-title="address">
                            <label for="zip_code">{{ __('dashboard/address.zip_code') }}</label>
                            <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" />
                        </div>
                        <div class="form--input-box" data-title="address">
                            <label for="city">{{ __('dashboard/address.city') }}</label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}" />
                        </div>
                        <div class="flex justify-center mt-12">
                            <button id="button_save"
                                class="button">{{ __('dashboard/address.save') }}</button>
                            <button id="button_clear"
                                class="button button--purple">{{ __('dashboard/address.clear') }}</button>
                        </div>
                    </form>
                </div>
            </div>
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

    document.addEventListener('DOMContentLoaded', modal);
    function modal() {
        const addAddress__popup = document.querySelector('.addAddress__popup');
        const addAddress__button = document.querySelector('.main-addresses-panel__button');
        const addAddress__close = document.querySelector(".addAddress__popup__close");

        addAddress__button.addEventListener('click', function() {
            addAddress__popup.classList.add('is-visible');
        });
        
        addAddress__close.addEventListener('click', function() {
            addAddress__popup.classList.remove('is-visible');
        });
    }
</script>