<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Product;
use App\Search\ProductSearchAspect;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->input('search');

        if (empty($search)) {
            return redirect()->back()
                             ->with('sweet.info', trans('message.emptySearchInput'));
        }

        $result = (new Search())
                  ->registerAspect(ProductSearchAspect::class)
                  ->perform($search);

        if (count($result) > 0) {
            foreach ($result as &$_r) {
                if (!($_r->searchable instanceof Product)) {
                    continue;
                }
                $_r->pictures = $_r->searchable->images;
            }
            unset($_r);
        }

        return view('web.search', [
            'result' => $result,
            'search' => $search
        ]);
    }
}
