@section('context-menu')

<div class="hidden group-hover:block absolute right-0 w-56 py-3 bg-white rounded-lg shadow-xl text-sm">
    <span class="block px-4 pt-6 text-black text-lg font-semibold rounded">
        {{ $user['name'] . ' ' . $user['surname'] }}
    </span>
    <span class="block px-4 pb-4 text-black rounded font-normal">
        {{ $user['email'] }}
    </span>
    <div class="w-full border-gray-200 border-b-2"></div>
    <a href="{{ route('admin.profile') }}"
        class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.myAccount') }}</a>
    <div class="w-full border-gray-200 border-b-2"></div>
    <a href="{{ route('logout') }}"
        class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.logout') }}</a>
</div>

@endsection
