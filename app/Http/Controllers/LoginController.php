<?php

namespace TCableBilling\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 *
 * @package TCableBilling\Http\Controllers
 */
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
	
	/**
	 * LoginController constructor.
	 * Create a new controller instance.
	 */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{
		return 'username';
	}
	
	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return \Illuminate\Http\RedirectResponse |
	 *         \Illuminate\Http\Response |
	 *         \Illuminate\Http\JsonResponse
	 */
	public function login(Request $request)
	{
		$this->validateLogin($request);
		
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);
			
			return $this->sendLockoutResponse($request);
		}
		
		if ($this->attemptLogin($request)) {
			\Alert::success(
				'You just logged in.',
				'Welcome !'
			)->persistent('Close');
			return $this->sendLoginResponse($request);
		}
		
		$this->incrementLoginAttempts($request);
		
		return $this->sendFailedLoginResponse($request);
	}
}
