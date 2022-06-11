<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use Hash;
use Mail; 
use DB;
use URL;
class AuthController extends Controller
{
    public function submit_frontlogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->user_type == 1){
                return redirect()->intended('dash')->withSuccess('Logged-in');
            }else{
                $tdate = date('Y-m-d');
                if(Auth::user()->e_date < $tdate){
                    return redirect()->intended('stripe');
                }else{
                    if(Auth::user()->userlogin_device == 0){
             
                        return redirect()->intended('allactivepost')->withSuccess('Logged-in');
                    }else{
                        Auth::logout();
                        Session::flash('message','Sorry you can only login at one device at a time. Thanks'); 
                        Session::flash('type','danger'); 
                        return redirect('/');
                    }
                    
                }                
                
            }
            
        }
        else{
            Session::flash('message','Invalid Login Details'); 
            Session::flash('type','danger'); 
            return redirect('/');
        }
    }
    public function submit_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->user_type == 1){
                return redirect()->intended('dash')->withSuccess('Logged-in');
            }else{
                $tdate = date('Y-m-d');
                if(Auth::user()->e_date < $tdate){
                    return redirect()->intended('stripe');
                }else{
                    if(Auth::user()->userlogin_device == 0){
              
                        return redirect()->intended('allactivepost')->withSuccess('Logged-in');
                    }else{
                        Auth::logout();
                        Session::flash('message','Sorry you can only login at one device at a time. Thanks'); 
                        Session::flash('type','danger'); 
                        return redirect('/login');
                    }
                }                
                
            }
            
        }
        else{
            Session::flash('message','Invalid Login Details'); 
            Session::flash('type','danger'); 
            return redirect('login');
        }
    }
    public function submit_forgot(Request $request){
        $request->validate([
            'email' => 'required'
        ]);
        $data = User::where('email',$request->email)->first();

        if ($data) {
            return "ok";
        }
        else{
            return 'error';
        }
    }
    public function submit_registerind(Request $request){
        $SixDigitRandomNumber = rand(100000,999999);
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 2;
        $user->user_value = 'individual';
        $user->start_date = date('Y-m-d');
        $cdate = date('Y-m-d');
        $user->e_date = date('Y-m-d', strtotime($cdate. ' + 14 days'));
        $user->user_type = 2;
        $user->country = $request->country;
        $user->email_code = $SixDigitRandomNumber;
        $user->created_at = date('Y-m-d H:i:s');
        $userexist = DB::table('users')->where('email',$request->email)->first();
        
        if($userexist){
                Session::flash('message','Account already exist against this email'); 
                Session::flash('type','danger'); 
                return redirect('individualsignup');            
        }else{
            $user->save();
            $insertedId = $user->id;
            $array = array(
                "userid" => $insertedId,
                "currency" => 'GBP',
                "created_at" => date('Y-m-d H:i:s')
            );
            DB::table('watch_list')->insert($array);
            if ($insertedId) {
                // Mail::send('email.VerifyEmail', ['name' => $request->fname,'code'=>$SixDigitRandomNumber], function($message) use($request){
                //       $message->to($request->email);
                //       $message->subject('Email Verification Code');
                // });            
                $name = $request->fname;
                $code = $SixDigitRandomNumber;
            
                $url = "https://api.sendinblue.com/v3/smtp/email";
                
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                
                $headers = array(
                   "accept: application/json",
                   "api-key: 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",
                   "content-type: application/json",
                );
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                $link = "<a href=".URL::to('/linkemailverify/'.$request->email.'/'.$SixDigitRandomNumber)." target='_blank'>Verify Now</a>";
                $data = '
                {  
                   "sender":{  
                      "name":"Recycling Market News",
                      "email":"info@recyclingmarketnews.com"
                   },
                   "to":[  
                      {  
                         "email":"'.$request->email.'",
                         "name":"'.$request->fname.'"
                      }
                   ],
                   "subject":"Email Verification Code",
                   "htmlContent":"<html><head></head><body><p>Hi '.$request->fname.',</p> <p>Your email verification code is; </p> <h2>'.$SixDigitRandomNumber.'</h2> <p>You can also verify your account using below link; </p> '.$link.' <p>To keep your account secure, we recommend using a unique password.</p> <p>Thanks,</p>Recycling Market News Team .</p></body></html>"
                }';
                
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                
                //for debug only!
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                
                $resp = curl_exec($curl);
                curl_close($curl);
                var_dump($resp);
                Session::flash('message','Please check your email for verification code on '.$request->email); 
                Session::flash('type','success'); 
                $email = $request->email;
                $code = $SixDigitRandomNumber;
                return view('emailverify',compact('email','code'));
            }
            else{
                return 'error';
            }           
        }
        

    }
    public function submit_registercompany(Request $request){
        $SixDigitRandomNumber = rand(100000,999999);
        $user = new User();
        $user->fname = $request->fname;
        $user->registered_address = $request->register_address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 2;
        $user->user_value = 'company';
        $user->start_date = date('Y-m-d');
        $cdate = date('Y-m-d');
        $user->e_date = date('Y-m-d', strtotime($cdate. ' + 14 days'));
        $user->user_type = 2;
        $user->country = $request->country;
        $user->email_code = $SixDigitRandomNumber;
        $user->created_at = date('Y-m-d H:i:s');
        $userexist = DB::table('users')->where('email',$request->email)->first();
        
        if($userexist){
                Session::flash('message','Account already exist against this email'); 
                Session::flash('type','danger'); 
                return redirect('companysignup');            
        }else{
            $user->save();
            $insertedId = $user->id;
            $array = array(
                "userid" => $insertedId,
                "currency" => 'GBP',
                "created_at" => date('Y-m-d H:i:s')
            );
            DB::table('watch_list')->insert($array);
            if ($insertedId) {
                // Mail::send('email.VerifyEmail', ['name' => $request->fname,'code'=>$SixDigitRandomNumber], function($message) use($request){
                //       $message->to($request->email);
                //       $message->subject('Email Verification Code');
                // });            
                $name = $request->fname;
                $code = $SixDigitRandomNumber;
            
            $url = "https://api.sendinblue.com/v3/smtp/email";
            
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $headers = array(
               "accept: application/json",
               "api-key: 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",
               "content-type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $link = "<a href=".URL::to('/linkemailverify/'.$request->email.'/'.$SixDigitRandomNumber)." target='_blank'>Verify Now</a>";
            $data = '
            {  
               "sender":{  
                  "name":"Recycling Market News",
                  "email":"info@recyclingmarketnews.com"
               },
               "to":[  
                  {  
                     "email":"'.$request->email.'",
                     "name":"'.$request->fname.'"
                  }
               ],
               "subject":"Email Verification Code",
               "htmlContent":"<html><head></head><body><p>Hi '.$request->fname.',</p> <p>Your email verification code is; </p> <h2>'.$SixDigitRandomNumber.'</h2> <p>You can also verify your account using below link; </p> '.$link.' <p>To keep your account secure, we recommend using a unique password.</p> <p>Thanks,</p>Recycling Market News Team .</p></body></html>"
            }';
            
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            
            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $resp = curl_exec($curl);
            curl_close($curl);
            var_dump($resp);                
                Session::flash('message','Please check your email for verification code on '.$request->email); 
                Session::flash('type','success'); 
                $email = $request->email;
                $code = $SixDigitRandomNumber;
                return view('emailverify',compact('email','code'));
            }
            else{
                return 'error';
            }           
        }
        

    }

    public function submitemailverify(Request $request)
    {
      $array = array(
        "email_verify" => 1,
        "email_code" => "",
      );
      DB::table('users')->where('email',$request->email)->update($array);
      $userdata = DB::table('users')->where('email',$request->email)->first();
      $arrayinsert = array(
        "userid" => $userdata->id,
        "publisherid" => 1,
        "created_at" => date('Y-m-d H:i:s'),
      );
      DB::table('follower_list')->insert($arrayinsert);       
        Mail::send('email.registrationEmail', ['name' => $userdata->fname], function($message) use($request){
              $message->to($request->email);
              $message->subject('Welcome to Recycling Market News!');
        });       
    Session::flash('message','Registration successful'); 
    Session::flash('type','success'); 
      return redirect("login");
    }
    public function linkemailverify($email,$code)
    {
        $array = array(
            "email_verify" => 1,
            "email_code" => "",
        );
        $check = DB::table('users')->where('email',$email)->where('email_code',$code)->where('email_verify',0)->get();
        if(count($check) > 0){
            DB::table('users')->where('email',$email)->update($array);
            $userdata = DB::table('users')->where('email',$email)->first();
            $arrayinsert = array(
                "userid" => $userdata->id,
                "publisherid" => 1,
                "created_at" => date('Y-m-d H:i:s'),
            );
            DB::table('follower_list')->insert($arrayinsert);       
            Mail::send('email.registrationEmail', ['name' => $userdata->fname], function($message) use($userdata){
                $message->to($userdata->email);
                $message->subject('Welcome to Recycling Market News!');
            });       
            Session::flash('message','Registration successful'); 
            Session::flash('type','success'); 
            return redirect("login");
        }else{
            Session::flash('message','Oops! verification link is not valid'); 
            Session::flash('type','danger');     
            return redirect("login");            
        }

    }

    public function emailverficationpage($id)
    {
        $userdata = DB::table('users')->where('id',$id)->first();
        $email = $userdata->email;
        $code = $userdata->email_code;
        return view('emailverify',compact('email','code'));
    }
    public function resendemailverify($email)
    {
        $userdata = DB::table('users')->where('email',$email)->first();
        $email = $userdata->email;
        $code = $userdata->email_code;
        Mail::send('email.VerifyEmail', ['name' => $userdata->fname,'code'=>$code], function($message) use($userdata){
              $message->to($userdata->email);
              $message->subject('Email Verification Code');
        });    
        Session::flash('message','we have send again verification email code on your registered email'); 
        Session::flash('type','success'); 
        return redirect(route('emailverficationpage',[$userdata->id]));
    }
    public function logout()
    {
        $userss = auth()->user();
        $user = User::where(['id'=>$userss->id])->first();
        $user->userlogin_device = 0;
        $user->save();
        Auth::logout();
        return redirect("");
    }
}
