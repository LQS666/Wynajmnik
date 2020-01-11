@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product.edit') }}</h2>

        <div class="container">
            <form method="post" action="{{ route('my-account.product', ['product' => $product['slug']]) }}"
                id="product-add" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="name">{{ __('dashboard/product.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product['name']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="desc">{{ __('dashboard/product.desc') }}</label>
                    <textarea name="desc" rows="10" cols="50">{{$product['desc']}}</textarea>
                </div>
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="price">{{ __('dashboard/product.price') }}</label>
                    <input type="text" name="price" id="price" value="{{ old('price', $product['price']) }}" />
                </div>
                {!! $product['visible'] ?
                '' : '
                <div>
                    <label class="checkbox py-2 border-b border-purple-main">
                        <input type="checkbox" name="visible" id="visible" value="false">
                        <span class="checking"></span>
                        <span>Aktualne</span>
                    </label>
                </div>'
                !!}

                {!! $product['premium'] ?
                '' : '
                <div>
                    <label class="checkbox py-2 border-b border-purple-main">
                        <input type="checkbox" name="premium" id="premium" value="false">
                        <span class="checking"></span>
                        <span>Premium</span>
                    </label>
                </div>'
                !!}


                @if (count($categories) > 0)
                <div>
                    <label class="font-semibold">{{ __('dashboard/product-add.category') }}</label>
                    <div class="errorTxt"></div>
                    <select id="category" name="category">
                        <option value="">{{ __('dashboard/product-add.select') }}</option>
                        @foreach ($categories as $category)
                        <option class="{{ $category['id'] }}" value="{{ $category['id'] }}">
                            {{ Str::limit($category['name'], 100, ' ...') }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="subcat hidden">
                    <label class="font-semibold">{{ __('dashboard/product-add.subcategory') }}</label>
                    <div class="errorTxt"></div>
                    <div class="cat cat1 hidden">
                        <select name="subcategory">
                            @foreach ($categories as $category)
                            @foreach($category['subcategories'] as $subcategories)
                            @if($subcategories->sub === 1)
                            <option value="{{ $subcategories['id'] }}">
                                {{ Str::limit($subcategories['name'], 100, ' ...') }}
                            </option>
                            @endif
                            @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="cat cat2 hidden">
                        <select name="subcategory">
                            @foreach ($categories as $category)
                            @foreach($category['subcategories'] as $subcategories)
                            @if($subcategories->sub === 2)
                            <option value="{{ $subcategories['id'] }}">
                                {{ Str::limit($subcategories['name'], 40, ' ...') }}
                            </option>
                            @endif
                            @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif

                @if (count($filters) > 0)
                <div>
                    <label class="font-semibold">{{ __('dashboard/product-add.filters') }}</label>
                    @foreach ($filters as $filter)
                    <label class="checkbox py-2 border-b border-purple-main">
                        <input type="checkbox" id="{{ $filter['id'] }}" value="{{ $filter['id'] }}">
                        <span class="checking"></span>
                        <span>{{ $filter['name'] }}</span>
                        @foreach($filter['values'] as $values)
                        <div class="area{{ $filter['id'] }} hidden ml-6 mt-2">
                            <label>
                                <input type="checkbox" name="filters[]" value="{{ $values['id'] }}">
                                <span class="checking"></span>
                                <span>{{ $values['value'] }}</span>
                            </label>
                        </div>
                        @endforeach
                    </label>
                    @endforeach
                </div>
                @endif

                <div>
                    <label class="font-semibold">{{ __('dashboard/product-add.address') }}</label>
                    <select name="address">
                        @foreach($user["addresses"] as $addresses)
                        @if ( $product['user_address_id'] === $addresses['id'] )
                        <option class="text-sm" selected value="{{ $addresses['id'] }}">
                            ul. {{ $addresses['street'] }}
                            {{ $addresses['home_number'] }}/{{ $addresses['apartment_number'] }},
                            {{ $addresses['zip_code'] }} {{ $addresses['city'] }}
                        </option>
                        @else 
                        <option class="text-sm" value="{{ $addresses['id'] }}">
                            ul. {{ $addresses['street'] }}
                            {{ $addresses['home_number'] }}/{{ $addresses['apartment_number'] }},
                            {{ $addresses['zip_code'] }} {{ $addresses['city'] }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="font-semibold">{{ __('dashboard/product-add.photos') }}</label>
                    <div id="selectedFiles">
                        <div class="uploadContainer">
                            <input class="upload" type="file" id="files" name="pictures[]" multiple>
                            <div class="uploadText">
                                <img src="{{ asset('/assets/images/icons/add_img.svg')}}" alt="">
                                <p>{{ __('dashboard/product-add.add-photos') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-12">
                    <a href="{{ route('my-account.products') }}"
                        class="button button--purple font-normal">{{ __('dashboard/product.return') }}</a>
                    <button id="button_save" class="button">{{ __('dashboard/product.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection