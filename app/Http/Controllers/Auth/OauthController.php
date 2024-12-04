<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class OauthController extends Controller
{
    // Xử lý đăng nhập với GitHub
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $github_user = Socialite::driver('github')->user();
        $user = User::where("github_id", $github_user->id)->first();

        if ($user) {
            auth()->login($user, true);
        } else {
            $newUser = User::create([
                'name' => $github_user->getNickname(),
                'email' => $github_user->getEmail(),
                'avatar' => $github_user->getAvatar(),
                'github_id' => $github_user->getId(),
                'password' => Hash::make($github_user->getId()),
            ]);

            auth()->login($newUser, true);
        }

        return redirect()->route('post.index');
    }

    // Xử lý đăng nhập với Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $google_user = Socialite::driver('google')->user();
        $user = User::where("google_id", $google_user->id)->first();

        if ($user) {
            auth()->login($user, true);
        } else {
            $newUser = User::create([
                'name' => $google_user->getName(),
                'email' => $google_user->getEmail(),
                'avatar' => $google_user->getAvatar(),
                'google_id' => $google_user->getId(),
                'password' => Hash::make($google_user->getId()),
            ]);

            auth()->login($newUser, true);
        }

        return redirect()->route('post.index');
    }
}
