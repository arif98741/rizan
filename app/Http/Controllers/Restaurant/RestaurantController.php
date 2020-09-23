<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Notice;
use App\Models\Researchwork;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subscriber;
use App\Models\Subscription;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Session;

class RestaurantController extends Controller
{
    public function dashboard(Request $request)
    {
        $data = [

        ];
        return view('restaurant.dashboard')->with($data);
    }

    public function setting(Request $request)
    {
        if ($request->isMethod('post')) {
            $setting = Setting::find(1);
            $setting->contact = $request->contact;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->facebook = $request->facebook;
            $setting->twitter = $request->twitter;
            $setting->pinterest = $request->pinterest;
            $setting->instagram = $request->instagram;
            if ($setting->save()) {
                Session::flash('success', 'Setting updated successful');
                return redirect(route('restaurant.dashboard'));
            } else {
                Session::flash('error', 'Update successful');
                return redirect(route('restaurant.setting'));
            }
        }
        $setting = Setting::first();
        return view('restaurant.setting')->with(compact('setting'));
    }
}
