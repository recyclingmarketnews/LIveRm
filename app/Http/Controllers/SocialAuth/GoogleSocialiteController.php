<?php
   
namespace App\Http\Controllers\SocialAuth;
   
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
   
class GoogleSocialiteController extends Controller
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
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();
      
            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/allactivepost');
      
            }else{
                $cdate = date('Y-m-d');
                $newUser = User::create([
                    'fname' => $user->name,
                    'lname' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'user_value'=> 'individual',
                    'social_type'=> 'google',
                    'user_type' => 2,
                    'start_date' => date('Y-m-d'),
                    'e_date' => date('Y-m-d', strtotime($cdate. ' + 14 days')),
                    'created_at' => date('Y-m-d H:i:s'),
                    'password' => encrypt('my-google')
                ]);
     
                Auth::login($newUser);
                return redirect('/allactivepost');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}