<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\TeamMember;


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
            'page' => Page::where('slug', $slug)->firstOrFail()
        ];
        return view('front.page.single_page')->with($data);
    }

    public function teamMembers ()
    {
        $data = [
            'team_members' => TeamMember::orderBy('name')->get()
        ];
        return view('front.page.team_members')->with($data);
    }


}
