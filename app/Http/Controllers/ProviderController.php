<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProviderController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        try {
            $user = Socialite::driver($provider)->user();

            if (User::where('email', $user->getEmail())->where('auth_type', '!=', $provider)->exists()) {
                // return ;
                // dd(Redirect::to('/login')->withErrors(['email' => 'This email uses a different platform to login']));
                return Redirect::to('/login')->withErrors(['email' => 'This email uses a different platform to login']);
            }

            $providerUser = User::updateOrCreate([
                'provider_id' => $user->id,
                'auth_type' => $provider,
            ], [
                'name' => $user->name,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'provider_token' => $user->token,
                'auth_type' => $provider,
                'role' => 'student',
                'password' => Hash::make(Str::random(10)),
            ]);

            Auth::login($providerUser);

            // Redirect to the dashboard
            return Redirect::to('/');
        } catch (\Exception $e) {
            \Log::error('Exception during GitHub callback:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
