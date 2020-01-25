@extends('layouts.admin')

@section('title', __('dashboard/category.category') . ' - ' . $category['name'])

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <div class="flex justify-between w-full mb-3">
            <a href="{{ route('admin.categories') }}" class="button button--purple font-normal">{{ __('dashboard/category.back') }}</a>
            <form method="post" action="{{ route('admin.category', ['category' => $category]) }}" class="m-0">
                @csrf
                @method('delete')
                <button class="button">{{ __('dashboard/category.btn_delete') }}</button>
            </form>
        </div>

        <h2 class="font-semibold">{{ __('dashboard/category.category') . ' - ' . $category['name'] }}</h2>

        <div class="container">
            <form method="POST" action="{{ route('admin.category', ['category' => $category]) }}" id="product-add">
                @csrf
                @method('patch')
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="name">{{ __('dashboard/category.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category['name']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="desc">{{ __('dashboard/category.desc') }}</label>
                    <textarea id="wysiwyg" name="desc" rows="10" cols="50">{{ old('desc', $category['desc']) }}</textarea>
                </div>

                <div class="w-full flex">
                    <label class="checkbox">
                        <input type="checkbox" name="visible" id="visible" value="1" {{ $category['visible'] ? 'checked="checked"' : '' }}>
                        <span class="checking"></span>
                        <span>{{ __('dashboard/category.visible') }}</span>
                    </label>
                </div>

                <div class="flex justify-center mt-6">
                    <button class="button">{{ __('dashboard/category.btn_change') }}</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
