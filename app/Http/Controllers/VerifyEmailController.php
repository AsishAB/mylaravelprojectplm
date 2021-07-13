<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AccountNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmailMail;

class VerifyEmailController extends Controller
{
    public function verifyEmail(Request $request){
        $v_email= $request->email;
        $token1= md5($v_email);
        $token2=Str::random(20);
        $token = $token2.'_'.$token1;
        date_default_timezone_set("Asia/Kolkata"); 
          $v_time           =   date("Y-m-d,H:i:s ");
          $v_date =  date('Y-m-d', strtotime("+15 days"));
       
  
          $user = DB::table('users')->where('email', $v_email)->first();
          if (is_null($user)) {
           return response()->json([
               'success'=>false,
               'action' =>2,
               'title'=>"No user found",
               'message'=>"Please check your email and try again"
            ]);
                   }
          elseif($user->email_verified === 1){
             return response()->json([
               'success'=>false,
               'action' =>1,
               'message'=>"No more action needed for this",
               'title' =>"Email already verified"
            ]);
  
  
          }
        else{
        DB::table('verify_email')->updateOrInsert(
          ['v_email' => $v_email],
          ['v_token'=>$token,'v_requested_on'=>$v_time,'v_expire_on'=>$v_date]);
  
    
  
        DB::select('CALL emailverified(?,?)',array($v_email,0));
  
  
        $link = "localhost/LaraTest/public/verifymail/email/".$v_email."/".$token;
        $data = array(
                'email'     => $v_email,
                'link'      =>  $link
             );
         Mail::to($v_email)->send(new VerifyEmailMail($data));
          return response()->json([
               'success'=>true,
               
               'message'=>"Instructions to verify your email is sent successfully",
               'title' =>"Please check your inbox"
            ]);
  
        }
  
      }
  
  
  
      public function viewEmailVerified($email, $token){
            $data = "Invalid request";
  
          $user = DB::table('users')->where('email', $email)->first();
  
          if (is_null($user)) {
              $data = "This user is either not registered or has deleted the account";
          
                   }
             else{
                  $emailver= DB::table('verify_email')->where('v_email',$email)->first();
  
                   if(!(is_null($emailver))){
                  if($email === $emailver->v_email){
                      if($token===$emailver->v_token){
                          DB::table('verify_email')->where('v_email',$email)->delete();
                          DB::select('CALL emailverified(?,?)',array($email,1));
                          $data = "Email Verified Successfully . ";
                    }else{
                      $data = "Email/Token Mismatch. Please try again ";
                  }
                   }else{
                      $data = "Email/Token Mismatch. Please try again ";
                  }
             }else{
  
                 $data =  "The link has expired. Plese re-try the verification process ";
             }
              
  
           return view('verifymail',compact('data'));
        
                  }
  
          }
}
