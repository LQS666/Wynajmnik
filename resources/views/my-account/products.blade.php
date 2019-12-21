@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product.title') }}</h2>

        @if (count($products) > 0)
        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th>{{ __('dashboard/product.photo') }}</th>
                    <th>{{ __('dashboard/product.name') }}</th>
                    <th>{{ __('dashboard/product.price') }}</th>
                    <th>{{ __('dashboard/product.visible') }}</th>
                    <th>{{ __('dashboard/product.premium') }}</th>
                    <th>{{ __('dashboard/product.add_date') }}</th>
                    <th>{{ __('dashboard/product.actions') }}</th>
                </tr>

                @foreach ($products as $product)
                <tr>
                    <td class="product flex justify-center">
                        <img src="{{ asset('/assets/images/avatar.jpg') }}" alt="Item" />
                    </td>
                    <td class="product">
                        <span class="block pb-2">{{ Str::limit($product['name'], 80, ' ...') }}</span>
                        <hr class="pb-2">
                        <span
                            class="block lg:inline text-xs font-semibold text-black">{{ __('dashboard/product.rate') }}:</span>
                        <span class="block lg:inline text-xs font-semibold text-purple-second">4</span>
                        <span
                            class="block lg:inline text-xs font-semibold text-black">{{ __('dashboard/product.offers_length') }}:</span>
                        <span class="block lg:inline text-xs font-semibold text-purple-second">111</span>
                    </td>
                    <td class="product">
                        {{ $product['price'] }} {{ __('dashboard/product.currency') }}
                    </td>
                    <td class="product">
                        {!! $product['visible'] ? '<span class="text-green-600 text-2xl"><i class="fa fa-check"
                                aria-hidden="true"></i></span>' : '<span class="text-red-500 text-2xl"><i
                                class="fa fa-times" aria-hidden="true"></i></span>' !!}
                    </td>
                    <td class="product">
                        {!! $product['premium'] ? '<span class="text-green-600 text-2xl"><i class="fa fa-check"
                                aria-hidden="true"></i></span>' : '<span class="text-red-500 text-2xl"><i
                                class="fa fa-times" aria-hidden="true"></i></span>' !!}
                    </td>
                    <td class="product">
                        {{ $product['created_at'] }}
                    </td>
                    <td class="product flex justify-end items-center">
                        <a href="{{ route('my-account.product', ['product' => $product['id']]) }}"
                            class="block pr-3 text-black text-2xl"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form method="post" action="{{ route('my-account.product', ['product' => $product['id']]) }}"
                            id="addDeleteForm" class="form m-0">
                            @csrf
                            @method('DELETE')
                            <button>
                                <span class="block text-red-500 text-2xl">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        @endif

    </div>
</div>

@endsection