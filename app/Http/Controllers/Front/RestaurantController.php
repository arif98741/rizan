<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\RestaurantReview;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Session;

class RestaurantController extends Controller
{
    /**
     * view restaurant list
     */
    public function index()
    {
        $data = [
            'restaurants' => Restaurant::with(['restaurant_category'])->paginate(9)
        ];

        //return $data;
        return view('front.restaurant.index')->with($data);
    }

    /**
     * view restaurant by slug
     * @param $slug
     * @return Factory|View
     */
    public function viewBySlug(Request $request, $slug)
    {
        return $this->commentAbility(4);


        $data = [
            'foods' => Food::with('restaurant')
                ->whereHas('restaurant', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })
                ->paginate(9),
            'restaurant' => Restaurant::with(['restaurant_category'])->where('slug', $slug)->firstOrFail()
        ];
        return view('front.restaurant.single_restaurant')->with($data);
    }

    /**
     * Review & comment
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Redirector
     */
    public function restaurant_comment(Request $request)
    {
        if ($request->isMethod('post')) {
            $commentData = $this->commentValidation();
            $commentData['ip'] = $_SERVER['REMOTE_ADDR'];
            $commentData['next_comment'] = $this->nextComment();
            $restaurant = Restaurant::find($commentData['restaurant_id'])->first();


            if (RestaurantReview::create($commentData)) {
                Session::flash('success', 'Comment Added successfully!');
                return redirect('restaurant/view/' . $restaurant->slug);
            } else {
                Session::flash('error', 'Failed to save place!');
                return redirect(route('admin.place.create'));
            }
        }
    }

    /**
     * comment validation data
     * @return array
     */
    private function commentValidation()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'restaurant_id' => 'required',
            'comment' => 'required',

        ]);
    }

    /**
     * next comment generate time
     */
    private function nextComment()
    {
        $carbon_date = Carbon::parse(date('Y-m-d H:i:s'));
        $carbon_date->addMinute(10);
        return $carbon_date->format('Y-m-d H:i:s');
    }


    /**
     * comment ability
     * @param $restaurant_id
     * @return
     */
    private function commentAbility($restaurant_id)
    {
        return RestaurantReview::where('ip', $_SERVER['REMOTE_ADDR'])
            ->where('next_comment', '<', date('Y-m-d H:i:s'))
            ->get();
    }
}
