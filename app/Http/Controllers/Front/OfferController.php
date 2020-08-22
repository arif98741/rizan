<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Offer;
use App\Models\Restaurant;
use App\User;


class OfferController extends Controller
{
    /**
     * view offer  list
     */
    public function index()
    {
        $data = [
            'offers' => Offer::with(['food', 'restaurant'])
                ->where('end_date', '>', date('Y-m-d'))
                ->orderBy('id', 'desc')
                ->paginate(1)
        ];

        return view('front.offer.index')->with($data);
    }


}
