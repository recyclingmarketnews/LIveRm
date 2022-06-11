<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\Like;
use App\Models\Rating;
use App\Models\Education;
use App\Models\Works;
use App\Models\NewsFilterApp;
use App\Models\FindRecycler;
use Session;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Mail; 
use Hash;
use DB;
use URL;
class ApiController extends Controller
{
    public $successStatus = 200;
    public function submit_login(Request $request){
        $data = DB::table('users')->where('email',$request->email)->first();
        if ($data && Hash::check($request->password, $data->password)) {
            return response()->json(['success' => $data], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }
    public function submit_register(Request $request){
         $SixDigitRandomNumber = rand(100000,999999);
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
         $user->password = Hash::make($request->password);
        $user->user_type = 2;
        $user->user_value = $request->userValue;
        
        $user->start_date = date('Y-m-d');
        $cdate = date('Y-m-d');
        $user->e_date = date('Y-m-d', strtotime($cdate. ' + 14 days'));
        $user->email_code = $SixDigitRandomNumber;
        $user->country = $request->country;
        $user->created_at = date('Y-m-d H:i:s');

        $userexist = DB::table('users')->where('email',$request->email)->first();
        if($userexist){
                return response()->json(['error'=>'Account already exist against this email'], 402); 
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
                    Mail::send('email.VerifyEmail', ['name' => $request->fname,'code'=>$SixDigitRandomNumber], function($message) use($request){
                          $message->to($request->email);
                          $message->subject('Email Verification Code');
                    });            
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
                    return response()->json(['success' => "successfull register"], $this-> successStatus); 
                }else{
                     return response()->json(['error'=>'Unauthorised'], 401); 
                }        
        }        

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
                  $message->to($request->email);
                  $message->subject('Reset Password');
            });
            return response()->json(['success' => "'We have e-mailed your password reset link!"], $this-> successStatus); 
        }else{
            return response()->json(['error'=>'There is no account exist against this email'], 402);
        }
    }    
    public function getCategories(){
        $data = DB::table('product_category')->get();
        if ($data) {
            return response()->json(['success' => $data], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }
    }
    public function getallNews(){
        \DB::statement("SET SQL_MODE=''");
        $data = DB::select("SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
left outer join rating on rating.postid = news_list.id
WHERE news_list.approval=1
GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }              
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }
    }
    public function filterpost(Request $request){
        $category = 'all';
        $country = 'all';
        $rating = 'all';
        $data = NewsFilterApp::query();
        if($request->has('category') && $request->category != 'all'){
            $data->where('category_id',$request->category);
            $category = $request->category;
        }
        if($request->has('country') && $request->country != 'all'){
            $data->where('country',$request->country);
            $country = $request->country;
        }
        if($request->has('rating') && $request->rating != 'all'){
            $data->where('rating','>=',$request->rating);
            $rating = $request->rating;
        }
        $data =$data->get();        
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "country" => $row->country,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $row->totallikesnew,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }              
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }
    }     
    public function getallapprovedpostbyuser($id){
        \DB::statement("SET SQL_MODE=''");
        $data = DB::select("SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
left outer join rating on rating.postid = news_list.id
WHERE news_list.approval=1 and news_list.userid='$id'
GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }              
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
             return response()->json(['error'=>'No Record Found'], 402);  
        }
    }
    public function getpostbycat($id){
     \DB::statement("SET SQL_MODE=''");
        $data = DB::select("
SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
left outer join rating on rating.postid = news_list.id
WHERE news_list.approval=1 and category_id='$id'
GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }            
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }
    }
    public function getpostbyid($id){
     \DB::statement("SET SQL_MODE=''");
        $data = DB::select("
                            SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
                            left outer join rating on rating.postid = news_list.id
                            WHERE news_list.approval=1 and news_list.id='$id'
                            GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }
    }
    public function getallrejectedpost(){
     \DB::statement("SET SQL_MODE=''");
        $data = DB::select("
                            SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
                            left outer join rating on rating.postid = news_list.id
                            WHERE news_list.approval=2
                            GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'No Record Found'], 401); 
        }
    }
    public function getallrejectedpostbyuser($id){
     \DB::statement("SET SQL_MODE=''");
        $data = DB::select("
                            SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
                            left outer join rating on rating.postid = news_list.id
                            WHERE news_list.approval=2 and news_list.userid='$id'
                            GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'No Record Found'], 402); 
        }
    }
    public function getallpendingpost(){
     \DB::statement("SET SQL_MODE=''");
        $data = DB::select("
                            SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
                            
                            left outer join rating on rating.postid = news_list.id
                            WHERE news_list.approval=0
                            GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'No Record Found'], 402); 
        }
    }
    public function getallpendingpostbyuser($id){
     \DB::statement("SET SQL_MODE=''");
        $data = DB::select("
                            SELECT news_list.*, ifnull(round(AVG(rating.value),1),0) as rating, count(rating.id) as ratingcounter FROM `news_list`
                            left outer join rating on rating.postid = news_list.id
                            WHERE news_list.approval=0 and news_list.userid='$id'
                            GROUP BY news_list.id");
        if ($data) {
            $newlist = array();
            foreach($data as $row){
                $totallikes  = DB::table('likes')->where('postid',$row->id)->count();
                $imageslist = array(
                    "image" => $row->image,
                    "image1" => $row->image1,
                    "image2" => $row->image2,
                );
                $newarray = array(
                    "id" => $row->id,
                    "userid" => $row->userid,
                    "heading" => $row->heading,
                    "description" => $row->description,
                    "country" => $row->country,
                    "images" => $imageslist,
                    "link" => $row->link,
                    "category_id" => $row->category_id,
                    "approval" => $row->approval,
                    "reason" => $row->reason,
                    "created_at" => $row->created_at,
                    "updated_at" => $row->updated_at,
                    "totallikes" => $totallikes,
                    "rating" => $row->rating,
                    "ratingcounter" => $row->ratingcounter,
                );
                
                array_push($newlist,$newarray);
            }
            return response()->json(['success' => $newlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'No Record Found'], 402); 
        }
    }
    public function getProfile($id){
        $data = DB::select("SELECT *, (select count(userid) from follower_list WHERE userid='$id') as totalfollowers, (SELECT ifnull(round(avg(ifnull(rating.value,0)),1),0) as ratingval FROM news_list
                                                    join rating on rating.postid = news_list.id
                                                    WHERE news_list.userid ='$id') as totalrating,(SELECT count(rating.id) as ratingcounter FROM news_list
                                                    join rating on rating.postid = news_list.id
                                                    WHERE news_list.userid ='$id') as ratingcounter FROM users WHERE id = '$id'");
        if ($data) {
            return response()->json(['success' => $data], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }
    }
    public function updateProfile(Request $req){
        $userid = $req->userid;
        $user = User::where(['id'=>$userid])->first();
        if($user->user_value == 'company'){
            if ($req->has('marketing_contact_detail')) {
                $user->marketing_contact_detail = $req->marketing_contact_detail;
            }
            if ($req->has('press_contact_detail')) {
                $user->press_contact_detail = $req->press_contact_detail;
            }
            if ($req->has('sales_contact_details')) {
                $user->sales_contact_details = $req->sales_contact_details;
            }
            if ($req->has('saleperson_name')) {
                $user->saleperson_name = $req->saleperson_name;
            }
            if ($req->has('website_address')) {
                $user->website_address	 = $req->website_address;
            }
        }        
        if ($req->has('fname')) {
            $user->fname = $req->fname;
        }
        if ($req->has('lname')) {
            $user->lname = $req->lname;
        }
        if ($req->has('registered_address')) {
            $user->registered_address = $req->registered_address;
        }
        if ($req->has('address')) {
        $user->address = $req->address;
        }
        if ($req->has('bio')) {
            $user->bio = $req->bio;
        }
       // $user->email = $req->email;
        if ($files = $req->file('image')) {
            $req->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/userimg/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $user->image = $imagePath;
        unset($this->file);
        }
        
        $res = $user->save();
        if ($res) {
            return response()->json(['success' => "Profile Updated Successfully"], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }        
    }

    public function likepost(Request $request){
        $playerids =[];
        $postdata = DB::table('news_list')->where('id',$request->postid)->first();
        $userdata = DB::table('users')->where('id',$postdata->userid)->first();
        array_push($playerids,$userdata->player_id);
        $like = new Like;
        $like->userid = $request->userid;
        $like->postid = $request->postid;
        $res = $like->save();
        $title = "Post News Like";
        $message = "Someone Like your post";
 
        $this->onesignal($title,$message,$playerids);
        $person = [];
        $likeperson = DB::table('users')->where('id',$request->userid)->first();
        array_push($person,$likeperson->player_id);
        $title = "Post News Like";
        $message = "You Successfully Like post";
        $this->onesignal($title,$message,$person);
        if ($res) {
            return response()->json(['success' => "You have successfully like post"], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }         
    }
    public function unlikepost(Request $request){
        $playerids =[];
        $postdata = DB::table('news_list')->where('id',$request->postid)->first();
        $userdata = DB::table('users')->where('id',$postdata->userid)->first();
        array_push($playerids,$userdata->player_id);        
        $res = Like::where('userid',$request->userid)->where('postid',$request->postid)->delete();
        $title = "Post News Like";
        $message = "Someone Like your post";
        $this->onesignal($title,$message,$playerids);
        $person = [];
        $likeperson = DB::table('users')->where('id',$request->userid)->first();
        array_push($person,$likeperson->player_id);
        $title = "Post News Unlike";
        $message = "You Successfully unlike post";
        $this->onesignal($title,$message,$person);
        if ($res) {
            return response()->json(['success' => "You have successfully unlike post."], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }     
    }   
    public function getfollowers(Request $request){
        $userid = $request->userid;
        $res = DB::select("SELECT users.*,follower_list.publisherid FROM `follower_list` 
join users on users.id = follower_list.publisherid
where follower_list.userid ='$userid'");
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }     
    }   
    public function addpost(Request $request){
        $news = new News;
    
        $news->userid = $request->userid;
        $news->heading = $request->heading;
        $news->category_id = $request->category_id;
        $news->link = $request->link;
        $news->description = $request->description;
        $news->created_at = date('Y-m-d H:i:s');
        if ($files = $request->file('image0')) {
            $request->validate(['image0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
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
        if ($res) {
            return response()->json(['success' => 'Your Post Successfully Submit And Waiting For Approval From Admin'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }         
    } 
    public function resubmitpost(Request $request){
        $news= News::find($request->postid);
        $news->userid = $request->userid;
        $news->heading = $request->heading;
        $news->category_id = $request->category_id;
        $news->link = $request->link;
        $news->description = $request->description;
        $news->approval = 0;
        if ($files = $request->file('image0')) {
            $request->validate(['image0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
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
        if ($res) {
            return response()->json(['success' => 'Your Post Successfully Re-Submit And Waiting For Approval From Admin'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }         
    } 
    public function relatedpost(Request $request){
        $postid = $request->postid;
         $data = DB::table('news_list')->where('approval',1)->where('id',$postid)->first();
        $catid = $data->category_id;
             \DB::statement("SET SQL_MODE=''");
        $res = DB::select("SELECT news_list.*, count(likes.postid) as totallikes, ifnull(round(AVG(rating.value),1),0) as rating FROM `news_list`
left outer JOIN likes on likes.postid = news_list.id
left outer join rating on rating.postid = news_list.id
WHERE news_list.approval=1 and category_id='$catid'
GROUP BY news_list.id");
        
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }     
    }     
    public function getmylikeditems($id){
             \DB::statement("SET SQL_MODE=''");
        $res = DB::select("SELECT * FROM `news_list`
join likes on likes.postid = news_list.id and likes.userid ='$id'");
        
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }     
    }     
    public function getfollowing($id){
             \DB::statement("SET SQL_MODE=''");
        $res = DB::select("SELECT * FROM `users` join follower_list on follower_list.publisherid = users.id and follower_list.userid ='$id'");
        
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }     
    }     
    public function getdashboardcounter($id){
             \DB::statement("SET SQL_MODE=''");
        $res = DB::select("SELECT count(id) as totalpost, 
(SELECT count(id) as totalpost FROM `news_list` WHERE userid ='$id' and approval=1) as totalapprove,
(SELECT count(id) as totalpost FROM `news_list` WHERE userid ='$id' and approval=0) as totalpendig,
(SELECT count(id) as totalpost FROM `news_list` WHERE userid ='$id' and approval=2) as totalrejected
FROM `news_list` WHERE userid ='$id'");
        
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 401); 
        }     
    } 
    
    public function followuser(Request $req){
            $array = array(
                "userid" =>  $req->fromuser,
                "publisherid" =>  $req->touser,
                "created_at" => date('Y-m-d H:i:s')
            );
            $noti = array(
                "userid" =>  $req->touser,
                "fromuserid" => $req->fromuser,
                "message" => "Follow you",
                "created_at" => date('Y-m-d H:i:s')
            );     
             DB::table('notifications')->insert($noti);        
            $res = DB::table('follower_list')->insert($array);
            if ($res) {
                return response()->json(['success' => 'successfully follow'], $this-> successStatus); 
            } 
            else{ 
                return response()->json(['error'=>'error'], 401); 
            }   
    }
    public function unfollowuser(Request $req){
            $noti = array(
                "userid" =>  $req->touser,
                "fromuserid" => $req->fromuser,
                "message" => "unfollow you",
                "created_at" => date('Y-m-d H:i:s')
            );     
             DB::table('notifications')->insert($noti);             
            $res = DB::table('follower_list')->where('userid',$req->fromuser)->where('publisherid',$req->touser)->delete();
            if ($res) {
                return response()->json(['success' => 'successfully unfollow'], $this-> successStatus); 
            } 
            else{ 
                return response()->json(['error'=>'error'], 401); 
            }   
    }    
    public function postStar(Request $request) {
        Rating::where('userid',$request->userid)->where('postid',$request->postid)->delete();
        $postdata = News::where('id',$request->postid)->first();
        $rating = new Rating;
        $rating->userid = $request->userid;
        $rating->postuserid = $postdata->userid;
        $rating->postid = $request->postid;
        $rating->value = $request->star;
        $rating->save();
        
        $res = $rating->id;
        $noti = array(
            "userid" =>  $postdata->userid,
            "fromuserid" => $request->userid,
            "message" => "Rating on your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti);        
        if ($res) {
            return response()->json(['success' => 'Rating Successfully Submitted.'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function addcomment(Request $request){
        $playerids = [];
        $postdata = DB::table('news_list')->where('id',$request->postid)->first();
        $userdata = DB::table('users')->where('id',$postdata->userid)->first();
        array_push($playerids,$userdata->player_id);
        $title = "Comment";
        $message = "Someone Comment On your post";
 
        $this->onesignal($title,$message,$playerids);
        $commenter = [];
        $commentuserdata = DB::table('users')->where('id',$request->userid)->first();
        array_push($commenter,$commentuserdata->player_id);
        $title = "Comment";
        $message = "Your Comment Successfully Submit";
 
        $this->onesignal($title,$message,$commenter);
        $array = array(
                    "userid" => $request->userid,
                    "postid" => $request->postid,
                    "comment" => $request->comment,
                    "created_at" => date('Y-m-d H:i:s')
                );
        $res = DB::table('comments')->insert($array);
        $noti = array(
            "userid" =>  $postdata->userid,
            "fromuserid" =>$request->userid,
            "message" => "Comment on your post",
            "created_at" => date('Y-m-d H:i:s')
        );
        DB::table('notifications')->insert($noti);        
        if ($res) {
            return response()->json(['success' => 'Your Comment Successfully Submitted.'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function getcomment($postid){
        $res = DB::table('comments')->where('postid',$postid)->get();
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function getnoti($userid){
        $res = DB::table('notifications')->where('userid',$userid)->get();
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function geteducation($userid){
        $res = DB::table('education')->where('userid',$userid)->get();
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function getworkhistory($userid){
        $res = DB::table('workhistory')->where('userid',$userid)->get();
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function addeducation(Request $request){
        $edu = new Education;
        $edu->userid = $request->userid;
        $edu->school = $request->school;
        $edu->fieldofstudy = $request->fieldofstudy;
        $edu->degree = $request->degree;
        $edu->start = $request->start;
        $edu->end = $request->end;
        $edu->created_at = date('Y-m-d H:i:s');
        $res = $edu->save();
        if ($res) {
            return response()->json(['success' => 'New Education Record Successfully Saved'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }         
    }
    public function addworkhistory(Request $request){
        $work = new Works;
        $work->userid = $request->userid;
        $work->company = $request->company;
        $work->desognation = $request->designation;
        $work->responsibility = $request->responsibility;
        $work->industory = $request->industory;
        $work->start = $request->start;
        $work->end = $request->end;
        $work->currently = $request->currently;
        $work->created_at = date('Y-m-d H:i:s');
        $res = $work->save();
        if ($res) {
            return response()->json(['success' => 'New Work Record Successfully Saved'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }              
    }   
    public function changepassword(Request $req){
        $curpassword = $req->curpassword;
        $newpassword = $req->newpassword;
        $user = User::where(['id'=>$req->userid])->first();
        if(Hash::check($curpassword, $user->password)) {
            $newpassword = Hash::make($newpassword);
            $user->password = $newpassword;
            $user->save();
            return response()->json(['success' => 'Password Updated Successfully!'], $this-> successStatus); 
        }else{
            return response()->json(['error'=>'error'], 402); 
        }
        return redirect('profile');
        
    }     
    public function getalluser(){
        $res = DB::table('users')->where('id','!=',1)->get();
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function filteruser(Request $request){
                $country = 'all';
        $specialist = 'all';
        $rating = 'all';
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
        
        if ($userlist) {
            return response()->json(['success' => $userlist], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        } 
    }
    public function getuserposts($userid){
        \DB::statement("SET SQL_MODE=''");
        $data = DB::select("SELECT news_list.*, count(likes.postid) as totallikes, ifnull(round(AVG(rating.value),1),0) as rating FROM `news_list`
                            left outer JOIN likes on likes.postid = news_list.id
                            left outer join rating on rating.postid = news_list.id
                            WHERE news_list.approval=1 and news_list.userid = '$userid'
                            GROUP BY news_list.id");
        if ($data) {
            return response()->json(['success' => $data], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        } 
    }
    public function deletepost(request $request,$id){
          if(News::where('id',$id)->delete()){
                return response()->json(['success' => 'Post Deleted Successfully'], $this-> successStatus); 
          }else{
                return response()->json(['error'=>'error'], 402); 
          }
          die;
    }
    public function addwatchlist(request $request){
        $array = array(
            "userid" => $request->userid,
            "currency" => $request->currency,
            "created_at" => date('Y-m-d H:i:s')
        );
        $res = DB::table('watch_list')->insert($array);
        if ($res) {
            return response()->json(['success' => "successfully added"], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }
    public function removewatchlist(request $request){
        $res = DB::table('watch_list')->where('userid',$request->userid)->where('currency',$request->currency)->delete();
        if ($res) {
            return response()->json(['success' => "successfully remove"], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }     
    }
    public function getwatchlist(request $request){
        $res = DB::table('watch_list')->where('userid',$request->userid)->get();
        if ($res) {
            return response()->json(['success' => $res], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }     
    }
    public function update_playerid(Request $request)
    {
        $array = array(
            "player_id" => $request->playerid
        );
        $res = DB::table('users')->where('id',$request->userid)->update($array);
        if ($res) {
            return response()->json(['success' => 'User Player Id Successfully Updated'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }  
    }  
    public function markallasread($id){
        $array = array( 'read'=>1);
        $res = DB::table('notifications')->where('userid',$id)->update($array);
        if ($res) {
            return response()->json(['success' => 'All notification mark as read successfully'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }         
    }
    public function markasread($postid,$userid){
        $array = array( 'read'=>1);
        $res = DB::table('notifications')->where('userid',$userid)->where('id',$postid)->update($array);
        if ($res) {
            return response()->json(['success' => 'notification mark as read successfully'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }          
    }    
    public function deleteeducation($id){
        if (Education::where('id',$id)->delete()) {
            return response()->json(['success' => 'Education delete successfully'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }          
    }
    public function deleteworkhistory($id){
       if (Works::where('id',$id)->delete()) {
            return response()->json(['success' => 'Works history delete successfully'], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'error'], 402); 
        }         
    }    
    public function onesignal($title,$message,$playerids){
		$img = "";
		$link  = URL::to('/')."/front/images/favicon.png";
		$content = array(
			"en" => $message
		);
		$headings = array(
			"en" => $title
		);
		if ($img == '') {
			$fields = array(
				'app_id' => 'f154a872-c9b9-4ade-afab-2e1bff2aef53',
				"headings" => $headings,
				'include_player_ids' => $playerids,
				'large_icon' => $link,
				'content_available' => true,
				'contents' => $content
			);
		} else {
			$ios_img = array(
				"id1" => $img
			);
			$fields = array(
				'app_id' => 'f154a872-c9b9-4ade-afab-2e1bff2aef53',
				"headings" => $headings,
				'include_player_ids' => $playerids,
				'contents' => $content,
				"big_picture" => $img,
				'large_icon' => $link,
				'content_available' => true,
				"ios_attachments" => $ios_img
			);
		}
		$headers = array(
			'Authorization: Basic YjI2NWIyNDctNzMzMi00YWZlLWFiZmItZDM3ZWMzNGMzZmRm',
			'Content-Type: application/json; charset=utf-8'
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		return true;
    }    
    
    
    
    
}