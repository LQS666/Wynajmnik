@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product-add.title') }}</h2>

        <form action="#" id="product-add">
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
                    <p class="my-6 py-3 px-6 border text-center bg-purple-third rounded-lg font-semibold">Podstawowe
                        informacje</p>
                    <ul>
                        <li>
                            <label>Nazwa</label>
                            <div class="errorTxt"></div>
                            <input type="text" name="name" placeholder="Wpisz nazwę przedmiotu">
                        </li>
                        <li>
                            <label>Opis</label>
                            <textarea rows="4" cols="50" name="desc" placeholder="Napisz coś więcej o przedmiocie"></textarea>
                        </li>
                        <li>
                            <label>Zdjęcia</label>
                            <div id="selectedFiles">
                                <div class="uploadContainer">
                                    <input class="upload" type="file" id="files" name="pictures[]" multiple>
                                    <div class="uploadText">
                                        <img src="{{ asset('/assets/images/add_img.svg')}}" alt="">
                                        <p>Dodaj zdjęcia</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="flex justify-center mt-6" style="list-style: none;">
                            <button class="button step1" type="button">Dalej</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-panel" id="step2">
                    <p class="my-6 py-5 px-6 border text-center bg-purple-third rounded-lg font-semibold">Wybór
                        kategorii i ustawienie filtrów - uzupełnij
                        je, aby zwiększyć zainteresowanie ofertą</p>
                    <ul>
                        @if (count($categories) > 0)
                        <li>
                            <label>Kategoria</label>
                            <div class="errorTxt"></div>
                            <select id="category" name="category">
                                <option value="">Wybierz</option>
                                @foreach ($categories as $category)
                                <option class="{{ $category['id'] }}" value="{{ $category['id'] }}">
                                    {{ Str::limit($category['name'], 40, ' ...') }}</option>
                                @endforeach
                            </select>
                        </li>

                        <li class="subcat hidden">
                            <label>Podkategoria</label>
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
                        <li >
                            <label>Filtry ( opcjonalnie )</label>
                            @foreach ($filters as $filter)
                            <label class="checkbox py-2 border-b border-purple-main">
                                <input type="checkbox" id="{{ $filter['id'] }}" value="{{ $filter['id'] }}">
                                <span class="checking"></span>
                                <span>{{ $filter['name'] }}</span>
                            
                            @foreach($filter['values'] as $values)
                            <div class="area{{ $filter['id'] }} hidden ml-6 mt-2">
                                <label>
                                    <input type="checkbox" name="{{ $values['value'] }}" value="{{ $values['value'] }}">
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
                            <button class="button step2" type="button">Dalej</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-panel" id="step3">
                    <p class="my-6 py-5 px-6 border text-center bg-purple-third rounded-lg font-semibold">Ustal miejsce odbioru, cenę
                        przedmiotu i termin trwania ogłoszenia</p>
                    <ul>
                        <li>
                            <label>Adres</label>
                            <div class="errorTxt"></div>
                            <select name="address">
                                <option value="">Wybierz</option>
                                <option value="adres1">Adres</option>
                                <option value="adres2">Adres</option>
                                <option value="adres3">Adres</option>
                            </select>
                        </li>
                        <li>
                            <label>Cena</label>
                            <div class="errorTxt"></div>
                            <input type="number" name="price">
                        </li>
                        <li>
                            <label>Data od</label>
                            <div class="errorTxt"></div>
                            <input type="date" name="dateFrom" value="2019-12-26">
                        </li>
                        <li>
                            <label>Data do</label>
                            <div class="errorTxt"></div>
                            <input type="date" name="dateTo" value="2019-12-26">
                        </li>
                        <li class="flex justify-center mt-6">
                            <button class="button submit-btn" type="submit">Dodaj przedmiot</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection