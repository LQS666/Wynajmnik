<?php

namespace App\Http\Controllers\Admin;

use App\Filter;
use App\FilterValue;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilterValue;

class FilterValueController extends Controller
{
    public function store(StoreFilterValue $request, Filter $filter)
    {
        $validated = $request->validated();

        $filter->values()->create($validated);

        return redirect()->back()
                         ->with('sweet.success', trans('message.filterValueCreated'));
    }

    public function update(StoreFilterValue $request, FilterValue $value)
    {
        $validated = $request->validated();

        $value->update($validated);

        return redirect()->back()
                         ->with('sweet.success', trans('message.filterValueUpdated'));
    }

    public function destroy(FilterValue $value)
    {
        $value->products()->detach();
        $value->delete();

        return redirect()->back()
                         ->with('sweet.success', trans('message.filterValueDestroyed'));
    }
}
