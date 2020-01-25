@extends('layouts.admin')

@section('title', __('dashboard/point.title'))

@section('profile')

<div class="main-dashboard-panels">

    <div class="main-dashboard-panel">

        <h2 class="font-semibold">{{ __('dashboard/point.title') }}</h2>

        @if (count($points) > 0)

        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th>{{ __('dashboard/point.lp') }}</th>
                    <th>{{ __('dashboard/point.sign') }}</th>
                    <th>{{ __('dashboard/point.points') }}</th>
                    <th>{{ __('dashboard/point.source') }}</th>
                    <th>{{ __('dashboard/point.result') }}</th>
                    <th>{{ __('dashboard/point.desc') }}</th>
                </tr>

                @foreach($points as $i => $point)
                <tr>
                    <td class="point">
                        {{ ++$i }}
                    </td>
                    <td class="point">
                        {{ $point['sign'] }}
                    </td>
                    <td class="point">
                        {{ $point['points'] }}
                    </td>
                    <td class="point">
                        {{ $point['source'] }}
                    </td>
                    <td class="point">
                        {{ $point['result'] }}
                    </td>
                    <td class="point">
                        {{ $point['desc'] }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="pagination-container">
            {{ $points->links() }}
        </div>

        @else

        <div class="flex justify-center items-center bg-purple-main w-1/2 py-3 rounded-lg">
            {{ __('dashboard/point.empty-table') }}
        </div>

        @endif

    </div>
</div>

@endsection
