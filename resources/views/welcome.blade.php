@extends('layouts.base')

@section('content')
<div class="container mx-auto">
    <div>
        <div class="mx-auto text-xl py-16 text-center">
            <h2 class="font-bold text-4xl mx-6 mb-12">{{ __('view.welcome.title') }}</h2>
            <div class="text-lg sm:text-xl mx-3 mb-12">{{ __('view.welcome.desc') }}</div>

            <div class="responsive-container">
            <iframe class="responsive-iframe w-full h-full top-0 left-0 border-0" src="https://www.youtube.com/embed/bK6XUxbbUEQ" style="border:0;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
