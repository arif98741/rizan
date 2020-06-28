<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
            'restaurants' => Restaurant::with(['restaurant_category'])->get()
        ];

        return view('front.home')->with($data);
    }
}
