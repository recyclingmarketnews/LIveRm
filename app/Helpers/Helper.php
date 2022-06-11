<?php
namespace App\Helpers;
use Auth;
use DB;
class Helper{
    public static function UserHasLikePost($postid)
    {
        $totallike = DB::table('likes')->where('userid',Auth::user()->id)->where('postid',$postid)->count();
        return $totallike;
    }
}