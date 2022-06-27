<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\MessagesController;
use App\Http\Middleware\CheckSubscription;
use App\Http\Middleware\EmailVerify;
use App\Http\Controllers\SocialAuth\GoogleSocialiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sitemap', function(){
    $sitemap = Sitemap::create()
    ->add(Url::create('/'))
    ->add(Url::create('/pricing'))
    ->add(Url::create('/contact'))
    ->add(Url::create('/term'))
    ->add(Url::create('/login'))
    ->add(Url::create('/signupselect'))
    ->add(Url::create('/front/pdffile/Privacy%20Policy%20-%20Recycling%20Market%20News.pdf'))
    ->add(Url::create('/front/pdffile/Cookie%20Policy%20-%20Recycling%20Market%20News.pdf'))
    ->add(Url::create('/front/pdffile/Terms%20_%20Conditions%20-%20Recycling%20Market%20News.pdf'))
    ->add(Url::create('/front/pdffile/Community%20Guidelines%20-%20Recycling%20Market%20News.pdf'))
    ->add(Url::create('/front/pdffile/Content%20Takedown%20Policy%20-%20Recycling%20Market%20News.pdf'))
    ->add(Url::create('/front/pdffile/Disclaimer%20-%20Recycling%20Market%20News.pdf'))
    ->add(Url::create('/front/pdffile/Refund%20Policy%20-%20Recycling%20Market%20News.pdf'))
    ->add(Url::create('/forgotpassword'));
   
    $post = News::all();
    foreach ($post as $post) {
        $newsheading = $post->heading; 
        $newsheading = strtolower(str_replace(" ", "-", $newsheading));
        $sitemap->add(Url::create("/share/{$newsheading}"));
    }
    $sitemap->writeToFile(public_path('sitemap.xml'));
});
 
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('auth/facebook', [GoogleSocialiteController::class, 'redirectToFB']);
Route::get('auth/apple', [GoogleSocialiteController::class, 'redirectToApple']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
Route::get('callback/facebook', [GoogleSocialiteController::class, 'handleCallbackfacebook']);

Route::post('/onesignal/save-player-id',[ProductController::class,'saveplayerid']);
Route::get('/',[FrontController::class,'index']);
Route::get('/home',[FrontController::class,'index'])->name('home');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');
Route::get('/term',[FrontController::class,'term'])->name('term');
Route::get('/pricing',[FrontController::class,'pricing'])->name('pricing');
Route::get('/login',[FrontController::class,'login'])->name('login');
Route::get('/signupselect',[FrontController::class,'signupselect'])->name('signupselect');
Route::get('/testinvoice',[FrontController::class,'testinvoice'])->name('testinvoice');
Route::get('/individualsignup',[FrontController::class,'individualsignup'])->name('individualsignup');
Route::get('/companysignup',[FrontController::class,'companysignup'])->name('companysignup');
Route::get('/forgotpassword',[FrontController::class,'forgotpassword'])->name('forgotpassword');
Route::post('/submitforgot',[FrontController::class,'submitforgot'])->name('submitforgot');
Route::get('reset-password/{token}', [FrontController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [FrontController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/about',[FrontController::class,'about']);
Route::get('/term',[FrontController::class,'term']);
Route::get('/contact',[FrontController::class,'contact']);
Route::post('/submitcontact',[FrontController::class,'submitcontact']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/submit_login',[AuthController::class,'submit_login'])->name('submit_login');
Route::post('/submit_frontlogin',[AuthController::class,'submit_frontlogin'])->name('submit_frontlogin');
Route::post('/submit_forgot',[AuthController::class,'submit_forgot'])->name('submit_forgot');
Route::post('/submit_registerind',[AuthController::class,'submit_registerind'])->name('submit_registerind');
Route::post('/submit_registercompany',[AuthController::class,'submit_registercompany'])->name('submit_registercompany');
Route::post('/submitemailverify',[AuthController::class,'submitemailverify'])->name('submitemailverify');
Route::get('/linkemailverify/{email}/{code}',[AuthController::class,'linkemailverify'])->name('linkemailverify');
Route::get('/emailverficationpage/{id}',[AuthController::class,'emailverficationpage'])->name('emailverficationpage');
Route::get('/resendemailverify/{email}',[AuthController::class,'resendemailverify'])->name('resendemailverify');
Route::get('share/{slug}',[ProductController::class,'sharesinglenews'])->name('sharesinglenews');
Route::get('autotrialemail',[FrontController::class,'autotrialemail'])->name('autotrialemail');
Route::get('autopostemailtouser',[FrontController::class,'autopostemailtouser'])->name('autopostemailtouser');

Route::middleware([CheckSubscription::class])->group(function(){
    
Route::middleware([EmailVerify::class])->group(function(){
Route::get('dash',[DashboardController::class, 'dash'])->name('dash')->middleware('auth');
Route::get('advertise',[DashboardController::class, 'advertise'])->name('advertise')->middleware('auth');
Route::get('dash-privacy-policy',[DashboardController::class, 'privacypolicy'])->name('privacypolicy')->middleware('auth');
Route::get('dash-terms-conditions',[DashboardController::class, 'termsandconditions'])->name('termsandconditions')->middleware('auth');
Route::get('dash-cookie-policy',[DashboardController::class, 'cookiepolicy'])->name('cookiepolicy')->middleware('auth');
Route::get('dash-content-takedown-policy',[DashboardController::class, 'contenttakedownpolicy'])->name('contenttakedownpolicy')->middleware('auth');
Route::get('dash-refund-policy',[DashboardController::class, 'refundpolicy'])->name('refundpolicy')->middleware('auth');
Route::get('dash-disclaimer',[DashboardController::class, 'disclaimer'])->name('disclaimer')->middleware('auth');
Route::get('dash-community-guidelines',[DashboardController::class, 'communityguidelines'])->name('communityguidelines')->middleware('auth');
Route::get('dash-copyright',[DashboardController::class, 'copyright'])->name('copyright')->middleware('auth');
Route::get('dash-how-work',[DashboardController::class, 'howwork'])->name('howwork')->middleware('auth');
Route::get('dash-what-can-publish',[DashboardController::class, 'whatcanpublish'])->name('whatcanpublish')->middleware('auth');


Route::get('settings',[DashboardController::class, 'settings'])->name('settings')->middleware('auth');
Route::get('myfollows',[DashboardController::class, 'myfollows'])->name('myfollows')->middleware('auth');
Route::get('myfollowers',[DashboardController::class, 'myfollowers'])->name('myfollowers')->middleware('auth');
Route::post('submitsettings',[DashboardController::class, 'submitsettings'])->name('submitsettings')->middleware('auth');

///////////////user management route////////////////////////
 //add user form load
Route::get('addUser',[UsersController::class, 'addUser'])->middleware('auth');
// manage user form load
Route::get('manageUser',[UsersController::class, 'manageUser'])->middleware('auth');
// insert and update user  to database 
Route::post('InsertUser',[UsersController::class, 'InsertUser'])->middleware('auth');
Route::post('UpdateUser/{id}',[UsersController::class, 'UpdateUser'])->middleware('auth');
// edit_user form load
Route::get('edit_user/{id}',[UsersController::class, 'edit_user'])->middleware('auth');
Route::get('deleteuser/{id}',[UsersController::class, 'deleteuser'])->name('deleteuser')->middleware('auth');
Route::get('getusermessage',[UsersController::class,'getmessage'])->middleware('auth');
Route::get('getusermessagecounter',[UsersController::class,'getusermessagecounter'])->middleware('auth');
////////////Product Category///////////////////////////////
 //product category form
 Route::get('viewCategory',[ProductController::class,'viewCategory'])->middleware('auth');
  // insert category
  Route::post('InsertCategory',[ProductController::class,'InsertCategory'])->middleware('auth');
  //manage category form
 Route::get('manageCategory',[ProductController::class,'manageCategory'])->name('manageCategory')->middleware('auth');
 //Delete category
 Route::get('DeleteCategory/{id}',[ProductController::class,'DeleteCategory'])->name('DeleteCategory')->middleware('auth');
 // Update Category Form
 Route::get('UpdateCategoryForm/{id}',[ProductController::class,'UpdateCategoryForm'])->name('UpdateCategoryForm')->middleware('auth');
 // update Category
 Route::post('updateCategory',[ProductController::class,'updateCategory'])->name('updateCategory')->middleware('auth');
  /// category pricing Route
  Route::get('categorypricing',[ProductController::class,'categorypricing'])->name('categorypricing')->middleware('auth');
  Route::get('categorypricingadmin',[ProductController::class,'categorypricingadmin'])->name('categorypricingadmin')->middleware('auth');
  Route::post('priceupdate',[ProductController::class,'priceupdate'])->name('priceupdate')->middleware('auth');
 
 /// Profile Route
Route::get('profile',[ProfileController::class,'profile'])->name('profile')->middleware('auth');
Route::post('/updateprofile', [ProfileController::class, 'updateprofile'])->middleware('auth');
Route::post('/updatepassword', [ProfileController::class, 'updatepassword'])->middleware('auth');
Route::post('/addeducation', [ProfileController::class, 'addeducation'])->middleware('auth');
Route::post('/addwork', [ProfileController::class, 'addwork'])->middleware('auth');
Route::get('deleteedu/{id}',[ProfileController::class,'deleteedu'])->name('deleteedu')->middleware('auth');
Route::get('deletework/{id}',[ProfileController::class,'deletework'])->name('deletework')->middleware('auth');
Route::get('viewprofile/{id}',[ProfileController::class,'viewprofile'])->name('viewprofile')->middleware('auth');
Route::post('crop-image-upload',[ProfileController::class,'uploadprodileimage'])->middleware('auth');
Route::post('crop-bimage-upload',[ProfileController::class,'uploadbannerimage'])->middleware('auth');
// User Search
Route::get('userlist',[ProductController::class,'userlist'])->name('userlist')->middleware('auth');
Route::post('userlistt',[ProductController::class,'userlistt'])->name('userlistt')->middleware('auth');


// Post
Route::get('addpost',[ProductController::class,'addpost'])->name('addpost')->middleware('auth');
Route::get('editpost/{id}',[ProductController::class,'editpost'])->name('editpost')->middleware('auth');
Route::get('editpostadmin/{id}',[ProductController::class,'editpostadmin'])->name('editpostadmin')->middleware('auth');
Route::get('managepost',[ProductController::class,'managepost'])->name('managepost')->middleware('auth');
Route::post('submitpost',[ProductController::class,'submitpost'])->name('submitpost')->middleware('auth');
Route::post('submiteditpost',[ProductController::class,'submiteditpost'])->name('submiteditpost')->middleware('auth');
Route::post('adminsubmiteditpost',[ProductController::class,'adminsubmiteditpost'])->name('adminsubmiteditpost')->middleware('auth');
Route::get('publisherpost',[ProductController::class,'publisherpost'])->name('publisherpost')->middleware('auth');
Route::get('postapprove/{id}',[ProductController::class,'postapprove'])->name('postapprove')->middleware('auth');
Route::post('rejectsubmit',[ProductController::class,'rejectsubmit'])->name('rejectsubmit')->middleware('auth');
Route::get('allactivepost',[ProductController::class,'allactivepost'])->name('allactivepost')->middleware('auth');
Route::get('/searchnewsbyinput',[ProductController::class,'searchnewsbyinput'])->name('searchnewsbyinput')->middleware('auth');
Route::post('allactivepostt',[ProductController::class,'allactivepostt'])->name('allactivepostt')->middleware('auth');
Route::get('allactivepostt',[ProductController::class,'allactivepostt'])->middleware('auth');
Route::get('allactiveposttt/{id}',[ProductController::class,'allactiveposttt'])->middleware('auth');
Route::get('deletepost/{id}',[ProductController::class,'deletepost'])->name('deletepost')->middleware('auth');
Route::get('unfollow/{id}',[ProductController::class,'unfollow'])->name('unfollow')->middleware('auth');
Route::get('savefollow/{id}',[ProductController::class,'savefollow'])->name('savefollow')->middleware('auth');
Route::get('singlenews/{id}',[ProductController::class,'singlenews'])->name('singlenews')->middleware('auth');

Route::post('addcomment',[ProductController::class,'addcomment'])->name('addcomment')->middleware('auth');
Route::get('deletecomment/{id}',[ProductController::class,'deletecomment'])->name('deletecomment')->middleware('auth');
Route::get('reportcomment/{id}',[ProductController::class,'reportcomment'])->name('reportcomment')->middleware('auth');
Route::post('/rating/{post}', [ProductController::class,'postStar'])->name('postStar')->middleware('auth');
Route::get('addlike/{id}', [ProductController::class,'addlike'])->name('addlike')->middleware('auth');
Route::get('/addlikebyajax/{id}', [ProductController::class,'addlikebyajax'])->name('addlikebyajax')->middleware('auth');
Route::get('unlike/{id}', [ProductController::class,'unlike'])->name('unlike')->middleware('auth');
Route::get('/unlikebyajax/{id}', [ProductController::class,'unlikebyajax'])->name('unlikebyajax')->middleware('auth');
Route::get('markallasread', [ProductController::class,'markallasread'])->name('markallasread')->middleware('auth');
Route::get('markasread/{id}', [ProductController::class,'markasread'])->name('markasread')->middleware('auth');
Route::get('addtowatchlist/{id}', [ProductController::class,'addtowatchlist'])->name('addtowatchlist')->middleware('auth');
Route::get('addtowatchlistremove/{id}', [ProductController::class,'addtowatchlistremove'])->name('addtowatchlistremove')->middleware('auth');


Route::get('paymentcard',[ProfileController::class,'paymentcard'])->name('paymentcard')->middleware('auth');
Route::get('subscriptionplan',[ProfileController::class,'subscriptionplan'])->name('subscriptionplan')->middleware('auth');
Route::get('addcard',[ProfileController::class,'addcard'])->name('addcard')->middleware('auth');
Route::post('InsertCard',[ProfileController::class,'InsertCard'])->name('InsertCard')->middleware('auth');
Route::get('DeleteCard/{id}',[ProfileController::class,'DeleteCard'])->name('DeleteCard')->middleware('auth');
Route::get('noagainprofilepopup',[ProfileController::class,'noagainprofilepopup'])->name('noagainprofilepopup')->middleware('auth');
Route::get('noagainfirstpostpopup',[ProfileController::class,'noagainfirstpostpopup'])->name('noagainfirstpostpopup')->middleware('auth');
Route::post('savepostview',[ProfileController::class,'savepostview'])->name('savepostview')->middleware('auth');
});
});

 //Clear route cache:
 Route::get('/route-cache', function() {
     $exitCode = Artisan::call('route:cache');
     return 'Routes cache cleared';
 });

 //Clear config cache:
 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
     return 'Config cache cleared';
 }); 

// Clear application cache:
 Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

 Route::get('stripe', [StripePaymentController::class,'stripe']);
 Route::post('stripe', [StripePaymentController::class,'stripePost'])->name('stripe.post');




/*
* This is the main app route [Chatify Messenger]
*/
Route::get('/chat', [MessagesController::class,'index'])->name(config('chatify.routes.prefix'));

/**
 *  Fetch info for specific id [user/group]
 */
Route::post('chat/idInfo', [MessagesController::class,'idFetchData']);

/**
 * Send message route
 */
Route::post('chat/sendMessage', [MessagesController::class,'send'])->name('send.message');

/**
 * Fetch messages
 */
Route::post('chat/fetchMessages', [MessagesController::class,'fetch'])->name('fetch.messages');

/**
 * Download attachments route to create a downloadable links
 */
Route::get('chat/download/{fileName}', [MessagesController::class,'download'])->name(config('chatify.attachments.download_route_name'));

/**
 * Authentication for pusher private channels
 */
Route::post('/chat/auth', [MessagesController::class,'pusherAuth'])->name('pusher.auth');

/**
 * Make messages as seen
 */
Route::post('chat/makeSeen',  [MessagesController::class,'seen'])->name('messages.seen');

/**
 * Get contacts
 */
Route::get('chat/getContacts', [MessagesController::class,'getContacts'])->name('contacts.get');

/**
 * Update contact item data
 */
Route::post('chat/updateContacts', [MessagesController::class,'updateContactItem'])->name('contacts.update');


/**
 * Star in favorite list
 */
Route::post('chat/star', [MessagesController::class,'favorite'])->name('star');

/**
 * get favorites list
 */
Route::post('chat/favorites', [MessagesController::class,'getFavorites'])->name('favorites');

/**
 * Search in messenger
 */
Route::get('chat/search', [MessagesController::class,'search'])->name('search');

/**
 * Get shared photos
 */
Route::post('chat/shared', [MessagesController::class,'sharedPhotos'])->name('shared');

/**
 * Delete Conversation
 */
Route::post('chat/deleteConversation', [MessagesController::class,'deleteConversation'])->name('conversation.delete');

/**
 * Delete Message
 */
Route::post('chat/deleteMessage', [MessagesController::class,'deleteMessage'])->name('message.delete');

/**
 * Update setting
 */
Route::post('chat/updateSettings', [MessagesController::class,'updateSettings'])->name('avatar.update');

/**
 * Set active status
 */
Route::post('chat/setActiveStatus', [MessagesController::class,'setActiveStatus'])->name('activeStatus.set');






/*
* [Group] view by id
*/
Route::get('chat/group/{id}', 'MessagesController@index')->name('group');

/*
* user view by id.
* Note : If you added routes after the [User] which is the below one,
* it will considered as user id.
*
* e.g. - The commented routes below :
*/
// Route::get('/route', function(){ return 'Munaf'; }); // works as a route
Route::get('chat/{id}', [MessagesController::class,'index'])->name('user');
// Route::get('/route', function(){ return 'Munaf'; }); // works as a user id