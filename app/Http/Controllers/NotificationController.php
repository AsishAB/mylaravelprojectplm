<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationController extends Controller
{
    public function viewNotf(Request $request){
    	if(Auth::check()){
    		
    		$userid = Auth::user()->id;
             
    		// DB::table('notifications')->where('user_id',$userid)->update(['notf_status'=>1]);
    		// DB::select('CALL notification_tbl(?)',array($userid));
    		$notf = DB::table('notifications')->where('user_id',$userid)->where('notf_hidden','!=',1)->get();
            $p = $notf->count();
             return view('view-notifications')->with('notf',$notf)->with('p',$p);
        }

    }
    public function notfAction(Request $request){
      if(Auth::check()){
      $userid = $request->userid;
      $notfaction = $request->notfaction;

      if($notfaction == 1 ){
        DB::table('notifications')->where('user_id',$userid)->update(['notf_hidden'=>1]);
        DB::select('CALL notification_tbl(?)',array($userid));
        return response()->json([
            'success'=>true,
            'message'=>"All notifications cleared. To see all notifications again, please contact an admin",
        ]);
      }
      else if($notfaction == 2){
        DB::table('notifications')->where('user_id',$userid)->update(['notf_status'=>1]);
        DB::select('CALL notification_tbl(?)',array($userid));
        return response()->json([
            'success'=>true,
            'message'=>"All notifications marked as read",
        ]);
      }
      else if($notfaction != 1 || $notfaction != 2){
            return response()->json([
            'success'=>true,
            'message'=>"No action detected",
        ]);
      }

      }
    }
}
