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
            ->add(Url::create('/'))
            ->add(Url::create('/food'))
            ->add(Url::create('/search'))
            ->add(Url::create("/about-us"))
            ->add(Url::create("/places"))
            ->add(Url::create("/privacy-policy"))
            ->add(Url::create("/site-map"))
            ->add(Url::create("/restaurants"))
            ->add(Url::create("/places"))
            ->add(Url::create("/site-map"))
            ->add(Url::create("/offers"));

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

        $sitemap->writeToFile(storage_path('app/public/uploads/' . 'sitemap.xml'));
        $file = storage_path('app/public/uploads/' . 'sitemap.xml');
        $headers = array(
            'Content-Type: application/xml',
        );


        return Storage::download(asset('uploads/sitemap.xml'), 'sitemaps.xml', $headers);
    }
}
