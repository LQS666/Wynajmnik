@extends('layouts.base')

@section('content')

<div class="container">
    {{ dd($products) }}
    {{ dd($category) }}
    {{ dd($categories) }}
    {{ dd($current) }}
    {{ dd($filters) }}
</div>

@endsection
