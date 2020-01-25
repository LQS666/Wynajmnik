<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSite;
use App\Site;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo;

    public function __construct()
    {
        // auth and admin middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('admin.sites');
    }

    public function show()
    {
        // Value [$sites] bound to view in ViewServiceProvider
        return view('admin.sites');
    }

    public function edit(Site $site)
    {
        return view('admin.site', [
            'site' => $site
        ]);
    }

    public function store(StoreSite $request)
    {
        $validated = $request->validated();

        Site::create($validated);

        return redirect($this->redirectPath())
            ->with('sweet.success', trans('message.siteCreated'));

    }

    public function update(StoreSite $request, Site $site)
    {
        $validated = $request->validated();

        if (!isset($validated['visible'])) {
            $validated['visible'] = false;
        }

        $site->update($validated);

        return redirect(route('admin.site', ['site' => $site]))
            ->with('sweet.success', trans('message.siteUpdated'));
    }

    public function destroy(Site $site)
    {
        $site->delete();

        return redirect($this->redirectPath())
            ->with('sweet.success', trans('message.siteDestroyed'));
    }
}
