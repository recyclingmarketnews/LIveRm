<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/submit_login',[ApiController::class,'submit_login']);
Route::post('/submit_register',[ApiController::class,'submit_register']);
Route::post('/submit_forgot',[ApiController::class,'submitforgot']);
Route::get('/getCategories',[ApiController::class,'getCategories']);
Route::get('/getProfile/{id}',[ApiController::class,'getProfile']);
Route::post('/updateProfile',[ApiController::class,'updateProfile']);
Route::get('/getallNews',[ApiController::class,'getallNews']);
Route::get('/getallrejectedpost',[ApiController::class,'getallrejectedpost']);
Route::get('/getallpendingpost',[ApiController::class,'getallpendingpost']);
Route::get('/getpostbycat/{id}',[ApiController::class,'getpostbycat']);
Route::get('/getpostbyid/{id}',[ApiController::class,'getpostbyid']);
Route::get('/deletepost/{id}',[ApiController::class,'deletepost']);

Route::get('/getallapprovedpostbyuser/{id}',[ApiController::class,'getallapprovedpostbyuser']);
Route::get('/getallrejectedpostbyuser/{id}',[ApiController::class,'getallrejectedpostbyuser']);
Route::get('/getallpendingpostbyuser/{id}',[ApiController::class,'getallpendingpostbyuser']);

Route::post('/getfollowers',[ApiController::class,'getfollowers']);
Route::post('/addpost',[ApiController::class,'addpost']);
Route::post('/resubmitpost',[ApiController::class,'resubmitpost']);
Route::get('/relatedpost',[ApiController::class,'relatedpost']);
Route::post('/likepost',[ApiController::class,'likepost']);
Route::post('/unlikepost',[ApiController::class,'unlikepost']);
Route::post('/relatedpost',[ApiController::class,'relatedpost']);


Route::get('/getmylikeditems/{id}',[ApiController::class,'getmylikeditems']);
Route::get('/getfollowing/{id}',[ApiController::class,'getfollowing']);
Route::get('/getdashboardcounter/{id}',[ApiController::class,'getdashboardcounter']);

Route::post('/followuser',[ApiController::class,'followuser']);
Route::post('/unfollowuser',[ApiController::class,'unfollowuser']);

Route::post('/addrating', [ApiController::class,'postStar']);

Route::post('/addcomment',[ApiController::class,'addcomment']);
Route::get('/getcomment/{postid}',[ApiController::class,'getcomment']);


Route::get('/getnoti/{userid}',[ApiController::class,'getnoti']);
Route::get('/geteducation/{userid}',[ApiController::class,'geteducation']);
Route::get('/deleteeducation/{id}',[ApiController::class,'deleteeducation']);
Route::post('/addeducation',[ApiController::class,'addeducation']);
Route::get('/getworkhistory/{userid}',[ApiController::class,'getworkhistory']);
Route::get('/deleteworkhistory/{id}',[ApiController::class,'deleteworkhistory']);
Route::post('/addworkhistory',[ApiController::class,'addworkhistory']);
Route::post('/changepassword',[ApiController::class,'changepassword']);

Route::get('/getuserposts/{userid}',[ApiController::class,'getuserposts']);

Route::get('/getalluser',[ApiController::class,'getalluser']);


Route::post('/addwatchlist',[ApiController::class,'addwatchlist']);
Route::post('/removewatchlist',[ApiController::class,'removewatchlist']);
Route::get('/getwatchlist/{userid}',[ApiController::class,'getwatchlist']);

Route::post('/update_playerid',[ApiController::class,'update_playerid']);
Route::post('/filterpost',[ApiController::class,'filterpost']);


Route::get('markallasread/{id}', [ApiController::class,'markallasread']);
Route::get('markasread/{postid}/{userid}', [ApiController::class,'markasread']);
Route::post('/filteruser',[ApiController::class,'filteruser']);
