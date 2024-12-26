<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class SocialiteController extends Controller
{
    /**
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProvideCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // return redirect()->back();
            Log::error('Error during Google login: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Login gagal, coba lagi nanti.');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth()->login($authUser, true);

        return redirect()->route('home');
    }

    /**
     * @param $socialUser
     * @return mixed
     */
    public function findOrCreateUser($socialUser)
    {
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', 'google')
            ->first();

        if ($socialAccount) {

            return $socialAccount->user;
        } else {

            $user = User::where('email', $socialUser->getEmail())->first();

            if (! $user) {
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt('12345678')
                ]);
                $user->assignRole('pelanggan');
            }

            $user->socialAccounts()->create([
                'provider_id'   => $socialUser->getId(),
                'provider_name' => 'google'
            ]);

            return $user;
        }
    }
}
