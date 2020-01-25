<?php

namespace App\Http\Controllers\Admin;

use App\Filter;
use App\FilterValue;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilterValue;

class FilterValueController extends Controller
{
    public function show(Filter $filter, FilterValue $filter_value = null)
    {
        // Value [$filterValues] bound to view in ViewServiceProvider
        return view('admin.filter-values', [
            'filter' => $filter,
            'filter_value' => $filter_value
        ]);
    }

    public function store(StoreFilterValue $request, Filter $filter)
    {
        $validated = $request->validated();

        $filter->values()->create($validated);

        return redirect()->back()
            ->with('sweet.success', trans('message.filterValueCreated'));
    }

    public function update(StoreFilterValue $request, Filter $filter, FilterValue $filter_value)
    {
        $validated = $request->validated();

        $filter_value->update($validated);

        return redirect(route('admin.filter-values', ['filter' => $filter]))
            ->with('sweet.success', trans('message.filterValueUpdated'));
    }

    public function destroy(Filter $filter, FilterValue $filter_value)
    {
        $filter_value->products()->detach();
        $filter_value->delete();

        return redirect(route('admin.filter-values', ['filter' => $filter]))
            ->with('sweet.success', trans('message.filterValueDestroyed'));
    }
}
