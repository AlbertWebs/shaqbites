<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Hash;
use Socialite;
use App\Models\User;
use Auth;
use Str;
use Session;
use Redirect;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)

    {

        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);



        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return response()->json([
                "message" => "Success"
            ]);

        }



        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }

    public function facebookRedirect(){
        $user = Socialite::driver('facebook')->stateless()->user();
        // Logic
        $user = User::firstOrCreate([
            'email' => $user->email

        ],[
             'name' =>$user->name,
             'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);
        return redirect()->to('/mobile');
    }

    public function facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(){
        $user = Socialite::driver('google')->stateless()->user();
        // Logic
        $user = User::firstOrCreate([
            'email' => $user->email

        ],[
             'name' =>$user->name,
             'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);
        return redirect()->to('/mobile');
    }



    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
        auth()->login($user);
        return redirect()->to('/mobile');
    }
}
