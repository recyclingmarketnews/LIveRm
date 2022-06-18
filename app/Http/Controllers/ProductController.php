<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Like;
use App\Models\News;
use App\Models\NewsFilter;
use App\Models\FindRecycler;
use Session;
use Mail;
use DB;
use URL;
use Carbon;
use Ladumor\OneSignal\OneSignal;
class ProductController extends Controller
{
    //
    public function viewCategory(){
        return view('dashboard.product.addCategory');
    }
    public function addpost(){
        $category=Product::all();
        $country = DB::table('country')->get();
        return view('dashboard.posts.add',compact('category','country'));
    }
    public function saveplayerid(Request $req){
        $ar = array(
            "web_player_id" => $req->player_id
        );
        DB::table('users')->where('id',Auth::id())->update($ar);
        return "Saved";
    }
    public function editpost($id){
        $category=Product::all();
        $admin =0;
        $postdata = DB::table('news_list')->where('id',$id)->first();
        $country = DB::table('country')->get();
        return view('dashboard.posts.edit',compact('category','country','postdata','admin'));
    }
    public function editpostadmin($id){
        $category=Product::all();
        $postdata = DB::table('news_list')->where('id',$id)->first();
        $admin =1;
        $country = DB::table('country')->get();
        return view('dashboard.posts.edit',compact('category','country','postdata','admin'));
    }
    public function managepost(Request $request){
             $activetab = 'pending';
        if($request->tab == 'approve'){
            $activetab = 'approve';
        }elseif($request->tab == 'rejected' ){
            $activetab = 'rejected';
        }else{
            $activetab = 'pending';
        }
        $id = Auth::user()->id;
        if($id == 1){
            $pendinglist=DB::table("news_list")->where('approval',0)->get();
            $approvelist=DB::table("news_list")->where('approval',1)->get();
            $rejectlist=DB::table("news_list")->where('approval',2)->get();
        }else{
            $pendinglist=DB::table("news_list")->where('approval',0)->where('userid',$id)->get();
            $approvelist=DB::table("news_list")->where('approval',1)->where('userid',$id)->get();
            $rejectlist=DB::table("news_list")->where('approval',2)->where('userid',$id)->get();
        }
        
        return view('dashboard.posts.manage',compact('pendinglist','approvelist','rejectlist','activetab'));
    }
    public function publisherpost(){
        $list=DB::table("news_list")->where('approval',0)->get();
        return view('dashboard.posts.manageforapproval',compact('list'));
    }
    public function manageCategory(){
        $category=Product::all();
        return view('dashboard.product.manageCategory',compact('category'));
    }
    public function rejectsubmit(Request $request){
        $postdata = DB::table('news_list')->where('id',$request->rejid)->first();
         $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
         $usersdata = DB::table('users')->where('id',$postdata->userid)->first();
        $updatearray = array(
            "approval" => 2,
            "reason" => $request->reason
        );
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Oops! Your Post rejected.Please check rejection reason and submit again.",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti); 
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Oops! Your Post rejected.Please check rejection reason and submit again.';
        OneSignal::sendPush($fields, $message);
        $res = DB::table('news_list')->where('id',$request->rejid)->update($updatearray);
                Mail::send('email.postRejection', ['rejectionreason' => $postdata->reason, 'heading' => $postdata->heading ], function($message) use($usersdata){
                      $message->to($usersdata->email);
                      $message->subject('Oops! Your post is rejected!');
                });         
        if($res){
            Session::flash('message','Post Rejected Successfully'); 
            Session::flash('type','success'); 
        }else{
            Session::flash('message','Something Went Wrong!'); 
            Session::flash('type','danger'); 
        }
        return redirect('publisherpost');
    }
    
    public function InsertCategory(request $request){
        $Category = Product::where('name',$request->cat_name)->first();
        
       if($Category!=""){
          Session::flash('message','Category Already Exist '); 
            Session::flash('type','danger'); 
            
       }else{
       
            $prodCat = new Product;
            $prodCat->name = $request->cat_name;
            $prodCat->save();
            Session::flash('message','Product Category Added Successfully'); 
            Session::flash('type','success'); 
       }
        return redirect('manageCategory');
    }
    
    public function DeleteCategory(request $request,$id){
          if(Product::where('id',$id)->delete()){
            return "success";
          }else{
            return "error";
          }
          die;
    }
    public function postapprove($id){
        $postdata = DB::table('news_list')->where('id',$id)->first();
        $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
        $usersdata = DB::table('users')->where('id',$postdata->userid)->first();
        $updatearray = array(
            "approval" => 1,
            "created_at" => date('Y-m-d H:i:s')
        );
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Congratulations! Your post is approved! ",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti); 
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Congratulations! Your post is approved! ';
        OneSignal::sendPush($fields, $message);
        $res = DB::table('news_list')->where('id',$id)->update($updatearray);
          if($res){
            Mail::send('email.postPublished', ['heading' => $postdata->heading], function($message) use($usersdata){
                  $message->to($usersdata->email);
                  $message->subject('Congratulations! Your post is now Live!');
            }); 
            $userlist = DB::table('follower_list')->where('publisherid',$postdata->userid)->get();
            if(count($userlist)>0){
                foreach($userlist as $key){
                    $userid = $key->userid;
                    
                    $userdata = DB::table('users')->where('id',$userid)->first();
                        Mail::send('email.postEmail', ['name' => $userdata->fname, 'heading' => $postdata->heading,'namee' => $posterdata->fname,'postid'=> $postdata->id], function($message) use($userdata){
                              $message->to($userdata->email);
                              $message->subject('Latest News Published');
                        }); 
                }
            }
            return "success";
          }else{
            return "error";
          }
          die;
    }
    
