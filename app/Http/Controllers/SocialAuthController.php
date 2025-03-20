<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // Ανακατεύθυνση στη Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback από Google
  public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        // Έλεγχος αν υπάρχει ήδη χρήστης με αυτό το email
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Δημιουργία νέου χρήστη αν δεν υπάρχει
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
               'password' => bcrypt(Str::random(16)),
            ]);
        }

        // Login ο χρήστης
        Auth::login($user);

        return redirect('/');
    } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

}
