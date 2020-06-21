<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * view place list
     */
    public function index()
    {
        $data = [
            'places' => Place::orderBy('id', 'desc')->paginate(12)
        ];

        return view('front.place.index')->with($data);
    }

    /**
     * view place by slug
     * @param $slug
     * @return Factory|View
     */
    public function viewBySlug($slug)
    {
        $data = [
            'place' => Place::where('slug', $slug)->firstOrFail()
        ];
        return view('front.place.single_place')->with($data);
    }


}
