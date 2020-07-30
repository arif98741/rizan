<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\TeamMember;


class PageController extends Controller
{
    /**
     * view place by slug
     * @return Factory|View
     */
    public function viewPage()
    {
        //get slug from url
        $explode_url = explode('/', url()->current());
        $data = [
            'page' => Page::where('slug', end($explode_url))->firstOrFail()
        ];
        return view('front.page.single_page')->with($data);
    }

    /*
     *Show Team Members
     */
    public function teamMembers()
    {
        $data = [
            'team_members' => TeamMember::orderBy('name')->get()
        ];
        return view('front.page.team_members')->with($data);
    }


}
