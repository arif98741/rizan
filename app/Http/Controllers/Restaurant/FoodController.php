<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\Food;
use App\Models\Restaurant;
use Exception;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Session;

class FoodController extends Controller
{
    /**
     * view restaurant list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'foods' => Food::with(['restaurant'])
                ->where('restaurant_id', $this->user()->id)
                ->get()
        ];
        return view('restaurant.food.index')->with($data);
    }


    /**
     * show food save form
     * @return Factory|View
     */
    public function create()
    {
        $data = [
            'restaurants' => Restaurant::orderBy('name')->get()
        ];
        return view('restaurant.food.create')->with($data);
    }

    /**
     * save food data in database
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $foodData = $this->validateRequest();

        $foodData['restaurant_id'] = $this->user()->id;
        $foodData['slug'] = Str::slug($foodData['name']);
        if (!empty($request->file('feature_photo'))) {
            $image = HelperController::imageUpload($request, 'feature_photo', 'food/');
            $foodData['feature_photo'] = $image['file_name'];
        }

        if (Food::create($foodData)) {
            Session::flash('success', 'Food Added successfully!');
            return redirect(route('restaurant.food.index'));
        } else {
            Session::flash('error', 'Failed to save food!');
            return redirect(route('restaurant.food.create'));
        }

    }


    /**
     * edit individual food
     * @param Food $food
     * @return Restaurant
     */
    public function edit(Food $food)
    {
        if ($food->restaurant_id != $this->user()->id) {
            Session::flash('error', 'You are not permitted to view this page');
            return redirect(route('restaurant.food.index'));
        }


        $data = [
            'food' => $food,
            'restaurants' => Restaurant::orderBy('name')->get()
        ];

        return view('restaurant.food.edit')->with($data);
    }


    /**
     * update food
     * @param Request $request
     * @param Food $food
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Food $food)
    {
        if ($food->restaurant_id != $this->user()->id) {
            Session::flash('error', 'You are not permitted to view this page');
            return redirect(route('restaurant.food.index'));
        }

        if (!empty($request->file('feature_photo'))) {
            //TODO: update feature photo
            /*  if (File::exists('/uploads/food/feature/'.$food->feature_photo )) {
                  echo 'yes exist';
                  File::delete('/uploads/food/feature/'.$food->feature_photo );
              }else{
                  echo 'yes not exist';
              }


              $image = HelperController::imageUpload($request, 'feature_photo', 'food/feature');
              $foodData['feature_photo'] = $image['file_name'];
            */
        }
        $validatedData = $this->updateValidateRequest();
        unset($validatedData['feature_photo']);
        if ($food->update($validatedData)) {
            Session::flash('success', 'Food Updated successfully!');
            return redirect(route('restaurant.food.index'));
        } else {
            Session::flash('error', 'Failed to update food!');
            return redirect(route('restaurant.food.create'));
        }
    }

    /**
     * delete restaurant individually
     * @param Food $food
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Food $food)
    {
        if ($food->restaurant_id != $this->user()->id) {
            Session::flash('error', 'You are not permitted to view this page');
            return redirect(route('restaurant.food.index'));
        }

        if ($food->delete()) {
            Session::flash('success', 'Food deleted successfully!');
            return redirect(route('restaurant.food.index'));
        } else {
            Session::flash('error', 'Failed to delete food!');
            return redirect(route('restaurant.food.index'));
        }
    }

    /**
     * Get Logged In Restaurant
     * @return mixed
     */
    private function user()
    {
        return Auth::guard('restaurant')->user();
    }

    /**
     * validation data
     * @return array
     */
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'restaurant_id' => 'sometimes',
            'description' => 'required',
            'feature_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
    }

    /**
     * update validation data
     * @param $id
     * @return array
     */
    private function updateValidateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'description' => 'required',
            'feature_photo' => 'sometimes',
        ]);
    }


}
