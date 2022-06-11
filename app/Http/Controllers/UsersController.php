<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
use DB;
use Mail;
use Auth;
use URL;
class UsersController extends Controller
{
    //
    public function addUser(){
        $category=Product::all();
        return view('dashboard.users.addUser',compact('category'));
    }
    public function manageUser(){
        $users = User::where('user_type','!=',1)->where('status',1)->get();
        return view('dashboard.users.manageUser',compact('users'));
    }
    public function InsertUser(request $request){
        $userexist = User::where('email',$request->email)->first();
        
       if($userexist!=""){
            Session::flash('message','User Email Already Exist'); 
            Session::flash('type','danger');
       }else{
            $imagePath="";
            if ($files = $request->file('image')) {
                $request->validate(['image' => 'required|image',
                ]);
                // Upload Orginal Image
                $imageName =  $files->getClientOriginalname();
                 move_uploaded_file($imageName, public_path('uploads/userimg/'));
                //$request->image->move(public_path('uploads/userimg/'), $imageName);
            }
            $user = new User();
            $user->user_type = $request->usertype;
            $user->user_value = $request->uservalue;
            $user->fname = $request->f_name;
            $user->lname = $request->l_name;
            $user->image = $imageName;
            $user->email = $request->email;
            $user->country = $request->country;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            $user->bio = $request->bio;
            $user->created_at = date('Y-m-d H:i:s');
            $user->save();
            $insertedId = $user->id;
            $array = array(
                "userid" => $insertedId,
                "currency" => 'GBP',
                "created_at" => date('Y-m-d H:i:s')
            );
            DB::table('watch_list')->insert($array);
            Session::flash('message','User Added Successfully'); 
            Session::flash('type','success'); 
       }
        return redirect('manageUser');        

       
    }
    public function UpdateUser(request $request, $id){

   
            $user= User::find($id);
        if ($files = $request->file('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // Define upload path
        $destinationPath = public_path('uploads/userimg/'); // upload path
        
        // Upload Orginal Image
        $imageName =  $files->getClientOriginalname();
        $imagePath = $imageName;
        $files->move($destinationPath, $imageName);
        $user->image = $imagePath;
        unset($this->file);
        }
        $user->user_type = $request->usertype;
        $user->user_value = $request->uservalue;
            $user->fname = $request->f_name;
            $user->lname = $request->l_name;
            
            
            $user->country = $request->country;
            $user->address = $request->address;
          
            $user->bio = $request->bio;
            $user->updated_at = date('Y-m-d H:i:s');
            $user->update();
            // $access=$request->access;  
            // if($access){
            //     DB::table('user_access')->where('userid',$id)->delete();
            //     for($i=0; $i < count($access);$i++)  
            //     {  
            //         $data = array(
            //             "userid" => $id,
            //             "product_category_id" => $access[$i],
            //             "created_at" => date('Y-m-d H:i:s'),
            //         );
            //         DB::table('user_access')->insert($data);
            //     }  
            // }
            Session::flash('message','User Updated Successfully'); 
            Session::flash('type','success'); 
        return redirect('manageUser');        

       
    }
    
    public function edit_user(request $request,$id){
        $user=User::where('id',$id)->first();
        // $category=Product::all();
        // $accessstirng = '';
        // $accessarray;
        // $access = DB::table('user_access')->select('user_access.*','product_category.name')->leftJoin('product_category', 'product_category.id', '=', 'user_access.product_category_id')->where('user_access.userid',$id)->get();
        
        // if(count($access) > 0){
        // foreach($access as $key){
        //     $accessstirng .= $key->name.',';
        // }
        //     $accessstirng = rtrim($accessstirng,',');
        //     $accessarray = explode(',', $accessstirng);
            
        // }
     
        return view('dashboard.users.editUser',compact('user'));
    }
    public function deleteuser($id){
        $userdata = DB::table('users')->where('id',$id)->first();
        $array = array(
            "user_type" =>$userdata->user_type,
            "fname" =>$userdata->fname,
            "lname" =>$userdata->lname,
            "image" =>$userdata->image,
            "facebook" =>$userdata->facebook,
            "instagram" =>$userdata->instagram,
            "linkedin" =>$userdata->linkedin,
            "bimage" =>$userdata->bimage,
            "email" => $userdata->email,
            "bio" =>$userdata->bio,
            "country" =>$userdata->country,
            "specialist" =>$userdata->specialist,
            "password" =>$userdata->password,
            "status" =>$userdata->status,
            "subscription_id" =>$userdata->subscription_id,
            "start_date" =>$userdata->start_date,
            "e_date" =>$userdata->e_date,
            "created_at" =>$userdata->created_at,
            "updated_at" =>$userdata->updated_at,
        );
        DB::table('usersjunk')->insert($array);
        
        DB::table('users')->where('id',$id)->delete();
        DB::table('education')->where('userid',$id)->delete();
        DB::table('comments')->where('userid',$id)->delete();
        DB::table('follower_list')->where('userid',$id)->delete();
        DB::table('likes')->where('userid',$id)->delete();
        DB::table('news_list')->where('userid',$id)->delete();
        DB::table('rating')->where('userid',$id)->delete();
        DB::table('watch_list')->where('userid',$id)->delete();
        DB::table('specialist')->where('userid',$id)->delete();
        DB::table('workhistory')->where('userid',$id)->delete();
        Mail::send('email.userDelete', ['name' => $userdata->fname], function($message) use($userdata){
              $message->from('info@recyclingmarketnews.com');
              $message->to($userdata->email);
              $message->subject('Account deletion confirmation');
        });
        return "success";
    }
    public function getmessage(){
        $meslist = DB::table('ch_messages')->where('to_id',Auth::user()->id)->where('seen',0)->orderBy('id','desc')->get();
        $html  = '';
        if(count($meslist)>0){
        foreach($meslist as $key){
            $userdata = DB::table('users')->where('id',$key->from_id)->first(); 
           $html .='<a href="'. URL::to("chat/".$key->from_id).'" class="text-reset notification-item">
                
                <div class="d-flex border-bottom align-items-start" style="padding: 10px;">
                    <div class="flex-shrink-0">
                        <img src="'.asset('uploads/userimg/'.$userdata->image).'" class="me-3 rounded-circle avatar-sm" alt="user-pic">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-1">'.$userdata->fname.' '.$userdata->lname.'</h6>
                           
                        </div>
                        
                        <div class="text-muted">
                            <p class="mb-1 font-size-13">'.$key->body.'</p>
                            <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> '. \Carbon\Carbon::parse($key->created_at)->diffForHumans().'</p>
                        </div>
                    </div>
                </div>
            </a>';
        }}
        
        if($html == ''){
            $html = '<a href="" class="text-reset notification-item">
                                        <div class="d-flex border-bottom align-items-start">
                                     
                                            <div class="flex-grow-1">
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13">No Notification Yet!</p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </a>';
        }
    return $html;
        
    }     
    public function getusermessagecounter(){
        $messagecount = DB::table('ch_messages')->where('to_id',Auth::user()->id)->where('seen',0)->count();
        return $messagecount;
    }   
}
