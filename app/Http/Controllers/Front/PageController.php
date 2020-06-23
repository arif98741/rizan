<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;


class PageController extends Controller
{
    /**
     * view place by slug
     * @param $slug
     * @return Factory|View
     */
    public function viewBySlug($slug)
    {
        $data = [
            'place' => Page::where('slug', $slug)->firstOrFail()
        ];
        return view('front.place.single_page')->with($data);
    }


}
