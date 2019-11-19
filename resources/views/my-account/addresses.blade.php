@extends('layouts.base')

@section('title', '')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div>
            @foreach ($addresses as $address)
                <div>{{ $address->street . ' : ' . $address->home_number . ' : ' . $address->apartment_number . ' : ' . $address->city . ' : ' . $address->zip_code }}</div>
            @endforeach
        </div>
    </div>
</div>

@endsection
