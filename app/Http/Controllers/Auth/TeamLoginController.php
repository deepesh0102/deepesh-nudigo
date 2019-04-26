<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class TeamLoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/team';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:team');//->except('logout');
    }

    public function showLoginForm(){

        return view('auth.team-login');

    }


    public function login(Request $request){

       //validate form
      //attempt to log to user in
      //If Successful, then redirect to intended location
      //if unsuccessful then redirect back to the login with form data

        // validate the form data

        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in ALTER TABLE `users` ADD `user_type` TINYINT NULL DEFAULT NULL COMMENT '1:user; 2:team; 3:Accounts' AFTER `id`;

        if(Auth::guard('team')->attempt(['email'=>$request->email, 'password'=>$request->password, 'user_type'=>$request->user_type ])){
            // if successful, then redirect to their intended location

            //            return redirect()->route('admin.dashboard');

            if($request->expectsJson()){
                return response()->json( [
                    'success' => true,
                    'redirect' => $this->redirectTo,
                ] );
            }

            return redirect()->intended(route('team.dashboard'));
        }
        // if unsuccessful, then redirect bck to the login with the form data
        return $this->sendFailedLoginResponse($request);
//        return redirect()->back()->withInput($request->only('email','password'));


    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('team')->logout();
        return redirect('/');//->intended(route('home'));
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

        if($request->expectsJson()){
            return response()->json([
                    'success' => false,
                    'error' => [
                        'email' =>'These credentials do not match our records.',
                    ],
                ],
                422
            );
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

}
