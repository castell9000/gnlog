<?php

namespace App\Http\Controllers;

use Auth;
use Log;
use App\Socialuser;
use Illuminate\Http\Request;
use App\Http\Requests;
use Laravel\Socialite\Facades\Socialite;

class NaverAuthController extends Controller
{

    public function redirectToProvider(){
        return Socialite::with('naver') -> redirect();
    }

    public function handleProviderCallback(){
        $user = Socialite::with('naver')->user();
        $userToLogin = Socialuser::where([
            'provider' => 'naver',
            'socialid' => $user->getId(),
            'email' => $user->getEmail(),
        ])->first();

        if(!$userToLogin){
            Socialuser::create([
                'provider' => 'naver',
                'socialid' => $user->getId(),
                'email' => $user->getEmail(),
                'token' => $user->token,
                'name' => $user->getNickname(),
            ]);
        }
        auth()->login($userToLogin, true);
	
        return redirect('/');
    }


}
