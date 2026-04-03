<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laramin\Utility\Onumoti;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = 'admin';

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $pageTitle = "Admin Login";
        return view('admin.auth.login', compact('pageTitle'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return auth()->guard('admin');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $admin = \App\Models\Admin::first();
        if ($admin) {
            auth()->guard('admin')->login($admin);
            return redirect()->route('admin.frontend.index');
        }

        return back()->withError('No admin user found.');
    }


    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect($this->redirectTo);
    }
}
