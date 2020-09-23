<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;


class OfferController extends Controller
{
    /**
     * view offer  list
     */
    public function index()
    {
        $data = [
            'offers' => Offer::with(['product', 'restaurant'])
                ->where('end_date', '>', date('Y-m-d'))
                ->orderBy('id', 'desc')
                ->paginate(env('PAGINATE_PER_PAGE'))
        ];

        return view('front.offer.index')->with($data);
    }


}
