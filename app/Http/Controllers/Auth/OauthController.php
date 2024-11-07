<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class OauthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where("google_id", $google_user->id)->first();

            if ($user) {
                $newUser = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                auth()->login($newUser, true);
                return redirect()->route('home');
            } else {
                auth()->login($user, true);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
        }
    }
}
