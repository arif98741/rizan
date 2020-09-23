<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\Page;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Image;
use Session;

class PageController extends Controller
{
    /**
     * view places list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'pages' => Page::orderBy('id', 'asc')->get()
        ];


        return view('admin.page.index')->with($data);
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
        return view('admin.page.create')->with($data);
    }


    /**
     * save place data in database
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $pageData = $this->validateRequest();
        $pageData['slug'] = Str::slug($pageData['place_name']);
        if (empty($pageData['slug'])) {
            $pageData['slug'] = preg_replace('/\s+/u', '-', trim($pageData['place_name']));
        }

        if (!empty($request->file('feature_photo'))) {

            $image = HelperController::imageUpload($request, 'feature_photo', 'place/');
            $pageData['feature_photo'] = $image['file_name'];
        }

        if (Place::create($pageData)) {
            Session::flash('success', 'Page Added successfully!');
            return redirect(route('admin.page.index'));
        } else {
            Session::flash('error', 'Failed to save place!');
            return redirect(route('admin.page.create'));
        }

    }


    /**
     * edit individual place
     * @param Page $page
     * @return Restaurant
     */
    public function edit(Page $page)
    {
        $data = [
            'page' => $page,
        ];

        return view('admin.page.edit')->with($data);
    }


    /**
     * update place
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Page $page)
    {
        $validatedData = $this->updateValidateRequest();

        //dead code
        /*if (!empty($request->file('feature_photo'))) {

            if (file_exists($file = 'storage/uploads/place/feature/' . $page->feature_photo)) {
                File::delete($file);
            }
            if (file_exists($file = 'storage/uploads/place/thumbnail/' . $page->feature_photo)) {
                File::delete($file);
            }

            $image = HelperController::imageUpload($request, 'feature_photo', 'place/');
            $validatedData['feature_photo'] = $image['file_name'];

        } else {
            unset($validatedData['feature_photo']);
        }*/

        if ($page->update($validatedData)) {
            Session::flash('success', 'Page Updated successfully!');
            return redirect(route('admin.page.index'));
        } else {
            Session::flash('error', 'Failed to update place!');
            return redirect(route('admin.page.create'));
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
            'page_title' => 'required|min:3',
            'slug' => 'required',
            'description' => 'required',
            'object_description' => 'sometimes',
        ]);
    }


}
