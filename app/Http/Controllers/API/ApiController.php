<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Semester;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    private $token = '$2y$10$a0ysRqMZxVO/8XJCNMyAouXBvwXoj5yP8.KkiRePF3lX2dOW52llK';
    /**
     * status code 200 success
     * status code 404 not found
     * status code 401 parameter missing
     * status code 402 token mismatched
     * status code 403 bad api call
     * status code 501 server error
     * status code 502 internal error
     * status code 503 service unavailable
     */

    /**
     * ApiController constructor
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
    public function getGroups(Request $request)
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

            $groups = Group::select('id', 'group_name')->orderBy('id', 'desc')->get();
            return json_encode($groups);
        }
    }

    /**
     * get group list according to semester id from groups
     * @param Request $request
     * @return false|string
     */
    public function getGroupByID(Request $request)
    {
        if ($request->isMethod('post')) {
            if (empty($request->token) || empty($request->semester_id)) {
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
            $semester_id = $request->semester_id;
            $group = Group::select('id', 'group_name')->orderBy('id', 'desc')->where('id', $semester_id)->first();
            if ($group) {
                $group['response'] = 'success';
                $group['code'] = '200';
                return json_encode($group);
            } else {
                return json_encode([
                    'response' => 'success',
                    'code' => '200',
                    'message' => 'No group found'
                ]);
            }
        }
    }

    /**
     * get teacher list according to specialization
     * @param Request $request
     * @return false|string
     */
    public function getTeachersBySpecialization(Request $request)
    {
        if ($request->isMethod('post')) {
            if (empty($request->token) || empty($request->specialization)) {
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
            $specialization = $request->specialization;
            $teachers = Teacher::select('id', 'name')->orderBy('name', 'asc')->where('specialization', $specialization)->get();
            if ($teachers) {

                echo json_encode($teachers);
            } else {
                echo json_encode([
                    'response' => 'success',
                    'code' => '200',
                    'message' => 'No group found'
                ]);
            }
        }
    }

    /**
     * get interest list by specialization
     * @param Request $request
     * @return false|string
     */
    public function getInterestsBySpecialization(Request $request)
    {
        if ($request->isMethod('post')) {
            if (empty($request->token) || empty($request->specialization)) {
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
            $specialization = $request->specialization;
            $interests = Interest::select('id', 'tentative_title')->orderBy('id', 'desc')->where('area_of_research', $specialization)->get();
            if ($interests) {

                echo json_encode($interests);
            } else {
                echo json_encode([
                    'response' => 'success',
                    'code' => '200',
                    'message' => 'No Interest found'
                ]);
            }
        }
    }
}
