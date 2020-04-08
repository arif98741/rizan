<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Session;

class RestaurantCategoryController extends Controller
{
    /**
     * view restaurant list
     * @return Factory|View
     */
    public function index()
    {
        //TODO:: this should be removed and modified
        $data = [
            'restaurant_categories' => RestaurantCategory::orderBy('category_name')->get()
        ];
        return view('admin.restaurant_category.index')->with($data);
    }


    /**
     * show restaurant create form
     * @return Factory|View
     */
    public function create()
    {
        $data = [

        ];
        return view('admin.restaurant_category.create')->with($data);
    }


    /**
     * save restaurant data in database
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $restaurantData = $this->validateRequest();
        if (RestaurantCategory::create($restaurantData)) {
            Session::flash('success', 'Restaurant Category Added successfully!');
            return redirect(route('admin.restaurant_category.index'));
        } else {
            Session::flash('error', 'Failed to save restaurant category!');
            return redirect(route('admin.restaurant_category.create'));
        }

    }


    /**
     * show individual restaurant
     * @param RestaurantCategory $restaurant_category
     * @return Restaurant
     */
    public function edit(RestaurantCategory $restaurant_category)
    {
        $data = [
            'restaurant_category' => $restaurant_category,
        ];
        return view('admin.restaurant_category.edit')->with($data);
    }


    /**
     * update restaurant
     * @param Request $request
     * @param RestaurantCategory $restaurant_category
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request,RestaurantCategory $restaurant_category)
    {
        $restaurant_category->category_name = $request->category_name;
        if ($restaurant_category->save()) {
            Session::flash('success', 'Restaurant Category Updated successfully!');
            return redirect(route('admin.restaurant_category.index'));
        } else {
            Session::flash('error', 'Failed to update restaurant!');
            return redirect(route('admin.restaurant_category.edit',$restaurant_category->id));
        }
    }

    /**
     * delete restaurant category individually
     * @param RestaurantCategory $restaurant_category
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(RestaurantCategory $restaurant_category)
    {
        if ($restaurant_category->delete()) {
            Session::flash('success', 'Restaurant deleted successfully!');
            return redirect(route('admin.restaurant_category.index'));
        } else {
            Session::flash('error', 'Failed to delete restaurant!');
            return redirect(route('admin.restaurant_category.index'));
        }
    }

    /**
     * validation data
     * @return array
     */
    private function validateRequest()
    {
        return request()->validate([
            'category_name' => 'required|min:3|unique:restaurant_categories',
        ]);
    }
}
