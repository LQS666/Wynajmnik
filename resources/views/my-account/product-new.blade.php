@extends('layouts.admin')

@section('title', __('dashboard/product-add.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product-add.title') }}</h2>

        <form method="POST" action="{{ route('my-account.product-new') }}" id="product-add">
            @csrf
            <div class="progress-wrap">
                <div class="line-progress-bar">
                    <div class="line"></div>
                    <ul class="checkout-bar">
                        <li class="progressbar-dots active"><span>1</span></li>
                        <li class="progressbar-dots"><span>2</span></li>
                        <li class="progressbar-dots"><span>3</span></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-panel" id="step1">
                    <p class="my-6 py-3 px-6 border text-center bg-purple-third rounded-lg font-semibold">
                        {{ __('dashboard/product-add.step1') }}</p>
                    <ul>
                        <li>
                            <label>{{ __('dashboard/product-add.name') }}</label>
                            <div class="errorTxt"></div>
                            <input type="text" name="name"
                                placeholder="{{ __('dashboard/product-add.name-placeholder') }}">
                        </li>
                        <li>
                            <label>{{ __('dashboard/product-add.desc') }}</label>
                            <textarea rows="4" cols="50" name="desc"
                                placeholder="{{ __('dashboard/product-add.desc-placeholder') }}"></textarea>
                        </li>
                        <li>
                            <label>{{ __('dashboard/product-add.photos') }}</label>
                            <div id="selectedFiles">
                                <div class="uploadContainer">
                                    <input class="upload" type="file" id="files" name="pictures[]" multiple>
                                    <div class="uploadText">
                                        <img src="{{ asset('/assets/images/icons/add_img.svg')}}" alt="">
                                        <p>{{ __('dashboard/product-add.add-photos') }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="flex justify-center mt-6" style="list-style: none;">
                            <button class="button step1" type="button">{{ __('dashboard/product-add.next') }}</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-panel" id="step2">
                    <p class="my-6 py-5 px-6 border text-center bg-purple-third rounded-lg font-semibold">
                        {{ __('dashboard/product-add.step2') }}</p>
                    <ul>
                        @if (count($categories) > 0)
                        <li>
                            <label>{{ __('dashboard/product-add.category') }}</label>
                            <div class="errorTxt"></div>
                            <select id="category" name="category">
                                <option value="">{{ __('dashboard/product-add.select') }}</option>
                                @foreach ($categories as $category)
                                <option class="{{ $category['id'] }}" value="{{ $category['id'] }}">
                                    {{ Str::limit($category['name'], 40, ' ...') }}</option>
                                @endforeach
                            </select>
                        </li>

                        <li class="subcat hidden">
                            <label>{{ __('dashboard/product-add.subcategory') }}</label>
                            <div class="errorTxt"></div>
                            <div class="cat cat1 hidden">
                                <select name="subcategory">
                                    @foreach ($categories as $category)
                                    @foreach($category['subcategories'] as $subcategories)
                                    @if($subcategories->sub === 1)
                                    <option value="{{ $subcategories['id'] }}">
                                        {{ Str::limit($subcategories['name'], 40, ' ...') }}
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
                        </li>
                        @endif

                        @if (count($filters) > 0)
                        <li>
                            <label>{{ __('dashboard/product-add.filters') }}</label>
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
                        </li>
                        @endif

                        <li class="flex justify-center mt-6" style="list-style: none;">
                            <button class="button step2" type="button">{{ __('dashboard/product-add.next') }}</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-panel" id="step3">
                    <p class="my-6 py-5 px-6 border text-center bg-purple-third rounded-lg font-semibold">
                        {{ __('dashboard/product-add.step3') }}</p>
                    <ul>
                        <li>
                            <label class="checkbox py-2 border-b border-purple-main">
                                <input type="checkbox" name="premium" id="premium" value="false">
                                <span class="checking"></span>
                                <span>{{ __('dashboard/product-add.premium') }}</span>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox py-2 border-b border-purple-main">
                                <input type="checkbox" name="visible" id="visible" value="false">
                                <span class="checking"></span>
                                <span>{{ __('dashboard/product-add.visible') }}</span>
                            </label>
                        </li>
                        <li>
                            <label>{{ __('dashboard/product-add.price') }}</label>
                            <div class="errorTxt"></div>
                            <input type="number" name="price">
                        </li>
                        <li>
                            <label>{{ __('dashboard/product-add.address') }}</label>
                            <select name="address">
                                @foreach($user["addresses"] as $addresses)
                                <option class="text-sm" value="{{ $addresses['id'] }}">
                                    ul. {{ $addresses['street'] }}
                                    {{ $addresses['home_number'] }}/{{ $addresses['apartment_number'] }},
                                    {{ $addresses['zip_code'] }} {{ $addresses['city'] }}
                                </option>
                                @endforeach
                            </select>
                        </li>
                        <li class="flex justify-center mt-6">
                            <button class="button submit-btn"
                                type="submit">{{ __('dashboard/product-add.submit') }}</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection