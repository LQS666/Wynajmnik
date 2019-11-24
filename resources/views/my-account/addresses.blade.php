@extends('layouts.admin')

@section('title', '')

@section('profile')


<div class="main-addresses-panels">

    <div class="main-addresses-panel">
        <h2 class="font-semibold">{{ __('dashboard/address.title') }}</h2>

        <div class="container">
            <form method="" action="" id="addEditForm" class="form">
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.street') }}</label>
                    <input type="text" id="street" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.home_number') }}</label>
                    <input type="text" id="home_number" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.apartment_number') }}</label>
                    <input type="text" id="apartment_number" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.zip_code') }}</label>
                    <input type="text" id="zip_code" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="email">{{ __('dashboard/address.city') }}</label>
                    <input type="text" id="city" />
                </div>
                <div class="flex justify-center">
                    <button id="button_save" class="button button--block">{{ __('dashboard/address.save') }}</button>
                    <button id="button_clear" class="button button--block">{{ __('dashboard/address.clear') }}</button>
                </div>
            </form>
        </div>

        <div id="template" class="address" hidden="true" data-id="1">
            <div>
                <span class="address__street"></span>
                <span class="address__home_number"></span>
                <span class="address__apartment_number"></span>
            </div>
            <div>
                <span class="address__zip_code"></span>
                <span class="address__city"></span>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    const addresses = JSON.parse('{!! json_encode($addresses) !!}');
let container;
let currentAddress = 0;

document.addEventListener('DOMContentLoaded', init);
function init() {
    document.getElementById("button_clear").addEventListener('click', clearForm);
    document.getElementById("button_save").addEventListener('click', saveAddress);
    container = document.querySelector('.container');
    addPanels();
}

function addPanels() {
    addresses.forEach(function (address) {
        addPanel(address);
    })
}

function addPanel(address) {
    const div = document.getElementById('template');
    const newAddress = div.cloneNode(true);
    newAddress.removeAttribute('hidden');
    newAddress.setAttribute('data-id', address.id);
    newAddress.querySelector('.address__street').textContent = address.street;
    newAddress.querySelector('.address__home_number').textContent = address.home_number;
    newAddress.querySelector('.address__apartment_number').textContent = address.apartment_number;
    newAddress.querySelector('.address__zip_code').textContent = address.zip_code;
    newAddress.querySelector('.address__city').textContent = address.city;
    container.appendChild(newAddress);
    newAddress.addEventListener('click', showPanelInForm);
}

function editPanel(address) {
    let panels = document.querySelectorAll('.address');
    let panelsLength = panels.length;
    for (let c = 0; c < panelsLength; c++) {
        if (panels[c].getAttribute('data-id') == address.id) {
            panels[c].querySelector('.address__street').textContent = address.street;
            panels[c].querySelector('.address__home_number').textContent = address.home_number;
            panels[c].querySelector('.address__apartment_number').textContent = address.apartment_number;
            panels[c].querySelector('.address__zip_code').textContent = address.zip_code;
            panels[c].querySelector('.address__city').textContent = address.city;
            break;
        }
    }
}

function saveAddress(e) {
    e.preventDefault();
    if (document.getElementById('street').value
        && document.getElementById('home_number').value
        && document.getElementById('apartment_number').value
        && document.getElementById('zip_code').value
        && document.getElementById('city').value) {
        const address = {
            street: document.getElementById('street').value,
            home_number: document.getElementById('home_number').value,
            apartment_number: document.getElementById('apartment_number').value,
            zip_code: document.getElementById('zip_code').value,
            city: document.getElementById('city').value
        }
        if (currentAddress == 0) {
            address.id = Date.now();
            addPanel(address);
        } else {
            address.id = currentAddress;
            editPanel(address);
        }
        clearForm();
    }
}

function showPanelInForm(e) {
    let panel = e.currentTarget;
    while (!panel.classList.contains('address')) {
        panel = panel.parentElement;
    }
    const address = {
        id: panel.getAttribute('data-id'),
        street: panel.querySelector('.address__street').textContent,
        home_number: panel.querySelector('.address__home_number').textContent,
        apartment_number: panel.querySelector('.address__apartment_number').textContent,
        zip_code: panel.querySelector('.address__zip_code').textContent,
        city: panel.querySelector('.address__city').textContent
    }
    currentAddress = address.id;
    document.getElementById('street').value = address.street;
    document.getElementById('home_number').value = address.home_number;
    document.getElementById('apartment_number').value = address.apartment_number;
    document.getElementById('zip_code').value = address.zip_code;
    document.getElementById('city').value = address.city;
}

function clearForm(e) {
    if (e) {
        e.preventDefault();
    }
    document.getElementById('addEditForm').reset();
    currentAddress = 0;
}

</script>