<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Session;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $data = [
           // 'total_restaurant' => Restaurant::all()->count(),
          //  'total_food' => Food::all()->count(),
        ];


        return view('admin.dashboard')->with($data);
    }

    /**
     * @param Request $request
     * @return Application|Factory|RedirectResponse|Redirector|View
     */
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
            $setting->analytics = $request->analytics;
            if (!empty($request->password)) {
                $admin = Admin::find(1);
                $admin->password = Hash::make($request->password);
                $admin->save();
            }
            if ($setting->save()) {
                Session::flash('success', 'Setting updated successful');
                return redirect(route('admin.setting'));
            } else {
                Session::flash('error', 'Update failed. Unexpected error.');
                return redirect(route('admin.setting'));
            }
        }
        $setting = Setting::first();
        return view('admin.settings')->with(compact('setting'));
    }
}
