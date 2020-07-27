<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Offer;
use App\Models\Restaurant;
use Exception;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class OfferController extends Controller
{
    /**
     * view restaurant list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'offers' => Offer::with(['food','restaurant'])
                ->orderBy('id', 'desc')
                ->get()
        ];

        return view('admin.offer.index')->with($data);
    }

    /**
     * show food save form
     * @return Factory|View
     */
    public function create()
    {
        $data = [
            'foods' => Food::with(['restaurant'])
                ->where('restaurant_id', $this->user()->id)
                ->get(),
            'restaurant' => $this->user()->id
        ];
        return view('admin.offer.create')->with($data);
    }

    /**
     * save food data in database
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $offerData = $this->validateRequest();

        $offerData['restaurant_id'] = $this->user()->id;

        if (Offer::create($offerData)) {
            Session::flash('success', 'Offer Added successfully!');
            return redirect(route('admin.offer.index'));
        } else {
            Session::flash('error', 'Failed to save food!');
            return redirect(route('admin.offer.create'));
        }

    }

    /**
     * edit individual food
     * @param Offer $offer
     * @return Restaurant
     */
    public function edit(Offer $offer)
    {
        $data = [
            'offer' => $offer,
            'foods' => Food::with(['restaurant'])
                ->get(),
        ];

        return view('admin.offer.edit')->with($data);
    }


    /**
     * update food
     * @param Request $request
     * @param Offer $offer
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Offer $offer)
    {
        $validatedData = $this->updateValidateRequest();

        if ($offer->update($validatedData)) {
            Session::flash('success', 'Offer Updated successfully!');
            return redirect(route('admin.offer.index'));
        } else {
            Session::flash('error', 'Failed to update food!');
            return redirect(route('admin.offer.create'));
        }
    }

    /**
     * delete restaurant individually
     * @param Offer $offer
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Offer $offer)
    {

        if ($offer->delete()) {
            Session::flash('success', 'Offer deleted successfully!');
            return redirect(route('admin.offer.index'));
        } else {
            Session::flash('error', 'Failed to delete food!');
            return redirect(route('admin.offer.index'));
        }
    }

    /**
     * validation data
     * @return array
     */
    private function validateRequest()
    {
        return request()->validate([
            'food_id' => 'required',
            'restaurant_id' => 'sometimes',
            'offer_price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'sometimes',
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
            'food_id' => 'required',
            'restaurant_id' => 'sometimes',
            'offer_price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'offer_description' => 'sometimes',
        ]);
    }


}
