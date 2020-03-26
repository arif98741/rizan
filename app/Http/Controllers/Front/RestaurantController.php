<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index()
    {
        $data = [
            'restaurants'   => Restaurant::with(['restaurant_category'])->paginate(9)
        ];
        return view('front.restaurant.index')->with($data);
    }

    public function viewBySlug()
    {
        $data = [
            'restaurants'   => Restaurant::with(['restaurant_category'])->paginate(9)
        ];
        return view('front.restaurant.index')->with($data);
    }


}
