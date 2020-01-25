@extends('layouts.admin')

@section('title', __('dashboard/filter.title'))

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/filter.title') }}</h2>

        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th width="10%">{{ __('dashboard/filter.lp') }}</th>
                    <th width="25%">{{ __('dashboard/filter.name') }}</th>
                    <th width="10%">{{ __('dashboard/filter.values') }}</th>
                    <th width="25%">{{ __('dashboard/filter.type') }}</th>
                    <th width="10%">{{ __('dashboard/filter.visible') }}</th>
                    <th width="20%">{{ __('dashboard/filter.action') }}</th>
                </tr>

                @if (!$filter)
                    <tr class="border-b">
                        <td colspan="6" class="p-0">
                            <form class="form m-0" method="post" action="{{ route('admin.filters') }}">
                                @csrf
                                <table cellspacing="0">
                                    <tr>
                                        <td width="45%" colspan="3">
                                            <div class="form--input-box w-full">
                                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('dashboard/filter.name-placeholder') }}" autocomplete="off">
                                            </div>
                                        </td>
                                        <td width="25%">
                                            <select name="type">
                                                @foreach (['text', 'int', 'decimal'] as $type)
                                                    <option value="{{ $type }}">{{ __('dashboard/filter.type-' . $type) }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td width="10%">
                                            <div>
                                                <label class="checkbox py-2">
                                                    <input type="checkbox" name="visible" id="visible" value="1">
                                                    <span class="checking"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td width="20%">
                                            <button class="button">{{ __('dashboard/filter.btn_add') }}</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                @endif

                @if (count($filters) > 0)
                    @foreach($filters as $i => $_filter)
                    <tr>
                        @if ($filter && $filter['id'] === $_filter['id'])
                            <td colspan="6" class="p-0">
                                <form class="form m-0" method="post" action="{{ route('admin.filter', ['filter' => $_filter]) }}">
                                    @csrf
                                    @method('patch')
                                    <table cellspacing="0">
                                        <tr>
                                            <td width="10%">
                                                {{ ++$i }}
                                            </td>
                                            <td width="25%">
                                                <div class="form--input-box w-full">
                                                    <input type="text" name="name" id="name" value="{{ old('name', $_filter['name']) }}" placeholder="{{ __('dashboard/filter.name-placeholder') }}" autocomplete="off">
                                                </div>
                                            </td>
                                            <td class="filter">
                                                {{ $_filter['subCount'] }}
                                            </td>
                                            <td width="25%">
                                                <select name="type">
                                                    @foreach (['text', 'int', 'decimal'] as $type)
                                                        <option value="{{ $type }}" {{ $_filter['type'] == $type ? 'selected="selected"' : '' }}>{{ __('dashboard/filter.type-' . $type) }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td width="10%">
                                                <div>
                                                    <label class="checkbox py-2">
                                                        <input type="checkbox" name="visible" id="visible" value="1" {{ $_filter['visible'] ? 'checked="checked"' : '' }}>
                                                        <span class="checking"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td width="20%">
                                                <button class="button mb-3">{{ __('dashboard/filter.btn_change') }}</button><br/>
                                                <a href="{{ route('admin.filters') }}">{{ __('dashboard/filter.btn_cancel') }}</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        @else
                            <td class="filter">
                                {{ ++$i }}
                            </td>
                            <td class="filter">
                                <a href="{{ route('admin.filter-values', ['filter' => $_filter]) }}">{{ $_filter['name'] }}</a>
                            </td>
                            <td class="filter">
                                {{ $_filter['subCount'] }}
                            </td>
                            <td class="filter">
                                {{ __('dashboard/filter.type-' . $_filter['type']) }}
                            </td>
                            <td class="filter">
                                {{ __('dashboard/filter.' . ($_filter['visible'] ? 'yes' : 'no')) }}
                            </td>
                            <td class="filter">
                                <form method="post" action="{{ route('admin.filter', ['filter' => $_filter]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="button">{{ __('dashboard/filter.btn_delete') }}</button>
                                </form>
                                <a href="{{ route('admin.filter', ['filter' => $_filter]) }}">{{ __('dashboard/filter.btn_edit') }}</a>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                @endif

            </table>
        </div>

        <div class="pagination-container">
            {{ $filters->links() }}
        </div>

    </div>
</div>

@endsection
