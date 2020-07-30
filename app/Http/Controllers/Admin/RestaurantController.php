<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\FeatureRestaurant;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Image;
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
            $image = HelperController::imageUpload($request, 'feature_photo', 'restaurant/');
            $restaurantData['feature_photo'] = $image['file_name'];
        }

        if (!empty($request->file('cover_photo'))) {
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();

            $ImageUpload = Image::make($file);
            $originalPath = public_path('uploads/restaurant/cover/');
            $fileName = time() . rand(11111111, 99999999) . '.' . $extension;
            $featurePath = $originalPath . $fileName;
            $ImageUpload->save($featurePath);
            $restaurantData['cover_photo'] = $fileName;
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

        if (!empty($request->file('feature_photo'))) {

            if (file_exists(public_path('uploads/restaurant/feature/' . $restaurant->feature_photo))) {
                File::delete(public_path('uploads/restaurant/feature/' . $restaurant->feature_photo));
            }
            if (file_exists(public_path('uploads/restaurant/thumbnail/' . $restaurant->feature_photo))) {
                File::delete(public_path('uploads/restaurant/thumbnail/' . $restaurant->feature_photo));
            }
            $image = HelperController::imageUpload($request, 'feature_photo', 'restaurant/');
            $updateValidationData['feature_photo'] = $image['file_name'];
        } else {
            unset($updateValidationData['feature_photo']);
        }

        if (!empty($request->file('cover_photo'))) {

            if (file_exists(public_path('uploads/restaurant/cover/' . $restaurant->cover_photo))) {
                File::delete(public_path('uploads/restaurant/cover/' . $restaurant->cover_photo));
            }
            $image = HelperController::imageUpload($request, 'cover_photo', 'restaurant/');
            $updateValidationData['cover_photo'] = $image['file_name'];
        } else {
            unset($updateValidationData['cover_photo']);
        }


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
            if (file_exists(public_path('uploads/restaurant/feature/' . $restaurant->feature_photo))) {
                File::delete(public_path('uploads/restaurant/feature/' . $restaurant->feature_photo));
            }
            if (file_exists(public_path('uploads/restaurant/thumbnail/' . $restaurant->feature_photo))) {
                File::delete(public_path('uploads/restaurant/thumbnail/' . $restaurant->feature_photo));
            }
            if (file_exists(public_path('uploads/restaurant/cover/' . $restaurant->cover_photo))) {
                File::delete(public_path('uploads/restaurant/cover/' . $restaurant->cover_photo));
            }


            Session::flash('success', 'Restaurant deleted successfully!');
            return redirect(route('admin.restaurant.index'));
        } else {
            Session::flash('error', 'Failed to delete restaurant!');
            return redirect(route('admin.restaurant.create'));
        }
    }

    /**
     * Feature restaurant list
     * @return Factory|View
     */
    public function feature()
    {
        $data = [
            'feature_restaurants' => FeatureRestaurant::with(['restaurant'])->get()
        ];

        return view('admin.restaurant.feature.index')->with($data);
    }

    /**
     * Add Feature restaurant
     * @return Factory|View
     */
    public function featureAdd()
    {
        $data = [
            'restaurants' => Restaurant::orderBy('name', 'asc')->get()
        ];

        return view('admin.restaurant.feature.add')->with($data);
    }

    /**
     * Add Feature restaurant
     * @return Factory|View
     */
    public function featureStore(Request $request)
    {
        $data = $request->all();

        $status = FeatureRestaurant::where('restaurant_id', $data['restaurant_id'])->first();
        $order_status = FeatureRestaurant::where(
            [
                'order' => $data['order']
            ]
        )->first();

        if ($status) {
            Session::flash('error', 'Already added in feature restaurant list!');
            return redirect('admin/restaurant/feature');
        }

        if ($order_status) {
            Session::flash('error', 'Select different different order or delete pre assigned order ');
            return redirect('admin/restaurant/feature');
        }

        if (FeatureRestaurant::create($data)) {
            Session::flash('success', 'Feature restaurant added successfully!');
            return redirect('admin/restaurant/feature');
        } else {
            Session::flash('error', 'Failed to add feature restaurant!');
            return redirect('admin/restaurant/feature');
        }

    }

    /**
     * Add Feature restaurant
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function featureDelete(Request $request, $id)
    {
        $feature = FeatureRestaurant::find($id);
        if ($feature->delete()) {
            Session::flash('success', 'Restaurant Deleted from feature list!');
            return redirect('admin/restaurant/feature');
        } else {
            Session::flash('error', 'Failed to remove from feature restaurant list!');
            return redirect('admin/restaurant/feature');
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
            'map_code' => 'sometimes',
            'password' => 'required|min:6',
            'feature_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'cover_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'facebook' => 'sometimes',
            'instagram' => 'sometimes',
            'website' => 'sometimes'
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
            'contact' => 'sometimes',
            'map_code' => 'sometimes',
            'feature_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'cover_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'facebook' => 'sometimes',
            'instagram' => 'sometimes',
            'website' => 'sometimes'
        ]);
    }


}
