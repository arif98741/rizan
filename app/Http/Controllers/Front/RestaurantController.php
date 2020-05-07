<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    /**
     * view restaurant list
     */
    public function index()
    {
        $data = [
            'restaurants' => Restaurant::with(['restaurant_category'])->paginate(9)
        ];
        return view('front.restaurant.index')->with($data);
    }

    /**
     * view restaurant by slug
     * @param $slug
     * @return Factory|View
     */
    public function viewBySlug($slug)
    {
        $data = [
            'foods' => Food::with('restaurant')
            ->get(),
            'restaurant' => Restaurant::with(['restaurant_category'])->where('slug', $slug)->firstOrFail()
        ];
        return view('front.restaurant.single_restaurant')->with($data);
    }


}