    public function UpdateCategoryForm(request $request,$id){
        $category=Product::where('id',$id)->first();
        return view('dashboard.product.updateCategory',compact('category'));
    }
    public function updateCategory(request $request){
            $category= Product::find($request->cat_id);
            $category->name = $request->cat_name;
            $category->save();
            if($category){
            Session::flash('message','Category Updated Succesfully!'); 
            Session::flash('type','success'); 
            }
          
          return redirect('manageCategory');
            
    }
    public function categorypricing(){
            $userid = Auth::user()->id;
            $accessstring = '';
            $result = DB::table('user_access')->where('userid',$userid)->get();
            if(count($result)>0){
            foreach($result as $key){
                $accessstring .= $key->product_category_id.',';
            }
                $accessstring = rtrim($accessstring,',');
            }
            if($accessstring != ''){
                $category = DB::select("select pc.*, MAX(pt.date) as date, pt.price from product_category as pc 
                                    left join pricing_table as pt on pc.id = pt.category_id AND pt.userid = '$userid'
                                    where pc.id in ($accessstring)
                                    group by pc.id 
                                    order by pc.id, pt.date asc");  
                return view('dashboard.product.categorypricing',compact('category'));
            }else{
                $category = array();  
                return view('dashboard.product.categorypricing',compact('category'));                
            }

        
            
    }
    public function categorypricingadmin(){
        $userid = Auth::user()->id;
         $category = DB::select("select pc.*, MAX(pt.date) as date, pt.price from product_category as pc 
                                left join pricing_table as pt on pc.id = pt.category_id AND pt.userid = '$userid'
                                group by pc.id 
                                order by pc.id, pt.date asc");
      //  $category= Product::select('product_category.*', 'pricing_table.date','pricing_table.price')->leftJoin('pricing_table', 'pricing_table.category_id', '=', 'product_category.id')->where('pricing_table.userid',Auth::user()->id)
      //  ->groupby('product_category.name')->orderBy('pricing_table.date', 'desc')->get();
        return view('dashboard.product.categorypricingadmin',compact('category'));
            
    }
    public function priceupdate(Request $req){
        $userid = Auth::user()->id;
        $data = array(
                    "userid" => $userid,
                    "category_id" => $req->catid,
                    "date" => date('Y-m-d'),
                    "price" => $req->price,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                );
        DB::table('pricing_table')->insert($data);
                    Session::flash('message','Price Updated Successfully'); 
            Session::flash('type','success'); 
              if($userid == 1){
          return redirect('categorypricingadmin');
      }else{
         return redirect('categorypricing');
      }
       
    }
    public function findprice(){
        $category= Product::get();
        $id = '';
        $result = '';
        return view('dashboard.product.findprice',compact('category','result','id'));
            
    }
   public function findpricesearch($id){
        $category= Product::get();
        $id = $id;
        $date = date('Y-m-d');
        $result = DB::select("SELECT product_category.name,avg(pricing_table.price) as price, max(pricing_table.price) as maxprice,min(pricing_table.price) as minprice,pricing_table.date FROM `pricing_table`
                                    left join product_category on product_category.id = pricing_table.category_id
                                    WHERE pricing_table.date = '$date' and product_category.id = '$id'
                                    group by product_category.name");       
        return view('dashboard.product.findprice',compact('category','result','id'));
    }  
    public function submitpost(Request $request){
        $usersdata = DB::table('users')->where('id',Auth::user()->id)->first();
        $news = new News;
        $news->userid = Auth::user()->id;
        $news->heading = $request->heading;
        if($request->has('image_ref_link')){
            $news->image_ref_link = $request->image_ref_link;
        }
        if($request->has('other_site_link')){
            $news->other_site_link = $request->other_site_link;
        }
        $news->category_id = $request->category_id;
        $news->link = $request->link;
        if($request->has('videolink')){
            $vlink = $request->videolink;
            $final = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","www.youtube.com/embed/$1",$vlink);
            $news->videolink = $final;
        }
        
        if($request->country != ''){
            $news->country = $request->country;
        }else{
            $news->country = Auth::user()->country;
        }        
        if($request->has('creditpost')){
            $news->credit = 1;
        }
        $news->description = $request->description;
        if(Auth::user()->id == 1){
            $news->approval = 1;
        }
        $news->created_at = date('Y-m-d H:i:s');
        if ($files = $request->file('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image = $imagePath;
        unset($this->file);
        }
        if ($files = $request->file('image1')) {
            $request->validate(['image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image1 = $imagePath;
        unset($this->file);
        }
        if ($files = $request->file('image2')) {
            $request->validate(['image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image2 = $imagePath;
        unset($this->file);
        }
        $res = $news->save();
        $insertedId = $news->id;
        if(Auth::user()->id == 1 && $request->has('sendemail')){
            $posterdata = DB::table('users')->where('id',1)->first();
            $userlist = DB::table('follower_list')->where('publisherid',1)->get();
            if(count($userlist)>0){
                foreach($userlist as $key){
                    $userid = $key->userid;
                    
                    $userdata = DB::table('users')->where('id',$userid)->first();
                        Mail::send('email.postEmail', ['name' => $userdata->fname, 'heading' => $request->heading,'namee' => $posterdata->fname,'postid'=> $insertedId], function($message) use($userdata){
                              $message->to($userdata->email);
                              $message->subject('Latest News Published');
                        }); 
                }
            } 
        }
        if(Auth::user()->id != 1){
            Mail::send('email.postUnderReview', ['heading' => $request->heading,'username' => Auth::user()->fname], function($message) use($usersdata){
                  $message->to($usersdata->email);
                  $message->subject('Your Post is under review');
            });         
           
            Mail::send('email.forapprovaltoadmin', ['heading' => $request->heading], function($message) use($usersdata){
                  $message->to('farhan@globalrecyclingmarket.com');
                  //info@recyclingmarketnews.com
                  $message->subject(Auth::user()->fname.' Post News for approval');
            });        
        }
        Session::flash('message','Your Post Successfully Submit And Waiting For Approval From Admin'); 
        Session::flash('type','success'); 
        return redirect('managepost');        
    } 
    public function submiteditpost(Request $request){
        
        $news= News::find($request->postid);
        $news->userid = Auth::user()->id;
        $news->heading = $request->heading;
        $news->category_id = $request->category_id;
        $news->link = $request->link;
        $news->description = $request->description;
        if($request->country != ''){
            $news->country = $request->country;
        }else{
            $news->country = Auth::user()->country;
        }         
        $news->approval = 0;
        $news->created_at = date('Y-m-d H:i:s');
        if ($files = $request->file('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image = $imagePath;
        unset($this->file);
        }
        if ($files = $request->file('image1')) {
            $request->validate(['image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image1 = $imagePath;
        unset($this->file);
        }
        if ($files = $request->file('image2')) {
            $request->validate(['image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image2 = $imagePath;
        unset($this->file);
        }        
        $news->save();
        Session::flash('message','Your Post Successfully Re-Submit And Waiting For Approval From Admin'); 
        Session::flash('type','success'); 
        return redirect('managepost');        
    } 
    public function adminsubmiteditpost(Request $request){
        $news= News::find($request->postid);
        $news->userid = Auth::user()->id;
        $news->heading = $request->heading;
        $news->category_id = $request->category_id;
        $news->link = $request->link;
        $news->description = $request->description;
        $news->created_at = date('Y-m-d H:i:s');
        if ($files = $request->file('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image = $imagePath;
        unset($this->file);
        }
        if ($files = $request->file('image1')) {
            $request->validate(['image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image1 = $imagePath;
        unset($this->file);
        }
        if ($files = $request->file('image2')) {
            $request->validate(['image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/post/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $news->image2 = $imagePath;
        unset($this->file);
        }        
        $news->save();
        Session::flash('message','Post Successfully Edited'); 
        Session::flash('type','success'); 
        return redirect('managepost');        
    } 
    public function allactivepost(Request $request){
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
            $startdate = date('Y-m-d', strtotime(' -1 day'));
   
            $enddate = date('Y-m-d');
            // set API Endpoint and API key
            $endpoint = 'latest';
            $access_key = '5223f56ba4de1d3361d4e277be0bd306';
            
            // Initialize CURL:
            $ch = curl_init('https://api.exchangeratesapi.io/v1/timeseries?access_key='.$access_key.'&base=USD&start_date='.$startdate.'&end_date='.$enddate);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);
            
            // Decode JSON response:
            $exchangeRates = json_decode($json, true);
          
            $exchangeRatesstart= $exchangeRates['rates'][$startdate];
            $exchangeRatesend= $exchangeRates['rates'][$enddate];
        //  For watch list
            $curlist = '';
            $curdata = DB::table('watch_list')->where('userid',Auth::id())->get();
            if(count($curdata) > 0 ){
                foreach($curdata as $key){
                    $curlist .= $key->currency.',';
                }
                $curlist = rtrim($curlist,",");
            }
            // Initialize CURL:
            $ch = curl_init('https://api.exchangeratesapi.io/v1/timeseries?access_key='.$access_key.'&base=USD&symbols='.$curlist.'&start_date='.$startdate.'&end_date='.$enddate);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);
            
            // Decode JSON response:
            $exchangeRateswatch = json_decode($json, true);
          
            $exchangeRateswatchstart= $exchangeRateswatch['rates'][$startdate];
            $exchangeRateswatchend= $exchangeRateswatch['rates'][$enddate];            
         ///FOr OIL
        // set API Endpoint and API key 
        // $endpoint = 'latest';
        // $access_keyy = '3u8xrcims9any5xc8f2ccehsmgc1gxm317syx2y4apk8gh41y237exupj2cp';
        
        // // Initialize CURL:
        // $ch1 = curl_init('https://www.commodities-api.com/api/'.$endpoint.'?access_key='.$access_keyy.'&base=barrel&symbols=RICE%2CWHEAT%2CSUGAR%2CCORN%2CWTIOIL%2CBRENTOIL%2CSOYBEAN%2CCOFFEE%2CXAU%2CXAG%2CXPD%2CXPT%2CXRH%2CRUBBER%2CETHANOL%2CCPO%2CNG');
        // curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        
        // // Store the data:
        // $json1 = curl_exec($ch1);
        // curl_close($ch1);
        
        // // Decode JSON response:
        // $exchangeRatesOil = json_decode($json1, true);
        // $exchangeRatesOil = $exchangeRatesOil['data']['rates']; 
   
        
        
        $country = 'all';
        $category = 'all';
        $rating = 'all';
        $followstirng = '';
        $followsarray= array();
        $list=DB::table("news_list")->where('approval',1)->orderBy('id','desc')->paginate(24);
         $cats=Product::all();
        $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
        if(count($publisherfollowlist) > 0){
        foreach($publisherfollowlist as $key){
            $followstirng .= $key->publisherid.',';
        }
            $followstirng = rtrim($followstirng,',');
            $followsarray = explode(',', $followstirng);
            
        }
        $defaultview = DB::table("users")->where('id',Auth::id())->first();
        $defaultview = $defaultview->postview;
        return view('dashboard.posts.viewallpost',compact('list','defaultview',"followsarray",'cats','category','country','rating','exchangeRatesstart','exchangeRatesend','exchangeRateswatchstart','exchangeRateswatchend','curlist','totalpost','completeprofile'));
    } 
    public function searchnewsbyinput(Request $request){
        if($request->ajax())
        {
            $followstirng = '';
            $followsarray= array();
            $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
            if(count($publisherfollowlist) > 0){
            foreach($publisherfollowlist as $key){
                $followstirng .= $key->publisherid.',';
            }
                $followstirng = rtrim($followstirng,',');
                $followsarray = explode(',', $followstirng);
                
            }            
            $output="";
            $list=DB::table("news_list")->where('approval',1)->orderBy('id','desc')->where('heading','LIKE','%'.$request->search."%")->get();
            
            if($list)
            {
                
                $settingdata  = DB::table('settings')->first();
                $mode = $settingdata->mode;
                $color ='#fff';
                $followdecision= '';
                if($mode == "light"){ $color="#464545"; }else{ $color="#fff"; }
                foreach ($list as $key) {
                $totalrating = DB::table('rating')->where('postid',$key->id)->count();
                $userdata = DB::table('users')->where('id',$key->userid)->first();
                if(in_array($userdata->id, $followsarray)){
                 $followdecision = '<a href="'.URL::to('unfollow/'.$userdata->id).'"><span class="badge badge-soft-success font-size-14" >Unfollow</span></a>';
                }else{
                 $followdecision = '<a href="'.URL::to('savefollow/'.$userdata->id).'"><span class="badge badge-soft-success font-size-14" >Add Follow</span></a>';
                }   
                $pid = $key->id; $rating = DB::select("SELECT AVG(value) as value FROM rating WHERE postid='$pid'");
                $totallike = DB::table('likes')->where('postid',$key->id)->count();
                $totalcomment = DB::table('comments')->where('postid',$key->id)->count();
                $cid = $key->category_id; $catdata = DB::table('product_category')->where('id',$cid)->first(); 
                if(Auth::user()->postview == 'list'){
                $output.='<div class="card me-2 p-3 results" style="width:100%; margin-top:10px;    padding-bottom: 5px !important;">
                                <div class="row">
                          
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           
                                            <div class="d-flex  align-items-center">
                                                    <span style="margin-right:12px;">
                                                    <a href="'.URL::to('viewprofile/'.$userdata->id).'"><img src="'.asset('uploads/userimg/'.$userdata->image).'" class="imagefff img-fluid" /></a>
                                                    </span>
                                               <div class="textwrapp"><a  style="color:'.$color.';font-size: 15px;font-weight: bold;" href="'.URL::to('singlenews/'.$key->id).'" class="mb-1">'.$key->heading.'</a> 
                                            </div>
        
                                            </div>
                                            <div class="modal fade" id="modaldemo{{ $key->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">'.$key->heading.'</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 mb-3">
                                                        <img width="100%" height="60px" alt="avatar" class="img-fluid" src="'.asset('uploads/post/'.$key->image).'">
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        '.$userdata->fname.' '.$userdata->lname.'
                                                        
                                                        '.$followdecision.'
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <p>'.$key->description.'</p>
                                                    </div>
                                                    <div class="col-lg-12 mb-3" >
                                                        <a style="position: absolute;right: 18px;bottom: 9px;" target="_blank" href="'.$key->link.'"><strong style="color: #1abe7f;">Read More</strong></a>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>                                            
                                            </div>                                            
                                            
                                            <div class="d-flex flex-row" style="    margin-top: 0.75rem!important; font-size:10px"> 
                        
                                                <span class="stars" data-rating="'.$rating[0]->value.'" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="'.$rating[0]->value.' out of 5"></span> ('. $totalrating .')
                                                <div class="d-flex align-items-center" style="margin-left:10px;">
                                                     <span class="days-ago font-size-10">'.Carbon\Carbon::parse($key->created_at)->diffForHumans().'</span>
                                                                                   
                                               <a href="#"><span class="badge badge-soft-success font-size-10" style="margin-left: 10px;" >'.$totallike.' Like</span></a>
                                               
                                               <span class="hideaddnews">
                                               <a href="#"><span class="badge badge-soft-primary  font-size-10" style="margin-left: 10px;" >'.$totalcomment .' <i class="fa fa-comment-o" aria-hidden="true"></i></span></a>
                                               <a href="#"><span class="badge badge-soft-primary  font-size-10" style="margin-left: 10px;" >'.$catdata->name.'</span></a>
                                               <a href="#"><span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" >'.$userdata->country.'</span></a>
                                                </span>
                                                </div>
                                            </div>
                               
                                        </div>
                                    </div>
                                    <div class="col-lg-12 filterm" style="padding-left: 0;">
                                    <a href="#"><span class="badge badge-soft-primary  font-size-10" >'.$catdata->name.'</span></a>
                                    <a href="#"><span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" >'.$userdata->country.'</span></a>
                                    </div>
                                </div>
                            </div>';
                }else{
                     $cid = $key->category_id; $catdata = DB::table('product_category')->where('id',$cid)->first(); 
                     $likevariable = Helper::UserHasLikePost($key->id) ? 'like-post' : 'notlike-post';
                     $output.='<div class="col-xl-4 col-lg-4 col-s-12 col-xs-12 mb-2" style="padding-right:0px;">
                      <figure><a href="'.URL::to('singlenews/'.$key->id).'"><img src="'.asset('uploads/post/'.$key->image).'"></a></figure>
                      <a style="position: absolute;bottom: 5px;font-size: 18px;color: white;padding: 0 10px;background: rgb(0 0 0 / 50%);font-weight: bold;letter-spacing: 0.5px;" href="'.URL::to('singlenews/'.$key->id).'">'. $key->heading .'</a>
                      <div style="position: absolute;    top: 0;">
                          <a href="#"><span class="badge badge-soft-warning  font-size-10" style="background: #fc931d;color: #fff;margin-left: 10px;" >'.$key->country.'</span></a>
                          <a href="#"><span class="badge badge-soft-primary  font-size-10" style="background: #2daae1;color: #fff;" >'.$catdata->name.'</span></a>                                
                      </div>
                      <div style="position: absolute;top:3px;right: 8px; padding: 8px;" data-id="'.$key->id.'">
                              <i id="like{{$key->id}}" class="fa fa-thumbs-up font-size-22 '.$likevariable.'"></i>
                      </div>
                    </div>';                   
                }
                }
            return Response($output);
           }
         }
    } 
    public function allactivepostt(Request $request){
            $startdate = date('Y-m-d', strtotime(' -1 day'));
   
            $enddate = date('Y-m-d');
            // set API Endpoint and API key
            $endpoint = 'latest';
            $access_key = '5223f56ba4de1d3361d4e277be0bd306';
            
            // Initialize CURL:
            $ch = curl_init('https://api.exchangeratesapi.io/v1/timeseries?access_key='.$access_key.'&base=USD&start_date='.$startdate.'&end_date='.$enddate);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);
            
            // Decode JSON response:
            $exchangeRates = json_decode($json, true);
          
            $exchangeRatesstart= $exchangeRates['rates'][$startdate];
            $exchangeRatesend= $exchangeRates['rates'][$enddate];        
            
        //  For watch list
            $curlist = '';
            $curdata = DB::table('watch_list')->where('userid',Auth::id())->get();
            if(count($curdata) > 0 ){
                foreach($curdata as $key){
                    $curlist .= $key->currency.',';
                }
                $curlist = rtrim($curlist,",");
            }
            // Initialize CURL:
            $ch = curl_init('https://api.exchangeratesapi.io/v1/timeseries?access_key='.$access_key.'&base=USD&symbols='.$curlist.'&start_date='.$startdate.'&end_date='.$enddate);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);
            
            // Decode JSON response:
            $exchangeRateswatch = json_decode($json, true);
          
            $exchangeRateswatchstart= $exchangeRateswatch['rates'][$startdate];
            $exchangeRateswatchend= $exchangeRateswatch['rates'][$enddate];            
         ///FOr OIL
        // set API Endpoint and API key 
        // $endpoint = 'latest';
        // $access_keyy = '3u8xrcims9any5xc8f2ccehsmgc1gxm317syx2y4apk8gh41y237exupj2cp';
        
        // // Initialize CURL:
        // $ch1 = curl_init('https://www.commodities-api.com/api/'.$endpoint.'?access_key='.$access_keyy.'&base=barrel&symbols=RICE%2CWHEAT%2CSUGAR%2CCORN%2CWTIOIL%2CBRENTOIL%2CSOYBEAN%2CCOFFEE%2CXAU%2CXAG%2CXPD%2CXPT%2CXRH%2CRUBBER%2CETHANOL%2CCPO%2CNG');
        // curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        
        // // Store the data:
        // $json1 = curl_exec($ch1);
        // curl_close($ch1);
        
        // // Decode JSON response:
        // $exchangeRatesOil = json_decode($json1, true);
        // $exchangeRatesOil = $exchangeRatesOil['data']['rates'];               
        $country = 'all';
        $category = 'all';
        $rating = 'all';
        $followstirng = '';
        $followsarray= array();
        $list = NewsFilter::query();
        if($request->has('category') && $request->category != 'all'){
            $list->where('category_id',$request->category);
            $category = $request->category;
        }
        if($request->has('country') && $request->country != 'all'){
            $list->where('country',$request->country);
            $country = $request->country;
        }
        if($request->has('rating') && $request->rating != 'all'){
            $list->where('rating','>=',$request->rating);
            $rating = $request->rating;
        }
         $list =$list->orderBy('id','desc')->paginate(24);
         $cats=Product::all();
        $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
        if(count($publisherfollowlist) > 0){
        foreach($publisherfollowlist as $key){
            $followstirng .= $key->publisherid.',';
        }
            $followstirng = rtrim($followstirng,',');
            $followsarray = explode(',', $followstirng);
            
        }
        $defaultview = DB::table("users")->where('id',Auth::id())->first();
        $defaultview = $defaultview->postview;
        return view('dashboard.posts.viewallpost',compact('list','defaultview',"followsarray",'cats','category','country','rating','exchangeRatesstart','exchangeRatesend','exchangeRateswatchstart','exchangeRateswatchend','curlist'));
    } 
    public function allactiveposttt($id){
            $startdate = date('Y-m-d', strtotime(' -1 day'));
   
            $enddate = date('Y-m-d');
            // set API Endpoint and API key
            $endpoint = 'latest';
            $access_key = '5223f56ba4de1d3361d4e277be0bd306';
            
            // Initialize CURL:
            $ch = curl_init('https://api.exchangeratesapi.io/v1/timeseries?access_key='.$access_key.'&base=USD&start_date='.$startdate.'&end_date='.$enddate);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);
            
            // Decode JSON response:
            $exchangeRates = json_decode($json, true);
          
            $exchangeRatesstart= $exchangeRates['rates'][$startdate];
            $exchangeRatesend= $exchangeRates['rates'][$enddate];   
        //  For watch list
            $curlist = '';
            $curdata = DB::table('watch_list')->where('userid',Auth::id())->get();
            if(count($curdata) > 0 ){
                foreach($curdata as $key){
                    $curlist .= $key->currency.',';
                }
                $curlist = rtrim($curlist,",");
            }
            // Initialize CURL:
            $ch = curl_init('https://api.exchangeratesapi.io/v1/timeseries?access_key='.$access_key.'&base=USD&symbols='.$curlist.'&start_date='.$startdate.'&end_date='.$enddate);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);
            
            // Decode JSON response:
            $exchangeRateswatch = json_decode($json, true);
          
            $exchangeRateswatchstart= $exchangeRateswatch['rates'][$startdate];
            $exchangeRateswatchend= $exchangeRateswatch['rates'][$enddate];            
         ///FOr OIL
        // set API Endpoint and API key 
        // $endpoint = 'latest';
        // $access_keyy = '3u8xrcims9any5xc8f2ccehsmgc1gxm317syx2y4apk8gh41y237exupj2cp';
        
        // // Initialize CURL:
        // $ch1 = curl_init('https://www.commodities-api.com/api/'.$endpoint.'?access_key='.$access_keyy.'&base=barrel&symbols=RICE%2CWHEAT%2CSUGAR%2CCORN%2CWTIOIL%2CBRENTOIL%2CSOYBEAN%2CCOFFEE%2CXAU%2CXAG%2CXPD%2CXPT%2CXRH%2CRUBBER%2CETHANOL%2CCPO%2CNG');
        // curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        
        // // Store the data:
        // $json1 = curl_exec($ch1);
        // curl_close($ch1);
        
        // // Decode JSON response:
        // $exchangeRatesOil = json_decode($json1, true);
        // $exchangeRatesOil = $exchangeRatesOil['data']['rates'];               
            
        $country = 'all';
        $category = 'all';
        $rating = 'all';
        $followstirng = '';
        $followsarray= array();
        $list=News::where('approval',1)->orderBy('id','desc')->paginate(24);
        if($id && $id != 'all'){
            $list=News::where('approval',1)->where('category_id',$id)->orderBy('id','desc')->paginate(24);
            $category = $id;
        }
        
         $cats=Product::all();
        $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
        if(count($publisherfollowlist) > 0){
        foreach($publisherfollowlist as $key){
            $followstirng .= $key->publisherid.',';
        }
            $followstirng = rtrim($followstirng,',');
            $followsarray = explode(',', $followstirng);
            
        }
        $defaultview = DB::table("users")->where('id',Auth::id())->first();
        $defaultview = $defaultview->postview;
        return view('dashboard.posts.viewallpost',compact('list','defaultview',"followsarray",'cats','category','country','rating','exchangeRatesstart','exchangeRatesend','exchangeRateswatchstart','exchangeRateswatchend','curlist'));
    } 
    public function singlenews($id){
        $followstirng = '';
        $followsarray= array();
                $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
        if(count($publisherfollowlist) > 0){
        foreach($publisherfollowlist as $key){
            $followstirng .= $key->publisherid.',';
        }
            $followstirng = rtrim($followstirng,',');
            $followsarray = explode(',', $followstirng);
            
        }
        $rating = 0;
        $like = 0;
         $newsdetails=DB::table("news_list")->where('id',$id)->where('approval',1)->first();
         //
         $catid = $newsdetails->category_id;
         $relatedlist = DB::table('news_list')->where('category_id',$catid)->where('approval',1)->orderBy('id','desc')->limit('5')->get();
         $totalcomment = DB::table('comments')->where('postid',$id)->count();
         $comments = DB::table('comments')->where('postid',$id)->orderBy('id','desc')->get();
         $res = DB::table('rating')->where('userid',Auth::user()->id)->where('postid',$id)->first();
         $currating = DB::table('rating')->where('postid',$id)->get();
        
         if($res){
             $rating = $res->value;
         }else{
             $rating = 0;
         }
         $res1 = DB::table('likes')->where('userid',Auth::user()->id)->where('postid',$id)->first();
         if($res1){
             $like = 1;
         }else{
             $like = 0;
         }
         $totallike = DB::table('likes')->where('userid',Auth::user()->id)->where('postid',$id)->count();
         $nextnews = DB::table('news_list')->where('id','>',$id)->where('approval',1)->min('id');
         $prenews = DB::table('news_list')->where('id','<',$id)->where('approval',1)->max('id');
         return view('dashboard.posts.singlenews',compact('newsdetails','followsarray','totalcomment','comments','rating','like','totallike','relatedlist','currating','nextnews','prenews'));
    }
    public function sharesinglenews($slug){

        $rating = 0;
        $like = 0;
        $slug = str_replace("-", " ", $slug);
    
         $newsdetails=DB::table("news_list")->where('heading',$slug)->where('approval',1)->first();
     
         $totalcomment = DB::table('comments')->where('postid',$newsdetails->id)->count();
         $comments = DB::table('comments')->where('postid',$newsdetails->id)->get();

         return view('dashboard.posts.sharesinglenews',compact('newsdetails','totalcomment','comments'));
    }
    public function addcomment(Request $request){
        $postdata = DB::table('news_list')->where('id',$request->postid)->first();
         $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
        $array = array(
                    "userid" => Auth::user()->id,
                    "postid" => $request->postid,
                    "comment" => $request->comment,
                    "created_at" => date('Y-m-d H:i:s')
                );
        $res = DB::table('comments')->insert($array);
        
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Comment on your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti); 
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Comment on your post';
        OneSignal::sendPush($fields, $message);
        Session::flash('message','Your Comment Successfully Submitted.'); 
        Session::flash('type','success');  
        return redirect()->back();
    }
    public function deletepost(request $request,$id){
          if(News::where('id',$id)->delete()){
            return "success";
          }else{
            return "error";
          }
          die;
    }
    public function deletecomment($id){
          if(DB::table('comments')->where('id',$id)->delete()){
                Session::flash('message','Your Comment Successfully Deleted.'); 
                Session::flash('type','success');  
                return redirect()->back();
          }else{
                Session::flash('message','Someting Went Wrong!'); 
                Session::flash('type','danger');  
                return redirect()->back();
          }
          die;
    }
    public function reportcomment($id){
                $commentdata = DB::table('comments')->where('id',$id)->first();
                $commenterdata = DB::table('users')->where('id',$commentdata->userid)->first();
                $postdata = DB::table('news_list')->where('id',$commentdata->postid)->first();
                Mail::send('email.commentReport', ['comment' => $commentdata->comment, 'reportname' => Auth::user()->fname,'commentername'=> $commenterdata->fname, 'heading' => $postdata->heading], function($message) use($commentdata){
                      $message->to('fanidhillu9@gmail.com');
                      $message->subject('Bad Comment Report!');
                });      
           
                Session::flash('message','Comment Report Successfully Send To Admin!'); 
                Session::flash('type','success');  
                return redirect()->back();
    }
    public function savefollow($id){
            $userid = Auth::user()->id;
             $posterdata = DB::table('users')->where('id',$id)->first();
            $array = array(
                "userid" =>  $userid,
                "publisherid" =>  $id,
                "created_at" => date('Y-m-d H:i:s')
            );
            $noti = array(
                "postid" =>  9999999999,
                "userid" =>  $id,
                "fromuserid" => $userid,
                "message" => "Following you",
                "created_at" => date('Y-m-d H:i:s')
            );     
             DB::table('notifications')->insert($noti);   
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Some one follow you';
        OneSignal::sendPush($fields, $message);
            $res = DB::table('follower_list')->insert($array);
            Session::flash('message','You Successfully Followed.'); 
            Session::flash('type','success');  
            return redirect()->back();
    }
    public function unfollow($id){
            $userid = Auth::user()->id;
             $posterdata = DB::table('users')->where('id',$id)->first();
            $noti = array(
                "postid" =>  9999999999,
                "userid" =>  $id,
                "fromuserid" => $userid,
                "message" => "Unfollow you",
                "created_at" => date('Y-m-d H:i:s')
            );     
             DB::table('notifications')->insert($noti); 
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Unfollow you';
        OneSignal::sendPush($fields, $message);
            $res = DB::table('follower_list')->where('userid',$userid)->where('publisherid',$id)->delete();
            Session::flash('message','You Successfully UnFollowed.'); 
            Session::flash('type','success');  
            return redirect()->back();
    }
    public function postStar (Request $request, $post) {
        Rating::where('userid',Auth::id())->where('postid',$post)->delete();
        $postdata = News::where('id',$post)->first();
         $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
        $rating = new Rating;
        $rating->userid = Auth::id();
        $rating->postuserid = $postdata->userid;
        $rating->postid = $post;
        $rating->value = $request->input('star');
        $rating->save();
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Gave ratings to your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti);   
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Gave ratings to your post!';
        OneSignal::sendPush($fields, $message);
        Session::flash('message','Rating Successfully Submitted.'); 
        Session::flash('type','success'); 
        return redirect()->back();
    }
    public function addlike($id){
        $postdata = DB::table('news_list')->where('id',$id)->first();
         $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
        $like = new Like;
        $like->userid = Auth::id();
        $like->postid = $id;
        $like->save();
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Liked your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti);
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Liked your post';
        $res = OneSignal::sendPush($fields, $message);
        // print_r($res);
        // die;
        Session::flash('message','You have successfully like post.'); 
        Session::flash('type','success'); 
        return redirect()->back();        
    }
    public function addlikebyajax($id){
        $postdata = DB::table('news_list')->where('id',$id)->first();
         $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
        $like = new Like;
        $like->userid = Auth::id();
        $like->postid = $id;
        $like->save();
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Liked your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti);
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Liked your post';
        $res = OneSignal::sendPush($fields, $message);
        // print_r($res);
        // die;
        return "like";    
    }
    public function unlike($id){
         $postdata = DB::table('news_list')->where('id',$id)->first();
         $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
        Like::where('userid',Auth::id())->where('postid',$id)->delete();
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Unliked your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti);   
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Unliked your post!';
        OneSignal::sendPush($fields, $message);        
        Session::flash('message','You have successfully unlike post.'); 
        Session::flash('type','success'); 
        return redirect()->back();        
    }
    public function unlikebyajax($id){
         $postdata = DB::table('news_list')->where('id',$id)->first();
         $posterdata = DB::table('users')->where('id',$postdata->userid)->first();
        Like::where('userid',Auth::id())->where('postid',$id)->delete();
        $noti = array(
            "postid" =>  $postdata->id,
            "userid" =>  $postdata->userid,
            "fromuserid" => Auth::id() ,
            "message" => "Unliked your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti);   
        $fields['include_player_ids'] = [$posterdata->web_player_id];
        $message = 'Unliked your post!';
        OneSignal::sendPush($fields, $message);        
        return "unlike";       
    }
    public function markallasread(){
        $array = array( 'read'=>1);
        DB::table('notifications')->where('userid',Auth::id())->update($array);
        return redirect()->back();        
    }
    public function markasread($id){
        $array = array( 'read'=>1);
        DB::table('notifications')->where('userid',Auth::id())->where('id',$id)->update($array);
        return redirect()->back();        
    }
    public function userlist(){
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
        $country = 'all';
        $specialist = 'all';
        $rating = 'all';
        $followstirng = '';
        $followsarray= array();
        $userlist  = DB::table('users')->where('id','!=',1)->where('status',1)->get();
        $specialists = DB::select("SELECT * FROM product_category");
        $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
        if(count($publisherfollowlist) > 0){
        foreach($publisherfollowlist as $key){
            $followstirng .= $key->publisherid.',';
        }
            $followstirng = rtrim($followstirng,',');
            $followsarray = explode(',', $followstirng);
            
        }        
        return view('dashboard.userlist',compact('userlist','country','specialist','rating','specialists','followsarray','completeprofile','totalpost'));
    }
    public function userlistt(Request $request){
   
        $country = 'all';
        $specialist = 'all';
        $rating = 'all';
        $followstirng = '';
        $followsarray= array();
       // $userlist  = DB::table('users')->where('id','!=',1)->where('status',1)->get();
   

        $userlist = FindRecycler::query();
        if($request->has('specialist') && $request->specialist != 'all'){
            $userlist->whereJsonContains('specialist',$request->specialist);
            $specialist = $request->specialist;
        }
        if($request->has('country') && $request->country != 'all'){
            $userlist->where('country',$request->country);
            $country = $request->country;
        }
        if($request->has('rating') && $request->rating != 'all'){
            $userlist->where('rating','>=',$request->rating);
            $rating = $request->rating;
        } 
        $userlist =$userlist->get();
        $specialists = DB::select("SELECT * FROM product_category");
        $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
        if(count($publisherfollowlist) > 0){
        foreach($publisherfollowlist as $key){
            $followstirng .= $key->publisherid.',';
        }
            $followstirng = rtrim($followstirng,',');
            $followsarray = explode(',', $followstirng);
            
        }        
        return view('dashboard.userlist',compact('userlist','country','specialist','rating','specialists','followsarray'));
    }
    public function addtowatchlist($id){
        $array = array(
            "userid" => Auth::id(),
            "currency" => $id,
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('watch_list')->insert($array);
         return redirect()->back();   
    }
    public function addtowatchlistremove($id){
        DB::table('watch_list')->where('userid',Auth::id())->where('currency',$id)->delete();
         return redirect()->back();   
    }
}
