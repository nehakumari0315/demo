<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
       return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
             // log them in
             auth()->login($existingUser, true);

        } else {
           // create a new user
           $newUser = new User;
           $newUser->name            = $user->name;
           $newUser->email           = $user->email;
           $newUser->google_id       = $user->id;
           $newUser->avatar          = $user->avatar;
           $newUser->avatar_original = $user->avatar_original;
           $newUser->save();
           auth()->login($newUser, true);
        }
        return redirect('dashboard');
    }

}
