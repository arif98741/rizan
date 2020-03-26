<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Food;
use App\Models\Restaurant;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $data = [
            'foods'=> Food::all()
        ];

        return view('front.home')->with($data);
    }


}
