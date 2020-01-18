<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo;

    public function __construct()
    {
        // auth and admin middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('admin.categories');
    }

    public function show(Category $category = null)
    {
        if ($category && !is_null($category->sub)) {
            return redirect($this->redirectPath());
        }

        // Value [$categories] bound to view in ViewServiceProvider
        return view('admin.categories', [
            'category' => $category
        ]);
    }

    public function store(StoreCategory $request, Category $category = null)
    {
        $validated = $request->validated();

        if ($category) {
            $validated = Arr::add($validated, 'sub', $category->id);
        }

        Category::create($validated);

        return redirect()->back()
                         ->with('sweet.success', trans('message.categoryCreated'));
    }

    public function update(StoreCategory $request, Category $category)
    {
        $validated = $request->validated();

        $category->update($validated);

        return redirect()->back()
                         ->with('sweet.success', trans('message.categoryUpdated'));
    }

    public function destroy(Category $category)
    {
        if (is_null($category->sub)) {
            Category::where('sub', $category->id)->delete();
        }

        $category->delete();

        return redirect()->back()
                         ->with('sweet.success', trans('message.categoryDestroyed'));
    }
}
