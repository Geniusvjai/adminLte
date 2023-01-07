<?php

namespace App\Http\Controllers\Site;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function WebLogin()
    {
        return view('site.login');
    }

    public function LoginProcess(Request $request)
    {
        $request->validate([
            'web_email' => 'required',
            'web_password' => 'required',
        ]);

        if (Auth::guard('webs')->attempt(['email' => $request->web_email, 'password' => $request->web_password])) {
            return redirect('/home');
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function LoggedOut()
    {
        Auth::guard('webs')->logout();
        return redirect('/home');
    }


    public function WebRegister()
    {
        return view('site.register');
    }

    public function WebForgotPassword()
    {
        return view('site.forgot');
    }

    //google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        //return home after login
        return redirect()->route('Home');
    }

    //facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        
        $this->_registerOrLoginUser($user);

        //return home after login
        return redirect()->route('Home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($data);
    }
}
