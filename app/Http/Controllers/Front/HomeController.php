<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FeatureRestaurant;
use App\Models\Food;
use App\Models\Page;
use App\Models\Place;
use App\Models\Restaurant;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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


    /**
     * Generate SiteMap for Websites
     */
    public function siteMap()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/food'));

        Food::all()->each(function (Food $object) use ($sitemap) {
            $sitemap->add(Url::create("/food/{$object->slug}"));
        });

        Restaurant::all()->each(function (Restaurant $object) use ($sitemap) {
            $sitemap->add(Url::create("/restaurant/view/{$object->slug}"));
        });

        Place::all()->each(function (Place $object) use ($sitemap) {
            $sitemap->add(Url::create("/place/{$object->slug}"));
        });

        Page::all()->each(function (Page $object) use ($sitemap) {
            $sitemap->add(Url::create("/page/{$object->slug}"));
        });

        $sitemap->add(Url::create("/about-us"));
        $sitemap->add(Url::create("/places"));
        $sitemap->add(Url::create("/privacy-policy"));
        $sitemap->add(Url::create("/site-map"));
        $sitemap->add(Url::create("/offers"));
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
