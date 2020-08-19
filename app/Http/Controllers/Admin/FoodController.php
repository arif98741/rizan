<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\FeatureFood;
use App\Models\Food;
use App\Models\Restaurant;
use Exception;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Session;
use Storage;


class FoodController extends Controller
{
    /**
     * view restaurant list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'foods' => Food::with(['restaurant'])->get()
        ];
        return view('admin.food.index')->with($data);
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
        return view('admin.food.create')->with($data);
    }

    /**
     * save food data in database
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $foodData = $this->validateRequest();
        $foodData['slug'] = Str::slug($foodData['name']);
        if (!empty($request->file('feature_photo'))) {
            $image = HelperController::imageUpload($request, 'feature_photo', 'food/');
            $foodData['feature_photo'] = $image['file_name'];
        }

        if (Food::create($foodData)) {
            Session::flash('success', 'Food Added successfully!');
            return redirect(route('admin.food.index'));
        } else {
            Session::flash('error', 'Failed to save food!');
            return redirect(route('admin.food.create'));
        }

    }


    /**
     * edit individual food
     * @param Food $food
     * @return Restaurant
     */
    public function edit(Food $food)
    {
        $data = [
            'food' => $food,
            'restaurants' => Restaurant::orderBy('name')->get()
        ];

        return view('admin.food.edit')->with($data);
    }


    /**
     * update food
     * @param Request $request
     * @param Food $food
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Food $food)
    {
        $validatedData = $this->updateValidateRequest();
        if (!empty($request->file('feature_photo'))) {
            //$status = Storage::disk('public')->exists(public_path('uploads/food/feature/' . $food->feature_photo));
            if (file_exists(public_path('uploads/food/feature/' . $food->feature_photo))) {
                File::delete(public_path('uploads/food/feature/' . $food->feature_photo));
            }
            if (file_exists(public_path('uploads/food/thumbnail/' . $food->feature_photo))) {
                File::delete(public_path('uploads/food/thumbnail/' . $food->feature_photo));
            }

            $image = HelperController::imageUpload($request, 'feature_photo', 'food/');
            $validatedData['feature_photo'] = $image['file_name'];
        } else {

            unset($validatedData['feature_photo']);
        }

        if ($food->update($validatedData)) {
            Session::flash('success', 'Food Updated successfully!');
            return redirect(route('admin.food.index'));
        } else {
            Session::flash('error', 'Failed to update food!');
            return redirect(route('admin.food.create'));

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
        if ($food->delete()) {

            if (file_exists(public_path('uploads/food/feature/' . $food->feature_photo))) {
                File::delete(public_path('uploads/food/feature/' . $food->feature_photo));
            }
            if (file_exists(public_path('uploads/food/thumbnail/' . $food->feature_photo))) {
                File::delete(public_path('uploads/food/thumbnail/' . $food->feature_photo));
            }

            Session::flash('success', 'Food deleted successfully!');
            return redirect(route('admin.food.index'));
        } else {
            Session::flash('error', 'Failed to delete food!');
            return redirect(route('admin.food.index'));
        }
    }


    /**
     * TODO:: code with bug
     * Feature restaurant list
     * @return Factory|View
     */
    public function feature()
    {
        $data = [
            'feature_foods' => FeatureFood::with(['food'])
                ->orderBy('id', 'asc')
                ->get()
        ];


        return view('admin.food.feature.index')->with($data);
    }

    /**
     * Add Feature restaurant
     * @return Factory|View
     */
    public function featureAdd()
    {
        $data = [
            'foods' => Food::with(['restaurant'])
                ->orderBy('name', 'asc')->get()
        ];

        return view('admin.food.feature.add')->with($data);
    }

    /**
     * Add Feature restaurant
     * @param Request $request
     * @return Factory|View
     */
    public function featureStore(Request $request)
    {
        $data = $request->all();
        $status = FeatureFood::where('food_id', $data['food_id'])->first();
        $order_status = FeatureFood::where(
            [
                'order' => $data['order']
            ]
        )->first();

        if ($status) {
            Session::flash('error', 'Already added in feature food list!');
            return redirect('admin/food/feature');
        }

        if ($order_status) {
            Session::flash('error', 'Select different different order or delete pre assigned order ');
            return redirect('admin/food/feature');
        }

        if (FeatureFood::create($data)) {
            Session::flash('success', 'Feature food added successfully!');
            return redirect('admin/food/feature');
        } else {
            Session::flash('error', 'Failed to add feature food!');
            return redirect('admin/food/feature');
        }

    }

    /**
     * Add Feature food
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function featureDelete(Request $request, $id)
    {
        $feature = FeatureFood::find($id);
        if ($feature->delete()) {
            Session::flash('success', 'Food deleted from feature list!');
            return redirect('admin/food/feature');
        } else {
            Session::flash('error', 'Failed to remove from feature food list!');
            return redirect('admin/food/feature');
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
            'price' => 'required',
            'restaurant_id' => 'required',
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
            'restaurant_id' => 'required',
            'description' => 'required',
            'feature_photo' => 'sometimes',
        ]);
    }


}
