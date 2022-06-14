<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Card;
use App\Models\Education;
use App\Models\Works;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use DB;
class ProfileController extends Controller
{
    public function noagainprofilepopup(){
        $array = array(
            "profilepopup" => 0,
            "skipdateof_profilepopup"=> date('Y-m-d H:i:s')
        );
        DB::table('users')->where('id',Auth::id())->update($array);
        return redirect()->back();
    }
    public function noagainfirstpostpopup(){
        $array = array(
            "firstpostpopup" => 0,
            "skipdateof_firstpostpopup"=> date('Y-m-d H:i:s')
        );
        DB::table('users')->where('id',Auth::id())->update($array);
        return redirect()->back();
    }
    public function savepostview(Request $request){
        $array = array(
            "postview" => $request->view
        );
        DB::table('users')->where('id',Auth::id())->update($array);
        echo "ok";
        die;
    }
    public function currencyexchange(){
        return view("dashboard.currencyexchange");
    }
    public function profile(){
        $data = User::where('id',Auth::user()->id)->first();
        $edu = Education::where('userid',Auth::user()->id)->get();
        $works = Works::where('userid',Auth::user()->id)->get();
        $categories = DB::table('product_category')->get();
        return view("dashboard.profile",compact('data','edu','works','categories'));
    }
    public function uploadprodileimage(Request $request)
    {
        $folderPath = public_path('uploads/userimg/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imagename = uniqid() . '.png';
        $file = $folderPath . $imagename;

        file_put_contents($file, $image_base64);
        $userss = auth()->user();
        $user = User::where(['id'=>$userss->id])->first();
        $user->image = $imagename;
        $user->save();
        return response()->json(['success'=>'success']);
    }
    public function uploadbannerimage(Request $request)
    {
        $folderPath = public_path('uploads/userbimg/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imagename = uniqid() . '.png';
        $file = $folderPath . $imagename;

        file_put_contents($file, $image_base64);
        $userss = auth()->user();
        $user = User::where(['id'=>$userss->id])->first();
        $user->bimage = $imagename;
        $user->save();
        return response()->json(['success'=>'success']);
    }
    public function updateprofile(Request $req){
        $userss = auth()->user();
        $user = User::where(['id'=>$userss->id])->first();
        $user->fname = $req->fname;
        $user->lname = $req->lname;
        $user->registered_address = $req->registered_address;
        $user->facebook = $req->facebook;
        $user->instagram = $req->instagram;
        $user->linkedin = $req->linkedin;
        $user->address = $req->address;
        if(Auth::user()->user_value == 'company'){
            $user->marketing_contact_detail = $req->marketingcontact;
            $user->press_contact_detail = $req->presscontact;
            $user->sales_contact_details = $req->salecontact;
            $user->saleperson_name = $req->saleperson;
            $user->website_address	 = $req->websiteaddress;
        }
        $user->bio = $req->bio;
        $user->specialist = json_encode($req->specialist);
        $user->country = $req->country;
       // $user->email = $req->email;
        // if ($files = $req->file('image')) {
        //     $req->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // // Define upload path
        // $destinationPath = public_path('uploads/userimg/'); // upload path
        
        // // Upload Orginal Image
        // $imageName =  $files->getClientOriginalname();
        // $imagePath = $imageName;
        // $files->move($destinationPath, $imageName);
        // $user->image = $imagePath;
        // unset($this->file);
        // }
        // if ($filesz = $req->file('bimage')) {
        //     $req->validate(['bimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',]);
        // // Define upload path
        // $destinationPath = public_path('uploads/userbimg/'); // upload path
        
        // // Upload Orginal Image
        // $imageName =  $filesz->getClientOriginalname();
        // $imagePath = $imageName;
        // $filesz->move($destinationPath, $imageName);
        // $user->bimage = $imagePath;
        // unset($this->file);
        // }
        
        $user->save();
        Session::flash('message','Profile Updated Successfully!'); 
        Session::flash('type','success'); 
        return redirect('profile');
    }
    public function updatepassword(Request $req){
        $curpassword = $req->curpassword;
        $newpassword = $req->newpassword;
        $oldpassword = $req->oldpassword;
        $userss = auth()->user();
        $user = User::where(['id'=>$userss->id])->first();
        if(Hash::check($curpassword, $user->password)) {
            $newpassword = Hash::make($newpassword);
            $user->password = $newpassword;
            $user->save();
            Session::flash('message','Password Updated Successfully!'); 
            Session::flash('type','success'); 
        }else{
            Session::flash('message','Something went wrong!'); 
            Session::flash('type','danger'); 
        }
        return redirect('profile');
        
    }    
    public function paymentcard(){
        $cards  = DB::table('cards')->where('userid',Auth::user()->id)->get();
        return view('dashboard.payment.paymentcard',compact('cards'));
    }
    public function subscriptionplan(){
        $userdata  = DB::table('users')->where('id',Auth::user()->id)->first();
        $subsdata = DB::table('subscriptions')->where('id',$userdata->subscription_id)->get();
        return view('dashboard.subscription.index',compact('subsdata','userdata'));
    }

    public function addcard(){
        return view('dashboard.payment.add');
    }
    public function InsertCard(Request $request){
        $card = new Card;
        $card->userid = Auth::user()->id;
        $card->name = $request->cardname;
        $card->number = $request->cardno;
        $card->csv = $request->csv;
        $card->month = $request->month;
        $card->year = $request->year;
        $card->save();
        Session::flash('message','Your Card Successfully Saved'); 
        Session::flash('type','success'); 
        return redirect('paymentcard');    
    }
       
    public function DeleteCard(request $request,$id){
        if(Card::where('id',$id)->delete()){
          return "success";
        }else{
          return "error";
        }
        die;
  }
    public function addeducation(Request $request){
        $edu = new Education;
        $edu->userid = Auth::user()->id;
        $edu->school = $request->school;
        $edu->fieldofstudy = $request->fieldofstudy;
        $edu->degree = $request->degree;
        $edu->start = $request->starting;
        $edu->end = $request->ending;
        $edu->created_at = date('Y-m-d H:i:s');
        $edu->save();
        Session::flash('message','New Education Record Successfully Saved'); 
        Session::flash('type','success'); 
        return redirect('profile');          
    }
    public function addwork(Request $request){
        $work = new Works;
        $work->userid = Auth::user()->id;
        $work->company = $request->company;
        $work->desognation = $request->designation;
        $work->responsibility = $request->responsibility;
        $work->industory = $request->industory;
        $work->start = $request->syear;
        $work->end = $request->ending;
        $work->currently = $request->currently;
        $work->created_at = date('Y-m-d H:i:s');
        $work->save();
        Session::flash('message','New Work Record Successfully Saved'); 
        Session::flash('type','success'); 
        return redirect('profile');          
    }
   public function deleteedu($id){
          if(Education::where('id',$id)->delete()){
            return "success";
          }else{
            return "error";
          }
          die;
    }
   public function deletework($id){
          if(Works::where('id',$id)->delete()){
            return "success";
          }else{
            return "error";
          }
          die;
    }
    public function viewprofile($id){
        $followstirng = '';
        $followsarray= array();
        $data = User::where('id',$id)->first();
        $edu = Education::where('userid',$id)->orderBy('id','desc')->get();
        $works = Works::where('userid',$id)->orderBy('id','desc')->get();
        $totalpostcount=DB::table("news_list")->where('userid',$id)->where('approval',1)->count();
        $list=DB::table("news_list")->where('userid',$id)->where('approval',1)->orderBy('id','desc')->paginate(5);
                $publisherfollowlist = DB::table("follower_list")->where('userid',Auth::user()->id)->get();
        if(count($publisherfollowlist) > 0){
        foreach($publisherfollowlist as $key){
            $followstirng .= $key->publisherid.',';
        }
            $followstirng = rtrim($followstirng,',');
            $followsarray = explode(',', $followstirng);
            
        }
        $followlist  = DB::table('follower_list')->where('userid',$id)->get();
        $followerlist  = DB::table('follower_list')->where('publisherid',$id)->get();
        return view("dashboard.profileview",compact('data','edu','works','list','followsarray','followlist','followerlist','totalpostcount'));
    }
}