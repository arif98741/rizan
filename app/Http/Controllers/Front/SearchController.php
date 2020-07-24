<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Place;
use App\Models\Restaurant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;


class SearchController extends Controller
{
    /**
     * Search Action from frontend
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|View
     */
    public function index(Request $request)
    {
        $key = $request->key;
        if (!empty($sort)) {
            $sort = $request->sort;
        } else {
            $sort = 'asc';
        }

        $data = [
            'restaurants' => Restaurant::where('name', 'like', '%' . $key . '%')
                ->orWhere('location', 'like', '%' . $key . '%')
                ->orderBy('id', $sort)
                ->paginate(env('PAGINATE_PER_PAGE')),
            'foods' => Food::with('restaurant')
                ->where('name', 'like', '%' . $key . '%')
                ->orderBy('id', $sort)
                ->paginate(env('PAGINATE_PER_PAGE')),
            'places' => Place::where('place_name', 'like', '%' . $key . '%')
                ->orWhere('location', 'like', '%' . $key . '%')
                ->orderBy('id', $sort)
                ->paginate(env('PAGINATE_PER_PAGE'))
        ];


        return view('front.search.search_result')->with($data);

    }
}
