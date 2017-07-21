<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
    	//get the user
      $user = Socialite::driver($provider)->user();
      //store user info
      $authUser = User::firstOrNew(['provider_id' => $user_id]);
      $authUser->name = $user->name;
      $authUser->email = $user->email;
      $authUser->provider = $provider;
      $authUser->save();
      

      auth()->login($authUser);
      
      return redirect('/');
      
    }

}
