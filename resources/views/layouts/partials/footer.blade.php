@section('footer')

<footer class="text-white text-sm z-50 relative bg-gray-900">
    <div class="container mx-auto flex flex-row items-center justify-center py-3">
        <div>
            <span class="font-semibold tracking-tight">
                {{ __('base.siteName') }} {{ date('Y') }}
            </span>{{ __('base.rights') }}
        </div>
    </div>
</footer>

@endsection