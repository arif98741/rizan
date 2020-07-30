<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Carbon\Carbon;


class OfferController extends Controller
{
    /**
     * view offer  list
     */
    public function index()
    {
        $data = [
            'offers' => Offer::with(['food','restaurant'])
                ->where('end_date','>',date('Y-m-d'))
                ->orderBy('id', 'desc')
                ->get()
        ];
        return view('front.offer.index')->with($data);
    }


}
