<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FeatureFood;
use App\Models\FeatureRestaurant;
use App\Models\Xml;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Storage;

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
            //  'foods' => Food::with(['restaurant','feature_food'])->orderBy('id')->get(),
            'foods' => FeatureFood::join('foods', 'foods.id', '=', 'feature_foods.food_id')
                ->join('restaurants', 'restaurants.id', '=', 'foods.restaurant_id')
                ->select('foods.*','restaurants.name as restaurant_name','restaurants.slug as restaurant_slug')
                ->get(),
            'feature_restaurants' => FeatureRestaurant::with(['restaurant'])
                ->orderBy('order', 'asc')
                ->get()
        ];
        //return $data['foods'];


        return view('front.home')->with($data);
    }

    /*
     * SiteMap View
     */
    public function siteMap()
    {
        $xml = Xml::orderBy('id', 'desc')->first();
        if ($xml != null) {
            $file_name = $xml->file_name;
            return redirect(asset('/uploads/sitemap/' . $file_name));
        } else {

            return redirect(route('home'));
        }
    }
}
