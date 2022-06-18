<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\News;
use Session;
use Ladumor\OneSignal\OneSignal;
class DashboardController extends Controller
{
    //
    public function dash(){
	        $totalpost = DB::table('news_list')->where('userid', Auth::id())->count();
	        $userdata = DB::table('users')->where('id', Auth::id())->first();
	        $profilepopup = $userdata->profilepopup;
	        $firstpostpopup = $userdata->firstpostpopup;
	        $skipdateof_profilepopup = $userdata->skipdateof_profilepopup;
	        $skipdateof_firstpostpopup = $userdata->skipdateof_firstpostpopup;
	        if($profilepopup == 0 && $skipdateof_profilepopup != ''){
	            $date = \Carbon\Carbon::parse($skipdateof_profilepopup);
                $now = \Carbon\Carbon::now();
                $diff = $date->diffInDays($now);
                if($diff > 5){
                    $array = array(
                        "profilepopup" => 1,
                        "skipdateof_profilepopup"=> ''
                    );
                    DB::table('users')->where('id',Auth::id())->update($array);
                }
	        }
	        if($firstpostpopup == 0 && $skipdateof_firstpostpopup != ''){
	            $date = \Carbon\Carbon::parse($skipdateof_firstpostpopup);
                $now = \Carbon\Carbon::now();
                $diff = $date->diffInDays($now);
                if($diff > 5){
                    $array = array(
                        "firstpostpopup" => 1,
                        "skipdateof_firstpostpopup"=> ''
                    );
                    DB::table('users')->where('id',Auth::id())->update($array);
                }
	        }
	        $totalpoint = 0;
	        $completeprofile = 0;
	        $user_value = $userdata->user_value;
	        $fb = $userdata->facebook;
	        $instagram = $userdata->instagram;
	        $linkedin = $userdata->linkedin;
	   //     $address = $userdata->address;
	        $bio = $userdata->bio;
	        $specialist = $userdata->specialist;
	        $ra = $userdata->registered_address;
	        $mcd = $userdata->marketing_contact_detail;
	        $pcd = $userdata->press_contact_detail;
	        $scd = $userdata->sales_contact_details;
	        $spn = $userdata->saleperson_name;
	        $wa = $userdata->website_address;
      
            if($fb != ''){
                $totalpoint += 1;
            }
            if($instagram != ''){
                $totalpoint += 1;
            }
            if($linkedin != ''){
                $totalpoint += 1;
            }
            // if($address != ''){
            //     $totalpoint += 1;
            // }
            if($bio != ''){
                $totalpoint += 1;
            }
            if($specialist != ''){
                $totalpoint += 1;
            }
            if($user_value == 'company'){
                if($ra != ''){
                    $totalpoint += 1;
                }
                if($mcd != ''){
                    $totalpoint += 1;
                }
                if($pcd != ''){
                    $totalpoint += 1;
                }
                if($scd != ''){
                    $totalpoint += 1;
                }
                if($spn != ''){
                    $totalpoint += 1;
                }
                if($wa != ''){
                    $totalpoint += 1;
                }                
            }
        if($user_value == 'company'){
            $completeprofile = round($totalpoint /11*100,1);
        }else{
            $completeprofile = round($totalpoint /5*100,1);
        }
        if(Auth::user()->user_type == 1){
             $pendinglist=DB::table("news_list")->where('approval',0)->get();
            $tuser = User::where('status',1)->where('id','!=',1)->count();    
            $tpost = News::count();    
            $tapost = News::where('approval',1)->count();    
            $trpost = News::where('approval',2)->count();    
            $tppost = News::where('approval',0)->count();    
            return view('dashboard.dashboard',compact('tuser','tpost','tapost','trpost','tppost','pendinglist','totalpost','completeprofile'));
        }elseif(Auth::user()->user_type == 2){
            $tpost = News::where('userid',Auth::user()->id)->count();    
             $pendinglist=DB::table("news_list")->where('approval',0)->where('userid',Auth::user()->id)->get();
            $tapost = News::where('approval',1)->where('userid',Auth::user()->id)->count();    
            $trpost = News::where('approval',2)->where('userid',Auth::user()->id)->count();    
            $tppost = News::where('approval',0)->where('userid',Auth::user()->id)->count();    
            $postlike = DB::table('likes')->where('userid',Auth::id())->count();   
            $postrating = DB::table('rating')->where('userid',Auth::id())->count();    
            $postcomment = DB::table('comments')->where('userid',Auth::id())->count();    
            return view('dashboard.dashboard',compact('tpost','tapost','trpost','tppost','pendinglist','totalpost','completeprofile','postlike','postrating','postcomment'));
        }else{
            
        }
        
    }
    public function settings(){
        $settingdata  = DB::table('settings')->first();
        return view('dashboard.settings',compact('settingdata'));
    }
    public function submitsettings(Request $request){
        $mode  = $request->mode;
        $arraydata = array(
            "mode" => $mode
        );
        $arrayuserdata = array(
            "dark_mode" => $mode
        );
        DB::table('settings')->where('id',1)->update($arraydata);
        DB::table('users')->where('id',Auth::id())->update($arrayuserdata);
        Session::flash('message','Settings Successfully Updated'); 
        Session::flash('type','success'); 
        return redirect('settings');  
    }
    public function myfollows(){
        $followlist  = DB::table('follower_list')->where('userid',Auth::user()->id)->get();
        return view('dashboard.myfollows',compact('followlist'));
    }
    public function myfollowers(){
        $followlist  = DB::table('follower_list')->where('publisherid',Auth::user()->id)->get();
        return view('dashboard.myfollower',compact('followlist'));
    }
    public function advertise(){
        return view('dashboard.advertise');
    }
    public function privacypolicy(){
        return view('dashboard.privacy-policy');
    }
    public function termsandconditions(){
        return view('dashboard.terms-conditions');
    }
    public function cookiepolicy(){
        return view('dashboard.cookie-policy');
    }
    public function contenttakedownpolicy(){
        return view('dashboard.content-takedown-policy');
    }
    public function refundpolicy(){
        return view('dashboard.refund-policy');
    }
    public function disclaimer(){
        return view('dashboard.disclaimer');
    }
    public function communityguidelines(){
        return view('dashboard.community-guidelines');
    }
    public function copyright(){
        return view('dashboard.copyright');
    }
    public function howwork(){
        return view('dashboard.how-work');
    }
    public function whatcanpublish(){
        return view('dashboard.what-can-publish');
    }
}
