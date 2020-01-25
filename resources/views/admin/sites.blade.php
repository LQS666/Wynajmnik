@extends('layouts.admin')

@section('title', __('dashboard/site.title') )

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/site.title') }}</h2>

        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th width="10%">{{ __('dashboard/site.lp') }}</th>
                    <th width="20%">{{ __('dashboard/site.name') }}</th>
                    <th width="20%">{{ __('dashboard/site.content') }}</th>
                    <th width="20%">{{ __('dashboard/site.author') }}</th>
                    <th width="10%">{{ __('dashboard/site.visible') }}</th>
                    <th width="20%">{{ __('dashboard/site.action') }}</th>
                </tr>

                <tr class="border-b">
                    <td colspan="6" class="p-0">
                        <form class="form m-0" method="post" action="{{ route('admin.sites') }}">
                            @csrf
                            <table cellspacing="0">
                                <tr>
                                    <td width="50%" colspan="3">
                                        <div class="form--input-box w-full">
                                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('dashboard/site.name-placeholder') }}" autocomplete="off">
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="form--input-box w-full">
                                            <input type="text" name="author" id="author" value="{{ old('author') }}" placeholder="{{ __('dashboard/site.author-placeholder') }}" autocomplete="off">
                                        </div>
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
                                        <button class="button">{{ __('dashboard/site.btn_add') }}</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>

                @if (count($sites) > 0)
                    @foreach($sites as $i => $_site)
                    <tr>
                        <td class="category">
                            {{ ++$i }}
                        </td>
                        <td class="category">
                            {{ $_site['name'] }}
                        </td>
                        <td class="category">
                            {{ Str::limit(strip_tags($_site['content']), 50) }}
                        </td>
                        <td class="category">
                            {{ $_site['author'] }}
                        </td>
                        <td class="category">
                            {{ __('dashboard/site.' . ($_site['visible'] ? 'yes' : 'no')) }}
                        </td>
                        <td class="category">
                            <a href="{{ route('admin.site', ['site' => $_site]) }}">{{ __('dashboard/site.btn_edit') }}</a>
                        </td>
                    </tr>
                    @endforeach
                @endif

            </table>
        </div>

        <div class="pagination-container">
            {{ $sites->links() }}
        </div>

    </div>
</div>

@endsection
