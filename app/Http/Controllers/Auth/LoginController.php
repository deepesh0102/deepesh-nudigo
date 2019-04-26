<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/itinerary';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return response()->json( $this->sendLockoutResponse($request));
        }
        if ($this->attemptLogin($request)) {
            return response()->json( [
                'success' => true,
                'redirect' => $this->redirectPath() ?: route('itinerary'),
            ] );
        }

        $this->incrementLoginAttempts($request);
        return response()->json([
                'success' => false,
                'error' => [$this->username() =>'These credentials do not match our records.'],
            ]


        );
    }



    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password','user_type');
    }


    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
//        throw ValidationException::withMessages([
//            $this->username() => [trans('auth.failed')],
//        ]);

        return response()->json([
                'success' => false,
                'error' => [
                    $this->username() =>'These credentials do not match our records.',
                ],
            ]


        );

    }


    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
//    protected function authenticated(Request $request, $user)
//    {
//        if($user->role==1){
//            return redirect()->route('admin.dashboard') ;
//        }elseif($user->role==2){
//            return redirect()->route('brands.dashboard') ;
//        }
//    }




}
