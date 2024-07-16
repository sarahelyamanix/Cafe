<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if (!$user->is_active) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Your account is not active. Please contact the administrator.']);
        }
    }

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
    if ($user && !$user->email) {
        $errors = [$this->username() => 'Please insert your username.'];
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
     * Determine the field to be used for authentication (username).
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
    }
    /**
     * Where to redirect users after login.
     *
     * 
     * 
    


     
     * @var string
     */
    public function username()
    {
        return 'username';
    }

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
