<?php

namespace App\Http\View\Composers\Web;


use App\Offer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductComposer
{
    private $product;

    public function __construct(Request $request) {
        //
    }

    public function compose(View $view) {
        if ($data = $view->getData()) {
            if (!is_null($data['product'])) {
                $this->product = $data['product'];
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////

        $offers = Offer::prod($this->product['id'])
            ->accepted()
            ->new()
            ->orderBy('date_start')
            ->get();

        ////////////////////////////////////////////////////////////////////////////////////

        $dates = [];

        if (count($offers) > 0) {
            foreach ($offers as $i => $offer) {
                $dates[$i]['start'] = $offer['date_start'];
                $dates[$i]['end'] = $offer['DateEndAsDate']->addDays(1)->toDateString();
            }
            $dates = json_encode($dates);
        }

        ////////////////////////////////////////////////////////////////////////////////////

        $view->with('offers', $dates ?: '[]');
    }
}
