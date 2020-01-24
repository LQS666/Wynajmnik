@extends('layouts.admin')

@section('title', __('dashboard/product.title'))

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/product.title') }}</h2>

        @if (count($products) > 0)
        <div class="products">
            <ul class="products__container">
                @foreach ($products as $product)
                <li class="products__item">
                    <div class="products__info">
                        <div class="products__left-side">
                            <div class="product__left-side__photo">
                                @if (count($product['images']) > 0)
                                <img class="itemImg" src="{{ Storage::url($product->images->first()['file']) }}" alt="{{ Str::limit($product['name'], 20, ' ...') }}" />
                                @else
                                <img class="itemImg" src="{{ asset('/assets/images/item.jpeg')}}" alt="Default Image" />
                                @endif
                            </div>
                            <div class="product__left-side__content">
                                <div class="flex pt-3">
                                    {!! $product['visible'] ? '<p class="status isActive">Aktualne</p>' : '<p class="status isNotActive">Nieaktualne</p>' !!}
                                    {!! $product['premium'] ? '<p class="premium">Premium<i class="ml-1 fa fa-check" aria-hidden="true"></i></p>' : '' !!}
                                </div>
                                <a href="{{ route('my-account.product', ['product' => $product['slug']]) }}">
                                    <h3 class="title">{{ Str::limit($product['name'], 40, ' ...') }}</h3>
                                </a>
                                <a href="{{ route('my-account.foreign-offers', ['product' => $product['id']]) }}" class="offers">{{ __('dashboard/product.offers_all_length') }}: {{ count($product->offers) }}</a><br/>
                                <a href="{{ route('my-account.foreign-offers', ['product' => $product['id'], 'status' => 'waiting']) }}" class="offers">{{ __('dashboard/product.offers_unhandled_length') }}: {{ count($product->offersUnhandled) }}</a>
                            </div>
                        </div>

                        <div class="products__right-side">
                            <div class="price">
                                <p>{{ $product['price'] }} {{ __('dashboard/product.currency') }}</p>
                            </div>
                            <div class="actions">
                                <a href="{{ route('my-account.product', ['product' => $product['slug']]) }}" class="action-btn pr-3"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form method="post"
                                    action="{{ route('my-account.product', ['product' => $product['slug']]) }}"
                                    id="addDeleteForm" class="action-btn form m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <span>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="pagination-container">
            {{ $products->links() }}
        </div>

        @else
        <div class="flex justify-center items-center bg-purple-main w-1/2 py-3 rounded-lg">
            {{ __('dashboard/product.empty-table') }}
        </div>
        @endif
    </div>
</div>

@endsection
