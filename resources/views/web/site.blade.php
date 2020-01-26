@extends('layouts.base')

@section('content')

<div class="site">
    <div class="container" data-aos="fade">
        <h2>{{ $site->name }}</h2>
        <div class="site__bar">
            <span>{{ __('dashboard/site.author') }}: </span><span class="site__bar__author">{{ $site->author }}</span>
        </div>
        <div class="site__content">{!! $site->content !!}</div>
    </div>
</div>

@endsection