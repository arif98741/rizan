<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Session;

class RestaurantController extends Controller
{
    /**
     * view restaurant list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'restaurants' => Restaurant::with(['restaurant_category'])->get()
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
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {

        $restaurantData = $this->validateRequest();
        $restaurantData['password'] = Hash::make($restaurantData['password']);
        $restaurantData['slug'] = Str::slug($restaurantData['name']);
        if (!empty($request->file('feature_photo'))) {
            $image = HelperController::imageUpload($request, 'feature_photo', 'restaurant/', 480, 240);
            $restaurantData['feature_photo'] = $image['file_name'];
        }

        if (!empty($request->file('cover_photo'))) {
           // $image = HelperController::imageUpload($request, 'cover_photo', 'restaurant/cover/');
            //$restaurantData['cover_photo'] = $image['file_name'];
        }

        $restaurantData['slug'] = Str::slug($restaurantData['name']);
        if (Restaurant::create($restaurantData)) {
            Session::flash('success', 'Group Added successfully!');
            return redirect(route('admin.restaurant.index'));
        } else {
            Session::flash('error', 'Failed to save restaurant!');
            return redirect(route('admin.restaurant.create'));
        }

    }


    /**
     * show individual restaurant
     * @param Restaurant $restaurant
     * @return Restaurant
     */
    public function edit(Restaurant $restaurant)
    {

        $data = [
            'restaurant' => $restaurant,
            'restaurant_categories' => RestaurantCategory::orderBy('category_name')->get()
        ];

        return view('admin.restaurant.edit')->with($data);
    }


    /**
     * update restaurant
     * @param Request $request
     * @param Restaurant $restaurant
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $updateValidationData = $this->updateValidateRequest($restaurant->id);
        if (!empty($request->password)) //if pass is not blank
        {
            $updateValidationData['password'] = Hash::make($request->password);
        }

        if ($restaurant->update($updateValidationData)) {
            Session::flash('success', 'Restaurant Updated successfully!');
            return redirect(route('admin.restaurant.index'));
        } else {
            Session::flash('error', 'Failed to update restaurant!');
            return redirect(route('admin.restaurant.create'));
        }
    }

    /**
     * delete restaurant individually
     * @param Restaurant $restaurant
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->delete($restaurant)) {
            Session::flash('success', 'Restaurant deleted successfully!');
            return redirect(route('admin.restaurant.index'));
        } else {
            Session::flash('error', 'Failed to delete restaurant!');
            return redirect(route('admin.restaurant.create'));
        }
    }

    /**
     * validation data
     * @return array
     */
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'restaurant_category_id' => 'required',
            'location' => 'required',
            'slug' => 'sometimes',
            'email' => 'required|unique:restaurants,email',
            'contact' => 'required|min:6|max:20|unique:restaurants',
            'password' => 'required|min:6',
            'feature_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_photo' => 'sometimes',
            'facebook' => 'required',
            'instagram' => 'required',
            'website' => 'required'
        ]);
    }

    /**
     * update validation data
     * @param $id
     * @return array
     */
    private function updateValidateRequest($id)
    {

        return request()->validate([
            'name' => 'required|min:3',
            'restaurant_category_id' => 'required',
            'location' => 'required',
            'slug' => 'sometimes',
            'email' => 'required|unique:restaurants,email,' . $id,
            'contact' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'website' => 'required'
        ]);
    }


}
