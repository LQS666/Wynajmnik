@extends('layouts.admin')

@section('title', __('dashboard/site.site') . ' - ' . $site['name'])

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <div class="flex justify-between w-full mb-3">
            <a href="{{ route('admin.sites') }}" class="button button--purple font-normal">{{ __('dashboard/site.back') }}</a>
            <form method="post" action="{{ route('admin.site', ['site' => $site]) }}" class="m-0">
                @csrf
                @method('delete')
                <button class="button">{{ __('dashboard/site.btn_delete') }}</button>
            </form>
        </div>

        <h2 class="font-semibold">{{ __('dashboard/site.site') . ' - ' . $site['name'] }}</h2>

        <div class="container">
            <form method="POST" action="{{ route('admin.site', ['site' => $site]) }}" id="product-add">
                @csrf
                @method('patch')
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="name">{{ __('dashboard/site.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $site['name']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="desc">{{ __('dashboard/site.content') }}</label>
                    <textarea id="wysiwyg" name="content" rows="10" cols="50">{{ old('content', $site['content']) }}</textarea>
                </div>
                <div class="form--input-box" data-title="address">
                    <label class="font-semibold" for="author">{{ __('dashboard/site.author') }}</label>
                    <input type="text" name="author" id="author" value="{{ old('author', $site['author']) }}" />
                </div>

                <div class="w-full flex">
                    <label class="checkbox">
                        <input type="checkbox" name="visible" id="visible" value="1" {{ $site['visible'] ? 'checked="checked"' : '' }}>
                        <span class="checking"></span>
                        <span>{{ __('dashboard/site.visible') }}</span>
                    </label>
                </div>

                <div class="flex justify-center mt-6">
                    <button class="button">{{ __('dashboard/site.btn_change') }}</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
