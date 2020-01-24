@extends('layouts.admin')

@section('title', __('dashboard/category.title'))

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        @if ($category)
            <div class="flex justify-between w-full mb-3">
                <a href="{{ route('admin.categories') }}" class="button button--purple font-normal">{{ __('dashboard/category.back') }}</a>
            </div>
        @endif

        <h2 class="font-semibold">{{ __('dashboard/category.title-' . ($category ? 'sub' : 'main')) . ($category ? ': ' . $category['name'] : '') }}</h2>

        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th width="10%">{{ __('dashboard/category.lp') }}</th>
                    <th width="25%">{{ __('dashboard/category.name') }}</th>
                    <th width="10%">{{ __('dashboard/category.sub') }}</th>
                    <th width="25%">{{ __('dashboard/category.desc') }}</th>
                    <th width="10%">{{ __('dashboard/category.visible') }}</th>
                    <th width="20%">{{ __('dashboard/category.action') }}</th>
                </tr>

                <tr class="border-b">
                    <td colspan="6" class="p-0">
                        <form class="form m-0" method="post" action="{{ route('admin.categories', ['category' => $category]) }}">
                            @csrf
                            <table cellspacing="0">
                                <tr>
                                    <td width="10%"></td>
                                    <td width="25%">
                                        <div class="form--input-box w-full">
                                            <input type="text" name="name" id="name" value="{{ old('') }}" placeholder="{{ __('dashboard/category.name-placeholder') }}" autocomplete="off">
                                        </div>
                                    </td>
                                    <td width="10%"></td>
                                    <td width="25%"></td>
                                    <td width="10%">
                                        <div>
                                            <label class="checkbox py-2">
                                                <input type="checkbox" name="visible" id="visible" value="false">
                                                <span class="checking"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        @csrf
                                        <button class="button">{{ __('dashboard/category.btn_add') }}</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>

                @if (count($categories) > 0)
                    @foreach($categories as $i => $_category)
                    <tr>
                        <td class="category">
                            {{ ++$i }}
                        </td>
                        <td class="category">
                            @if ($category)
                                {{ $_category['name'] }}
                            @else
                                <a href="{{ route('admin.categories', ['category' => $_category['slug']]) }}">{{ $_category['name'] }}</a>
                            @endif
                        </td>
                        <td class="category">
                            {{ $_category['subCount'] }}
                        </td>
                        <td class="category">
                            {{ Str::limit(strip_tags($_category['desc']), 50) }}
                        </td>
                        <td class="category">
                            {{ __('dashboard/category.' . ($_category['visible'] ? 'yes' : 'no')) }}
                        </td>
                        <td class="category">
                            <a href="{{ route('admin.category', ['category' => $_category['slug']]) }}">{{ __('dashboard/category.btn_edit') }}</a>
                        </td>
                    </tr>
                    @endforeach
                @endif

            </table>
        </div>

        <div class="pagination-container">
            {{ $categories->links() }}
        </div>

    </div>
</div>

@endsection
