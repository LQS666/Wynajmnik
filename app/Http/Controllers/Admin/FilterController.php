<?php

namespace App\Http\Controllers\Admin;

use App\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilter;
use Illuminate\Foundation\Auth\RedirectsUsers;

class FilterController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo;

    public function __construct()
    {
        // auth and admin middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('admin.filters');
    }

    public function show()
    {
        // Value [$filters] bound to view in ViewServiceProvider
        return view('admin.filters');
    }

    public function edit(Filter $filter)
    {
        return view('admin.filter', [
            'filter' => $filter
        ]);
    }

    public function store(StoreFilter $request)
    {
        $validated = $request->validated();

        Filter::create($validated);

        return redirect()->back()
                         ->with('sweet.success', trans('message.filterCreated'));
    }

    public function update(StoreFilter $request, Filter $filter)
    {
        $validated = $request->validated();

        $filter->update($validated);

        return redirect()->back()
                         ->with('sweet.success', trans('message.filterUpdated'));
    }

    public function destroy(Filter $filter)
    {
        if ($filter->values) {
            foreach ($filter->values as $value) {
                $value->products()->detach();
            }
            $filter->values()->delete();
        }
        $filter->delete();

        return redirect()->back()
                         ->with('sweet.success', trans('message.filterDestroyed'));
    }
}
