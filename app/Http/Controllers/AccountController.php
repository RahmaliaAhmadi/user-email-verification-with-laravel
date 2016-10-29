<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class AccountController extends Controller
{
   protected $request;

    public function __construct(Request $request)
    {
    	$this->request = $request;
    }

    public function verification($access_code, User $user)
    {
    	$auth_user = User::findOrFail($user->id);
    	if (empty($auth_user))
    	{
    		// if the link given is not for a registered user.
    		return redirect('/login');
    	}
        if (!$auth_user->verified) {
    	if ($auth_user->access_code == $access_code)
    	{
    		$auth_user->verified = true;
    		$auth_user->save();
    		// return view(authenticated_user) or redirect to log in page
                        return redirect('/login')->with('status', 'Your account is successfully verified!');
    	} // if the access code from the user's link is valid
    	else if ($auth_user->access_code != $access_code) // if the access code of the user link is invalid
    	{
    		$new_access_code = User::generateAccessCode();
    		$auth_user->access_code = $new_access_code;
    		$auth_user->save();

    		Mail::to($user->email)->send(new UserVerificationMailer($user)); // send new confirmation link
    		// return view(auth fail generate new code)
                         return redirect('/login')->with('status', 'Something went wrong with your verification link. Please check your new verification message.'); // configure this to your own styling & ways.
    	}
        } // the user is still not verified
        else
        {
            return redirect('/login')->with('status','Your account has already been verified.');
        }

    }
}
