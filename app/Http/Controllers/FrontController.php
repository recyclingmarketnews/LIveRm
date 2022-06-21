<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use Session;
use Mail; 
use Hash;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon; 
use URL;
class FrontController extends Controller
{
        //
    public function autotrialemail(){
        $message = '';
        $date = date('Y-m-d');
        $userlist = DB::table('users')->where('id',61)->get();
        if(count($userlist) > 0){
            foreach($userlist as $key){
                $subscriptionid = $key->subscription_id;
                if($subscriptionid == 1){
                    if($key->trialendingemail == 0){
                        if($key->e_date < $date){
                            Mail::send('email.TrialEndingAfterEmail', ['username' => $key->fname], function($message) use($key){
                                    $message->to($key->email);
                                    $message->subject($key->fname.' Your trial has ended');
                            });                            
                            $array = array(
                                'trialendingemail' => 1
                            );    
                            DB::table('users')->where('id',$key->id)->update($array);
                        }
                    }             
                    if($key->trialendingsoonemail == 0){
                        $edate = $key->e_date;
                        $to = \Carbon\Carbon::parse($key->e_date);
                        $from = \Carbon\Carbon::parse($date);
                        $days = $to->diffInDays($from);   
                        if($days == 2){
                            Mail::send('email.TrialEndingSoonEmail', ['username' => $key->fname], function($message) use($key){
                                    $message->to($key->email);
                                    $message->subject($key->fname.' Your trial ends soon');
                            });                             
                            $array = array(
                                'trialendingsoonemail' => 1
                            );    
                            DB::table('users')->where('id',$key->id)->update($array);
                        }
                    }             
                }

            }
        }
    }        
    public function testinsert(){
        $array = array(
            "name" => "testdfd"
        );
        DB::table('testcron')->insert($array);
    }
    public function autopostemailtouser(){
        $dt=date('Y-m-d');
        $dt1 = strtotime($dt);
        $dt2 = date("l", $dt1);
        $dt3 = strtolower($dt2);
        if(($dt3 != "saturday" )|| ($dt3 != "sunday")){
            $message = '';
            $totalnews = DB::table('news_list')->whereDate('created_at', '=', Carbon::today()->toDateString())->count();

            $users = DB::table("users")->where('id','!=',1)->get();
            if(count($users) > 0){
                foreach($users as $key){
                    Mail::send('email.AutoPostSchedule', ['totalnews' => $totalnews], function($message) use($key){
                        $message->to($key->email);
                        $message->subject($totalnews.'+ News published in last 24 hours');
                    });               
                }
            }
        }
    }
    //
    public function testinvoice(){
        return view('email.offilineUserMessageToEmail');
    }
    public function index(){
        $list=News::where('approval',1)->orderBy('id','desc')->paginate(5);
        return view('home',compact('list'));
    }
    public function login(){
       
        return view('login');
    }
    public function site(){
        return view('site.home.sitemap');
    }
    public function signupselect(){
       
        return view('signupselect');
    }
    public function individualsignup(){
       $data = DB::table('subscriptions')->where('id',1)->get();
        return view('individualsignup',compact('data'));
    }
    public function companysignup(){
       $data = DB::table('subscriptions')->where('id',1)->get();
        return view('companysignup',compact('data'));
    }
    public function forgotpassword(){
        return view('forgotpass');
    }
    public function submitforgot(Request $request){
        $email = $request->email;
        $response = User::where('email',$email)->get();
        if(count($response)>0){
            $token = Str::random(64);
  
            DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                  $message->from('noreply@recyclingmarketnews.com');
                  $message->to($request->email);
                  $message->subject('We received a request to reset the password for your account');
            });
            Session::flash('message','We have e-mailed your password reset link! if not received please check in spam folder'); 
            Session::flash('type','success'); 
            return redirect('forgotpassword');          
        }else{
            $error = 'There is no account exist against this email '. $email;
            Session::flash('message',$error); 
            Session::flash('type','danger'); 
            return redirect('forgotpassword'); 
        }
    }
    public function submitcontact(Request $request) { 
        Mail::send('email.contactEmail', ['name' => $request->name,'phone' => $request->phone,'email' => $request->email,'subject' => $request->subject,'massage' => $request->massage], function($message) use($request){
              $message->from('noreply@recyclingmarketnews.com');
              $message->to('info@recyclingmarketnews.com');
              $message->subject('Contact Us Enquiry');
        });
        Mail::send('email.contactEmailforClient', ['name' => $request->name], function($message) use($request){
              $message->from('info@recyclingmarketnews.com');
              $message->to($request->email);
              $message->subject('Thank you for contacting us');
        });
        Session::flash('message','Thanks for contact with us'); 
        Session::flash('type','success'); 
        return redirect('contact'); 
    }
    public function showResetPasswordForm($token) { 
         return view('forgetPasswordLink', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request)
    {
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('message', 'Invalid token!');
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
            Mail::send('email.passwordResetSuccess', ['token' => $request->token], function($message) use($request){
                  $message->from('noreply@recyclingmarketnews.com');
                  $message->to($request->email);
                  $message->subject('Password Reset Successful');
            });          
            Session::flash('message','Your password has been changed!'); 
            Session::flash('type','success'); 
            return redirect('login');    
    }
    public function about(){
        return view('about');
    }
    public function term(){
        return view('term');
    }
    public function pricing(){
        return view('pricing');
    }
    public function contact(){
        return view('contact');
    }
   
}
