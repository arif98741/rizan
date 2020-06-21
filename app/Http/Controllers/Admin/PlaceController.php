<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\Place;
use App\Models\Restaurant;
use Exception;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Image;
use Session;

class PlaceController extends Controller
{
    /**
     * view places list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'places' => Place::orderBy('id', 'desc')->get()
        ];


        return view('admin.place.index')->with($data);
    }


    /**
     * show place save form
     * @return Factory|View
     */
    public function create()
    {
        $data = [
            'restaurants' => Restaurant::orderBy('name')->get()
        ];
        return view('admin.place.create')->with($data);
    }


    /**
     * save place data in database
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $placeData = $this->validateRequest();
        $placeData['slug'] = Str::slug($placeData['place_name']);
        if (empty($placeData['slug'])) {
            $placeData['slug'] = preg_replace('/\s+/u', '-', trim($placeData['place_name']));
        }

        if (!empty($request->file('feature_photo'))) {

            $image = HelperController::imageUpload($request, 'feature_photo', 'place/');
            $placeData['feature_photo'] = $image['file_name'];
        }

        if (Place::create($placeData)) {
            Session::flash('success', 'Place Added successfully!');
            return redirect(route('admin.place.index'));
        } else {
            Session::flash('error', 'Failed to save place!');
            return redirect(route('admin.place.create'));
        }

    }


    /**
     * edit individual place
     * @param Place $place
     * @return Restaurant
     */
    public function edit(Place $place)
    {
        $data = [
            'place' => $place,
            'restaurants' => Restaurant::orderBy('name')->paginate(1)
        ];

        return view('admin.place.edit')->with($data);
    }


    /**
     * update place
     * @param Request $request
     * @param Place $place
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Place $place)
    {
        $validatedData = $this->updateValidateRequest();
        if (!empty($request->file('feature_photo'))) {

            if (file_exists($file = 'storage/uploads/place/feature/' . $place->feature_photo)) {
                File::delete($file);
            }
            if (file_exists($file = 'storage/uploads/place/thumbnail/' . $place->feature_photo)) {
                File::delete($file);
            }

            $image = HelperController::imageUpload($request, 'feature_photo', 'place/');
            $validatedData['feature_photo'] = $image['file_name'];

        } else {
            unset($validatedData['feature_photo']);
        }

        if ($place->update($validatedData)) {
            Session::flash('success', 'Place Updated successfully!');
            return redirect(route('admin.place.index'));
        } else {
            Session::flash('error', 'Failed to update place!');
            return redirect(route('admin.place.create'));
        }
    }

    /**
     * delete restaurant individually
     * @param Place $place
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Place $place)
    {
        if ($place->delete()) {
            if (file_exists($file = 'storage/uploads/place/feature/' . $place->feature_photo)) {
                File::delete($file);
            }
            if (file_exists($file = 'storage/uploads/place/thumbnail/' . $place->feature_photo)) {
                File::delete($file);
            }

            Session::flash('success', 'Place deleted successfully!');
            return redirect(route('admin.place.index'));
        } else {
            Session::flash('error', 'Failed to delete place!');
            return redirect(route('admin.place.index'));
        }
    }

    /**
     * validation data
     * @return array
     */
    private function validateRequest()
    {
        return request()->validate([
            'place_name' => 'required|min:3',
            'location' => 'required',
            'slug' => 'sometimes',
            'initial_details' => 'required',
            'tourist_attractions' => 'required',
            'how_to_go' => 'required',
            'feature_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

    }

    /**
     * update validation data
     * @return array
     */
    private function updateValidateRequest()
    {
        return request()->validate([
            'place_name' => 'required|min:3',
            'location' => 'required',
            'slug' => 'sometimes',
            'initial_details' => 'required',
            'tourist_attractions' => 'required',
            'how_to_go' => 'required',
            'feature_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
    }


}
