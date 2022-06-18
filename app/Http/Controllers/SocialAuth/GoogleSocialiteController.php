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
         return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $userss = Socialite::driver('google')->stateless()->user();
      
            $finduser = User::where('social_id', $userss->id)->first();
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/allactivepost');
      
            }else{
                $user = new User();
                $user->fname = $userss->name;
                $user->email = $userss->email;
                $user->password = encrypt('my-google');
                $user->user_type = 2;
                $user->user_value = 'individual';
                $user->start_date = date('Y-m-d');
                $cdate = date('Y-m-d');
                $user->e_date = date('Y-m-d', strtotime($cdate. ' + 14 days'));
                $user->user_type = 2;
                $user->email_verify = 1;
                $user->created_at = date('Y-m-d H:i:s');
                $user->social_id = $userss->id;
                $user->social_type = 'google';
                $user->save();
       

     
                Auth::login($user);
                return redirect('/allactivepost');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleCallbackfacebook()
    {
        try {
    
            $userss = Socialite::driver('facebook')->user();
     
            $finduser = User::where('social_id', $userss->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
     
                return redirect('/allactivepost');
     
            }else{
                $user = new User();
                $user->fname = $userss->name;
                $user->email = $userss->email;
                $user->password = encrypt('my-facebook');
                $user->user_type = 2;
                $user->user_value = 'individual';
                $user->start_date = date('Y-m-d');
                $cdate = date('Y-m-d');
                $user->e_date = date('Y-m-d', strtotime($cdate. ' + 14 days'));
                $user->user_type = 2;
                $user->email_verify = 1;
                $user->created_at = date('Y-m-d H:i:s');
                $user->social_id = $userss->id;
                $user->social_type = 'facebook';
                $user->save();
       

     
                Auth::login($user);
                return redirect('/allactivepost');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }  
    public function redirectToApple()
    {
        return Socialite::driver('apple')->redirect();
    }  
}