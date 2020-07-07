<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $token = '$2y$10$a0ysRqMZxVO/8XJCNMyAouXBvwXoj5yP8.KkiRePF3lX2dOW52llK';
    /**
     * status code 200 success
     * status code 401 parameter missing
     * status code 402 token mismatched
     * status code 403 bad api call
     * status code 404 url not found
     * status code 405 data not found
     * status code 501 server error
     * status code 502 internal error
     * status code 503 service unavailable
     */

    /**
     * RestaurantController constructor
     * @param Request $request
     */
    public function __construct(Request $request)
    {

    }

    /**
     * get group list
     * @param Request $request
     * @return false|string
     */
    public function checkEmail(Request $request)
    {

        if ($request->isMethod('post')) {

            if (empty($request->token)) {
                return json_encode([
                    'response' => 'error',
                    'code' => '401',
                    'message' => 'missing required parameters'
                ]);
            }

            if ($request->token != $this->token) {
                return json_encode([
                    'response' => 'error',
                    'code' => '402',
                    'message' => 'token mismatched'
                ]);
            }

            $group = Restaurant::where('email', $request->email)->first();
            if ($group) {
                return json_encode([
                    'response' => 'success',
                    'code' => '200',
                    'message' => 'Data Successfully fetched'
                ]);
            } else {
                return json_encode([
                    'response' => 'success',
                    'code' => '405',
                    'message' => 'Data not found'
                ]);
            }

        }
    }

    /**
     * get group list
     * @param Request $request
     * @return false|string
     */
    public function checkContact(Request $request)
    {

        if ($request->isMethod('post')) {

            if (empty($request->token)) {
                return json_encode([
                    'response' => 'error',
                    'code' => '401',
                    'message' => 'missing required parameters'
                ]);
            }

            if ($request->token != $this->token) {
                return json_encode([
                    'response' => 'error',
                    'code' => '402',
                    'message' => 'token mismatched'
                ]);
            }

            $group = Restaurant::where('contact', $request->contact)->first();
            if ($group) {
                return json_encode([
                    'response' => 'success',
                    'code' => '200',
                    'message' => 'Data Successfully fetched'
                ]);
            } else {
                return json_encode([
                    'response' => 'success',
                    'code' => '405',
                    'message' => 'Data not found'
                ]);
            }

        }
    }

    /**
     * get Single Food
     * @param Request $request
     * @return false|string
     */
    public function singleFood(Request $request)
    {

        if ($request->isMethod('post')) {

            if (empty($request->token)) {
                return json_encode([
                    'response' => 'error',
                    'code' => '401',
                    'message' => 'missing required parameters'
                ]);
            }

            if ($request->token != $this->token) {
                return json_encode([
                    'response' => 'error',
                    'code' => '402',
                    'message' => 'token mismatched'
                ]);
            }

            $food_id = $request->food_id;
            $restaurant_id = $request->restaurant_id;
            $food = Food::with(['restaurant'])
                ->where([
                    'restaurant_id' => $restaurant_id,
                    'id' => $food_id
                ])->first();
            if ($food) {
                return json_encode([
                    'response' => 'success',
                    'code' => '200',
                    'message' => 'Data Successfully fetched',
                    'data' => $food
                ]);
            } else {
                return json_encode([
                    'response' => 'success',
                    'code' => '405',
                    'message' => 'Data not found'
                ]);
            }

        }
    }


}
