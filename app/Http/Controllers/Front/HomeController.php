<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FeatureRestaurant;
use App\Models\Food;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * home page for showing
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $data = [
            'foods' => Food::with('restaurant')->orderBy('id')->get(),
            'feature_restaurants' => FeatureRestaurant::with(['restaurant'])
                ->orderBy('order', 'asc')
                ->get()
        ];
        return view('front.home')->with($data);
    }
}
