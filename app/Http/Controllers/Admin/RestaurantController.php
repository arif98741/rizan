<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    /**
     * view restaurant list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'restaurants' => Restaurant::with(['restaurant_category'])->paginate(9)
        ];
        return view('admin.restaurant.index')->with($data);
    }


    /**
     * show restaurant create form
     * @return Factory|View
     */
    public function create()
    {
        $data = [
            'restaurant_categories' => RestaurantCategory::orderBy('category_name')->get()
        ];
        return view('admin.restaurant.create')->with($data);
    }


    /**
     * save restaurant data in database
     * @param Request $request
     */
    public function store(Request $request)
    {
        $restaurantData = $this->validateRequest();
        echo '<pre>';
        print_r($restaurantData);
        exit;
    }


    /**
     * show individual restaurant
     * @param $id
     */
    public function edit($id)
    {
        //
    }


    /**
     * update restaurant
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * delete restaurant individually
     * @param $id
     */
    public function destroy($id)
    {
        //
    }

    /**
     * validation data
     * @return array
     */
    private function validateRequest()
    {
        return request()->validate([
            'restaurant_name' => 'required|min:3',
            'restaurant_category_id' => 'required',
            'location' => 'required',
            'slug' => 'required',
            'email' => 'required|email|unique:restaurants,email,$this->id,id',
            'password' => 'required|min:6',
            'facebook' => 'required',
            'instagram' => 'required',
            'website' => 'required'
        ]);
    }
}
