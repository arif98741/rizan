<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;

class RestaurantController extends Controller
{
    /**
     * view restaurant list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'restaurants'   => Restaurant::with(['restaurant_category'])->paginate(9)
        ];
        return $data['restaurants'];
        return view('admin.restaurant.index')->with($data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
