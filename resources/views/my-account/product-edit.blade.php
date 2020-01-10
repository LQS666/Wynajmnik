@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product.edit') }}</h2>

        <div class="container">
            <form method="post" action="{{ route('my-account.product', ['product' => $product['slug']]) }}" class="form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form--input-box" data-title="address">
                    <label for="id">{{ __('dashboard/product.id') }}</label>
                    <input type="text" name="id" id="id" value="{{ old('id', $product['id']) }}" disabled />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="name">{{ __('dashboard/product.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product['name']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="desc">{{ __('dashboard/product.desc') }}</label>
                    <textarea name="desc" rows="10" cols="50" >{{$product['desc']}}</textarea>
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="price">{{ __('dashboard/product.price') }}</label>
                    <input type="text" name="price" id="price" value="{{ old('price', $product['price']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="visible">{{ __('dashboard/product.visible') }}</label>
                    <input type="text" name="visible" id="visible" value="{{ old('visible', $product['visible']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                        <label for="premium">{{ __('dashboard/product.premium') }}</label>
                        <input type="text" name="premium" id="premium" value="{{ old('premium', $product['premium']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <label for="add_date">{{ __('dashboard/product.add_date') }}</label>
                    <input type="date" name="add_date" id="add_date" value="{{ old('created_at', $product['created_at']) }}" />
                </div>
                <div class="form--input-box" data-title="address">
                    <input type="file" name="pictures[]" multiple/>
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
