@extends('layouts.admin')

@section('title', '')

@section('categories')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">
        <h2 class="font-semibold"></h2>

        <div class="container">
            {{ dd($category) }}
            {{ dd($categories) }}
        </div>
    </div>
</div>

@endsection