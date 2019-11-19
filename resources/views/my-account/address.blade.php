@extends('layouts.base')

@section('title', '')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div>
            <div>{{ $address->street . ' : ' . $address->home_number . ' : ' . $address->apartment_number . ' : ' . $address->city . ' : ' . $address->zip_code }}</div>
        </div>
    </div>
</div>

@endsection
