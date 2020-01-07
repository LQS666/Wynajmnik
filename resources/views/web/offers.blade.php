@extends('layouts.base')

@section('content')

<div class="container">
    {{ dd($category) }}
    {{ dd($categories) }}
    {{ dd($current) }}
    {{ dd($filters) }}
    {{ dd($products) }}
</div>

@endsection
