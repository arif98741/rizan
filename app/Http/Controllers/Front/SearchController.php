<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     *  Search Action from frontend
     * @param Request $request
     */
    public function searchAction(Request $request)
    {

        dd($request->all());
    }
}