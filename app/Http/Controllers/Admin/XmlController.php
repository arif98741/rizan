<?php
/**
 * Copyright (c) 7/18/20, 1:36 AM. This file is created and maintained by Ariful Islam.
 * This is the private  property of mine. If you want to use this for personal use this is ok.
 * But for commercial use you must have to contact with me for further process. Here is my contact details..
 * Github: https://github.com/arif98741
 * Twitter: https://twitter.com/arif98741
 * Email: arif98741@gmail.com
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\Food;
use App\Models\Page;
use App\Models\Place;
use App\Models\Restaurant;
use App\Models\Xml;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Session;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Storage;

/**
 * Class XmlController
 * @package App\Http\Controllers\Admin
 */
class XmlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'xmls' => Xml::orderBy('id', 'desc')->get()
        ];

        return view('admin.xml.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.xml.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $xml = new Xml;
        $xml->title = $request->title;
        $xml->description = $request->description;
        $xml->file_name = $this->generateXML();
        $this->webPing();
        if ($xml->save()) {
            Session::flash('success', 'Generated xml successfully');
            return redirect(route('admin.xml.index'));
        } else {
            Session::flash('error', 'Failed to generate xml');
            return redirect(route('admin.xml.index'));
        }
    }

    /**
     * destroy
     * @param Xml $xml
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Xml $xml)
    {
        if ($xml->delete()) {

            if (file_exists(HelperController::baseBath() . 'sitemap/' . $xml->file_name)) {
                echo 'yes';
                File::delete(HelperController::baseBath() . 'sitemap/' . $xml->file_name);
            }

            Session::flash('success', 'Sitemap ' . $xml->file_name . ' deleted successfully!');
            return redirect(route('admin.xml.index'));
        } else {
            Session::flash('error', 'Failed to delete xml!');
            return redirect(route('admin.xml.index'));
        }
    }

    /**
     * Generate SiteMap for Websites
     */
    public function generateXML()
    {
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
        $sitemap->writeToFile(HelperController::baseBath() . 'sitemap/' . $file_name);
        return 'sitemap_' . $file_name;
    }

    /**
     * Ping to google search console after generating xml as new file
     */
    private function webPing()
    {
        $url = 'https://www.google.com/ping?sitemap=https://treatlover.com/public/uploads/sitemap/sitemap_sitemap.xml';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);
        curl_close($ch); // Close the connection
    }
}
