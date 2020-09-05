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
            'restaurants' => Restaurant::with(['restaurant_category','restaurant_review'])
                ->orderBy('id', 'asc')
                ->paginate(env('PAGINATE_PER_PAGE'))
        ];

        return view('front.restaurant.index')->with($data);
    }

    /**
     * view restaurant by slug
     * @param $slug
     * @return Factory|View
     */
    public function viewBySlug($slug)
    {
        $restaurant = Restaurant::with(['restaurant_category', 'restaurant_review'])
            ->where('slug', $slug)
            ->firstOrFail();
        $data = [
            'foods' => Food::with('restaurant', 'food_review')
                ->whereHas('restaurant', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->paginate(9),
            'restaurant' => $restaurant,
            'reviews' => RestaurantReview::where(
                [
                    'restaurant_id' => $restaurant->id,
                    'status' => 1
                ])->orderBy('id', 'desc')
                ->paginate(env('COMMENT_PER_PAGE'))
        ];
        $data['og']['og_title'] = $data['restaurant']->name;
        $data['og']['og_image'] = $data['restaurant']->cover_photo;
        $data['og']['og_image_src'] = asset('uploads/restaurant/cover/' . $data['restaurant']->cover_photo);

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
            $commentData['restaurant_id'] = $request->restaurant_id;
            $commentData['status'] = 1;
            $restaurant = Restaurant::where('id', $commentData['restaurant_id'])->first();

            if ($data = $this->commentAbility($commentData['restaurant_id'])) {
                $databaseNextDay = $data->next_comment;

                if (Carbon::now() < $databaseNextDay) {

                    $start = Carbon::now();
                    $end = $databaseNextDay;
                    $minutesDifference = $start->diffInMinutes($end);

                    Session::flash('error', 'Failed to comment. Please try again after ' . $minutesDifference . ' minutesl');
                    return redirect('restaurant/' . $restaurant->slug . '#review-message');
                }
            }

            if (RestaurantReview::create($commentData)) {
                Session::flash('success', 'Comment added successfully!');
                return redirect('restaurant/' . $restaurant->slug . '#review-message');
            } else {
                Session::flash('error', 'Failed to save comment!');
                return redirect('restaurant/' . $restaurant->slug);
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
            'rating' => 'required',
            'comment' => 'required',

        ]);
    }

    /**
     * next comment generate time
     * @param int $minute
     * @return string
     */
    private function nextComment($minute = 5)
    {
        $carbon_date = Carbon::parse(date('Y-m-d H:i:s'));
        $carbon_date->addMinute($minute);
        return $carbon_date->format('Y-m-d H:i:s');
    }


    /**
     * comment ability
     * @param $restaurant_id
     * @return void
     */
    private function commentAbility($restaurant_id)
    {
        $restaurant = RestaurantReview::where(
            [
                'ip' => $_SERVER['REMOTE_ADDR'],
                'restaurant_id' => $restaurant_id
            ])->orderBy('id', 'desc')
            ->first();

        if ($restaurant) {
            return $restaurant;
        } else {
            return false;
        }
    }
}
