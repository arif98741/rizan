<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodReview;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Session;


class FoodController extends Controller
{
    /**
     * view food  list
     */
    public function index()
    {
        $data = [
            'foods' => Food::with('restaurant')->orderBy('id')->paginate(env('PAGINATE_PER_PAGE')),
        ];

        return view('front.food.index')->with($data);
    }

    /**
     * view food  by slug
     * @param Request $request
     * @param $slug
     */
    public function viewBySlug(Request $request, $restaurant_slug, $slug)
    {
        $data = [
            'food' => Food::with('restaurant')
                ->where('slug', $slug)
                ->firstOrFail(),
            'reviews' => FoodReview::with('food')
                ->where('status', 0)
                ->whereHas('food', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->paginate(env('PAGINATE_PER_PAGE'))
        ];

        return view('front.food.single_food')->with($data);
    }

    /**
     * Review & comment
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Redirector
     */
    public function food_comment(Request $request)
    {
        if ($request->isMethod('post')) {

            $commentData = $this->commentValidation();
            $commentData['ip'] = $_SERVER['REMOTE_ADDR'];
            $commentData['next_comment'] = $this->nextComment();
            $commentData['food_id'] = $request->food_id;
            $commentData['restaurant_id'] = $request->restaurant_id;

            $commentData['food_id'] = $request->food_id;
            $restaurant = Restaurant::find($commentData['restaurant_id'])->first();
            $food = Food::find($commentData['food_id'])->first();

            if ($data = $this->commentAbility($commentData['food_id'])) {
                $databaseNextDay = $data->next_comment;

                if (Carbon::now() < $databaseNextDay) {

                    $start = Carbon::now();
                    $end = $databaseNextDay;
                    $minutesDifference = $start->diffInMinutes($end);

                    Session::flash('error', 'Failed to comment. Please try again after ' . $minutesDifference . ' minutesl');
                    return redirect('food/' . $restaurant->slug . '/' . $food->slug . '/' . '#review-message');
                }
            }

            if (FoodReview::create($commentData)) {
                Session::flash('success', 'Comment added successfully, it will be published soon!');
                return redirect('food/' . $restaurant->slug . '/' . $food->slug . '/' . '#review-message');
            } else {
                Session::flash('error', 'Failed to save comment!');
                return redirect('food/' . $restaurant->slug . '/' . $food->slug . '/' . '#review-message');
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
            'food_id' => 'required',
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
     * @param $food_id
     * @return void
     */
    private function commentAbility($food_id)
    {
        $food = FoodReview::where(
            [
                'ip' => $_SERVER['REMOTE_ADDR'],
                'food_id' => $food_id
            ])->orderBy('id', 'desc')
            ->first();

        if ($food) {
            return $food;
        } else {
            return false;
        }
    }


}
