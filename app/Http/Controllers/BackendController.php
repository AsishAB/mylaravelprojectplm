<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Mail\ContactUsMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use App\Events\NewNotificationEvent;

class BackendController extends Controller
{
    public function viewMessages(){
    	if(Gate::any('manage-users','manage-contact-msg')){
    	$messages = DB::table('contactus')->get();
    	return view('contactbackend')->with('messages',$messages);
   		}
   		abort(403,"Only Admin or Support users can access this page");

    }


    public function eachMessage($msgid){
    	if(Gate::any('manage-users','manage-contact-msg')){
    	$id = $msgid;
    	$msg = DB::table('reg_cust_msg')->where('msg_id',$id)->orderBy('id','asc')->get();
    	return view('backend_reply')->with('msg',$msg)->with('msgid',$id);
        } 
        abort(403,"Only Admin or Support users can access this page");

    }


    public function backendreply(Request $request){
    	if(Gate::any('manage-users','manage-contact-msg')){
    	$id = $request->backend_message_id;
    	$backend_message = $request->backend_message;
    	date_default_timezone_set("Asia/Kolkata"); 
  		$r_time          =   date("Y-m-d,H:i:s ");
    	DB::table('reg_cust_msg')->where('msg_id',$id)->update(['backend_reply'=>$backend_message,'backend_reply_on'=>$r_time]);
       return response()->json([
          'success'=>true,
          'message'=>"backend replied",
       ]);
        } 
        abort(403,"Only Admin or Support users can access this page");
    }


    public function ticketSolved(Request $request){
    	if(Gate::any('manage-users','manage-contact-msg')){
    	$ticketid = $request->ticketid;

    	DB::table('contactus')->where('ticketid',$ticketid)->update(['status'=>"solved"]);
    	DB::table('reg_cust_msg')->where('msg_id',$ticketid)->update(['status'=>"solved"]);

    	return response()->json([
           'success'=>true,
           'status'=>"marked as resolved",
    	]);
    	} 
        abort(403,"Only Admin or Support users can access this page");
    }


    public function allUsers(){
    	if(Gate::allows('manage-users')){
    	$p = 0;
       $users = DB::table('users')->orderBy('id','asc')->get();
        

      return view('allusers')->with('users',$users)->with('p',$p);
  		}
  		abort(403, "This Page is only available for Admin");
    }


    public function viewSendNotf(Request $request){
    	if(Gate::allows('manage-users')){
    		$userid = $request->id;
    		$user = DB::table('users')->where('id',$userid)->first();
    	   return view('notify-users',compact('user'));
  		}
  		abort(403, "This Page is only available for Admin");
    }

    public function sendNotf(Request $request){
     if(Gate::allows('manage-users')){
      $user = Auth::user();
      $userid = $request->userid;
      $notf = $request->notf;
      $priority = $request->priority;

       DB::table('notifications')->insert(['user_id'=>$userid,'notf_message'=>$notf,'priority'=>$priority,'date_created'=>now()]);
       DB::select('CALL notification_tbl(?)',array($userid));
     
         $data = $user->noofnotification;
      event(new NewNotificationEvent($data));
        return response()->json([
           'success'=>true,
           'msg'=>"User Notified",
       ]);


      
    }
         abort(403, "This Page is only available for Admin");
    }
    public function adminEmail(){
       if(Gate::allows('manage-users')){
        $adminmsg = DB::table('contact_admin')->orderBy('id','asc')->get();
          return view ('admin-email')->with('adminmsg',$adminmsg);
       }
        abort(403, "This Page is only available for Admin");  
    }
    public function cngStatus(Request $request){
      if(Gate::allows('manage-users')){
          $y = $request->y;
          $ticketid = $request->ad_ticketid;
           
           $msg = DB::table('contact_admin')->where('ad_ticketid',$ticketid)->first();

          if($y == 1){
            DB::table('contact_admin')->where('ad_ticketid',$ticketid)->update(['ad_status'=>1]);
            $msg = "Ticket marked as solved. Page will be reloaded";
          }
           else if($y == 0){
            DB::table('contact_admin')->where('ad_ticketid',$ticketid)->update(['ad_status'=>0]);
            $msg = "Ticket marked as not solved. Page will be reloaded";
          }
          return response()->json([
             'success'=>true,
             'msg'=>$msg,
             'y'=>$y,
          ]);
      }
      abort(403, "This Page is only available for Admin");  
    }
}
