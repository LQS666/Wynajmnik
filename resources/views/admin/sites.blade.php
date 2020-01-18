@extends('layouts.admin')

@section('title', '')

@section('site')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">
        <h2 class="font-semibold"></h2>

        <div class="container">
            {{ dd($sites) }}
        </div>
    </div>
</div>

@endsection
