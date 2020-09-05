<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FeatureFood;
use App\Models\FeatureRestaurant;
use App\Models\Xml;
use App\Providers\SiteHelper;
use File;
use Illuminate\Support\Facades\DB;
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
                ->select('foods.*', 'restaurants.name as restaurant_name', 'restaurants.slug as restaurant_slug')
                ->get(),
            'feature_restaurants' => FeatureRestaurant::with(['restaurant'])
                ->orderBy('order', 'asc')
                ->get()
        ];

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
            SiteHelper::webPing();
            return redirect(asset('/uploads/sitemap/' . $file_name));
        } else {
            return redirect(route('home'));
        }
    }


    /**
     * THis will be used for generating using webping via cron job
     */
    public function generateXmlUsingWebPing()
    {
        DB::table('cron')->insert(
            ['data' => rand(1, 100)]
        );
        /*SiteHelper::webPing();
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/food'))
            ->add(Url::create('/search'))
            ->add(Url::create("/places"))
            ->add(Url::create("/privacy-policy"))
            ->add(Url::create("/sitemap"))
            ->add(Url::create("/restaurants"))
            ->add(Url::create("/places"))
            ->add(Url::create("/site-map"))
            ->add(Url::create("/team-members"))
            ->add(Url::create("/offers"));

        Food::all()->each(function (Food $object) use ($sitemap) {
            $sitemap->add(Url::create("/food/{$object->slug}"));
        });

        Restaurant::all()->each(function (Restaurant $object) use ($sitemap) {
            $sitemap->add(Url::create("/restaurant/{$object->slug}"));
        });

        Place::all()->each(function (Place $object) use ($sitemap) {
            $sitemap->add(Url::create("/place/{$object->slug}"));
        });

        Page::all()->each(function (Page $object) use ($sitemap) {
            $sitemap->add(Url::create("/page/{$object->slug}"));
        });

        $file_name = 'sitemap' . '.xml';
        $sitemap->writeToFile(HelperController::baseBath() . 'sitemap/' . $file_name);*/
    }
}
