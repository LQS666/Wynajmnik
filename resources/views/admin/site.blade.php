@extends('layouts.admin')

@section('title', '')

@section('sites')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">
        <h2 class="font-semibold"></h2>

        <div class="container">
            {{ dd($site) }}
        </div>
    </div>
</div>

@endsection
