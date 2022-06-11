<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
  use DB;
  use Mail;
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $stype = $request->stype;
        $subdata = DB::table('subscriptions')->where('id',$stype)->first();
        $userdata = DB::table('users')->where('id',$request->userid)->first();
        Stripe\Stripe::setApiKey("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");
        Stripe\Charge::create ([
                "amount" => $subdata->price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Subscription Payment of user ".$userdata->fname 
        ]);
        $todaydate = date('Y-m-d');
        if($stype == 3){
            $newDate = date('Y-m-d', strtotime($todaydate. ' + 1 year'));
        }else{
            $newDate = date('Y-m-d', strtotime(' + 1 months'));
            Mail::send('email.monthlySubscriptionEmail', ['name' => $userdata->fname], function($message) use($userdata){
                  $message->to($userdata->email);
                  $message->subject('Monthly subscription is activated now - Recycling Market News! ');
            });      
            Mail::send('email.InvoiceSubscription', ['username' => $userdata->fname, 'payamount'=>$subdata->price,'description'=> 'Monthly Subcription Plan','todaydate'=>$todaydate,'edate'=>$newDate], function($message) use($userdata){
                      $message->to($userdata->email);
                      $message->subject('Subscription Invoice!');
            });              
            
        }
        
        $array = array(
            "subscription_id" => $stype,
            "start_date" => $todaydate,
            "e_date" => $newDate
        );
        DB::table('users')->where('id',$userdata->id)->update($array);
        Session::flash('message','Payment successful now you can login and enjoy our services!'); 
        Session::flash('type','success'); 
        return redirect('subscriptionplan');
    }
}