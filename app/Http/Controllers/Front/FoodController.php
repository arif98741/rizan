<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;


class FoodController extends Controller
{
    /**
     * view food  list
     */
    public function index()
    {
        $data = [
            'foods' => Food::with('restaurant')->orderBy('id')->paginate(1),
        ];

        return view('front.food.index')->with($data);
    }

    /**
     * view food  by slug
     * @param Request $request
     * @param $slug
     */
    public function viewBySlug(Request $request, $restaurant_slug, $slug)
    {
        $data = [
            'food' => Food::with('restaurant')
                ->where('slug', $slug)
                ->firstOrFail(),
        ];
        return view('front.food.single_food')->with($data);
    }


}
