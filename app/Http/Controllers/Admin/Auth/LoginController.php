<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use AlAminFirdows\LaravelMultiAuth\Traits\LogsoutGuard;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    public $redirectTo = '/admin/home';


    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }


    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }
}
