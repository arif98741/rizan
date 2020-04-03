<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\Viewv;

class RestaurantController extends Controller
{
    /*
     * view restaurant list
     */
    public function index()
    {
        $data = [
            'restaurants'   => Restaurant::with(['restaurant_category'])->paginate(9)
        ];
        return view('front.restaurant.index')->with($data);
    }

    /**
     * view restaurant by slug
     * @return Factory|Viewv
     */
    public function viewBySlug($slug)
    {
        $data = [
            'restaurant'   => Restaurant::with(['restaurant_category'])->where('slug',$slug)->firstOrFail()
        ];
        return view('front.restaurant.single_restaurant')->with($data);
    }


}
