@extends('layouts.admin')

@section('title', __('dashboard/filter-value.title' . ' - ' . $filter['name']))

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <div class="flex justify-between w-full mb-3">
            <a href="{{ route('admin.filters') }}" class="button button--purple font-normal">{{ __('dashboard/filter-value.back') }}</a>
        </div>

        <h2 class="font-semibold">{{ __('dashboard/filter-value.title') . ': ' . $filter['name'] }}</h2>

        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th width="20%">{{ __('dashboard/filter-value.value') }}</th>
                    <th width="20%">{{ __('dashboard/filter-value.value-text') }}</th>
                    <th width="20%">{{ __('dashboard/filter-value.value-int') }}</th>
                    <th width="20%">{{ __('dashboard/filter-value.value-decimal') }}</th>
                    <th width="20%">{{ __('dashboard/filter-value.action') }}</th>
                </tr>

                @if (!$filter_value)
                    <tr class="border-b">
                        <td colspan="6" class="p-0">
                            <form class="form m-0" method="post" action="{{ route('admin.filter-values', ['filter' => $filter]) }}">
                                @csrf
                                <table cellspacing="0">
                                    <tr>
                                        <td width="80%" colspan="5">
                                            <div class="form--input-box w-full">
                                                <input type="text" name="value" id="value" value="{{ old('value') }}" placeholder="{{ __('dashboard/filter-value.value-placeholder') }}" autocomplete="off">
                                            </div>
                                        </td>
                                        <td width="20%">
                                            <button class="button">{{ __('dashboard/filter-value.btn_add') }}</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                @endif

                @if (count($filter['values']) > 0)
                    @foreach($filter['values'] as $i => $_value)
                    <tr>
                         @if ($filter_value && $filter_value['id'] === $_value['id'])
                            <td colspan="5" class="p-0">
                                <form class="form m-0" method="post" action="{{ route('admin.filter-value', ['filter' => $filter, 'filter_value' => $_value]) }}">
                                    @csrf
                                    @method('patch')
                                    <table cellspacing="0">
                                        <tr>
                                            <td width="20%">
                                                <div class="form--input-box w-full">
                                                    <input type="text" name="value" id="value" value="{{ old('value', $_value['value']) }}" placeholder="{{ __('dashboard/filter-value.value-placeholder') }}" autocomplete="off">
                                                </div>
                                            </td>
                                            <td width="20%">
                                                {{ $_value['value_string'] }}
                                            </td>
                                            <td width="20%">
                                                {{ $_value['value_int'] }}
                                            </td>
                                            <td width="20%">
                                                {{ $_value['value_decimal'] }}
                                            </td>
                                            <td width="20%">
                                                <button class="button mb-3">{{ __('dashboard/filter-value.btn_change') }}</button><br/>
                                                <a href="{{ route('admin.filter-values', ['filter' => $filter]) }}">{{ __('dashboard/filter-value.btn_cancel') }}</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        @else
                            <td class="filter-value">
                                {{ $_value['value'] }}
                            </td>
                            <td class="filter-value">
                                {{ $_value['value_string'] }}
                            </td>
                            <td class="filter-value">
                                {{ $_value['value_int'] }}
                            </td>
                            <td class="filter-value">
                                {{ $_value['value_decimal'] }}
                            </td>
                            <td class="filter-value">
                                <form method="post" action="{{ route('admin.filter-value', ['filter' => $filter, 'filter_value' => $_value]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="button">{{ __('dashboard/filter-value.btn_delete') }}</button>
                                </form>
                                <a href="{{ route('admin.filter-values', ['filter' => $filter, 'filter_value' => $_value]) }}">{{ __('dashboard/filter-value.btn_edit') }}</a>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                @endif

            </table>
        </div>

    </div>
</div>

@endsection
