<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    protected function attemptLogin(Request $request)
{
    $credentials = $this->credentials($request);

    // Add the is_active check to the credentials array
    $credentials['is_active'] = true;

    return $this->guard()->attempt(
        $credentials, $request->filled('remember')
    );
}

    
    protected function sendFailedLoginResponse(Request $request)
{
    $errors = [$this->username() => trans('auth.failed')];

    $user = \App\Models\User::where($this->username(), $request->{$this->username()})->first();

    if ($user && !Hash::check($request->password, $user->password)) {
        $errors = [$this->username() => trans('auth.password')];
    }

    if ($user && !$user->is_active) {
        $errors = [$this->username() => 'Your account is not active. Please contact the administrator.'];
    }

    if ($request->expectsJson()) {
        return response()->json($errors, 422);
    }

    return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
}


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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}