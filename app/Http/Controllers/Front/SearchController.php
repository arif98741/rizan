<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     *  Search Action from frontend
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        $key = $request->key;
        $sort = $request->sort;

        $restaurants = Restaurant::where('name', 'like', $key)
            ->get();
        return $restaurants;
    }
}
