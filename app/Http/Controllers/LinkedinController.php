<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class LinkedinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
            $user = Socialite::driver('linkedin')->user();
            $finduser = User::where('social_id', $user->id)->first();
            if($finduser){

                Auth::login($finduser);
                return redirect('dashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'linkedin',
                    'password' => encrypt('123456')
                ]);

                Auth::login($newUser);

                return redirect('dashboard');
            }

        }



}
