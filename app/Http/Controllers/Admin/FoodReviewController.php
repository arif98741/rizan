<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodReview;
use Illuminate\Http\Response;
use Session;

class FoodReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = [
            'reviews' => FoodReview::with(['food','restaurant'])
                ->orderBy('id', 'desc')
                ->get()
        ];

        return view('admin.food-review.index')->with($data);
    }


    /**
     * Change Restaurant Status
     * @param $review_id
     * @param $status
     * @return void
     */
    public function changeStatus($review_id, $status)
    {
        $review = FoodReview::find($review_id);
        $review->status = $status;
        if ($review->update()) {
            if ($status == 1)
                $status = 'published';
            else if ($status == 0)
                $status = 'pending';

            Session::flash('success', 'Review status successfully changed ' . $status . '!');
            return redirect(route('admin.food_review.index'));
        } else {
            Session::flash('error', 'Failed to change review review!');
            return redirect(route('admin.food_review.index'));
        }

    }


    /**
     * Remove the specified resource from storage
     * @param FoodReview $food_review
     * @return void
     * @throws \Exception
     */
    public function destroy(FoodReview $food_review)
    {
        if ($food_review->delete()) {
            Session::flash('success', 'Review deleted successfully!');
            return redirect(route('admin.food_review.index'));
        } else {
            Session::flash('error', 'Failed to delete review!');
            return redirect(route('admin.food_review.index'));
        }
    }
}
