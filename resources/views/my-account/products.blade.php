@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-addresses-panels">

    <div class="main-addresses-panel">

        <h2>Lista przedmiotów</h2>

        @if (count($products) > 0)
        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th>ID</th>
                    <th>Zdjęcie</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                    <th>Aktywne</th>
                    <th>Premium</th>
                    <th>Data dodania</th>
                    <th>Akcje</th>
                </tr>

                @foreach ($products as $product)
                <tr>
                    <td>
                        {{ $product['id'] }}
                    </td>
                    <td>
                        <img src="{{ asset('/assets/images/avatar.jpg') }}" alt="Item" />
                    </td>
                    <td>
                        <span class="block pb-2">{{ $product['name'] }}</span>
                        <hr class="pb-2">
                        <span class="block lg:inline text-xs">Ocena: 4</span><span class="block lg:inline text-xs">Ilość
                            ofert: 111</span>
                    </td>
                    <td>
                        {{ $product['price'] }} zł
                    </td>
                    <td>
                        {!! $product['visible'] ? '<span class="text-green-600 text-2xl"><i class="fa fa-check"
                                aria-hidden="true"></i></span>' : '<span class="text-red-500 text-2xl"><i
                                class="fa fa-times" aria-hidden="true"></i></span>' !!}
                    </td>
                    <td>
                        {!! $product['premium'] ? '<span class="text-green-600 text-2xl"><i class="fa fa-check"
                                aria-hidden="true"></i></span>' : '<span class="text-red-500 text-2xl"><i
                                class="fa fa-times" aria-hidden="true"></i></span>' !!}
                    </td>
                    <td>
                        {{ $product['created_at'] }}
                    </td>
                    <td class="py-6 flex justify-end lg:justify-center items-center">
                        <a href="" class="block pr-3 text-black text-2xl"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="" class="block text-red-500 text-2xl"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        @endif

    </div>
</div>

@endsection