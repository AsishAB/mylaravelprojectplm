<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AccountNotification;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function viewforgotpassword(){

        if(Auth::check()){
          Auth::logout();
          Session::flush();
          return redirect()->route('forgotpassword');
          
       
        }else{
           
            return view('forgotpassword');
         
        }
       
       }
       public function forgotpassword(Request $request){
           $fp_email  =  $request->fp_email;
           $token1=   md5($fp_email);
           $token2 =   Str::random(60);
           $fp_token = $token1."_".$token2;
             date_default_timezone_set("Asia/Kolkata");
             $fp_time         =   date("Y-m-d,H:i:s ");
       
       
           $user = DB::table('users')->where('email', $fp_email)->first();
           // echo $user;
           
           if (is_null($user)) {
                return response()->json([
                    'success'=>false,
                    'action' =>2,
                    'message'=>"No user found"
                 ]);
       
                  
                }else{
                  $link = 'localhost/LaraTest/public/reset/' . $fp_token . '/email/' . urlencode($fp_email);
                   // $link = config('localhost/LaraTest/public').'localhost/LaraTest/public/reset/' . $fp_token . '?email=' . urlencode($fp_email);
                 
                 //Create Password Reset Token
                       DB::table('password_resets')->
                             updateOrInsert(['email' => $fp_email],['password_r_token'=>$fp_token,'request_dt'=> $fp_time ]);
                    //Send email
                     
                     $data = array(
                     'fullname'  => $user->full_name,
                     'email'     => $fp_email,
                     'link'     =>  $link
                  );
                   // Mail::to($fp_email)->send(new ForgotPasswordMail($data));
                   
                  return response()->json([
                    'success'=>true,
                    
                    'message'=>"Check email"
                 ]);
       
                }
        
       
            }//function ends
       
       
       public function viewresetpassword($token,$email=null){     
            
            return view('resetpassword', compact('token', 'email'));    
       }
       
       public function resetpassword(Request $request){
            
             $rp_email  = $request->rp_email;
             $rp_confirm_password  = Hash::make($request->rp_confirm_password, [
                              'memory' => '1024',
                              'time' =>  '2',
                              'threar' =>  '2',
                         ]);
             $rp_token =  $request->p_resettoken;
             date_default_timezone_set("Asia/Kolkata");
             $rp_time         =   date("Y-m-d,H:i:s ");
       
       
             $user =  DB::table('password_resets')->where('email', $rp_email)->first();
             // echo $user->password_r_token;
             
               if($user->password_r_token===$rp_token){
       
               $reguser  = DB::table('users')->where('email',$rp_email)->first();
               if(is_null($reguser)){
                 return response()->json([
                   'success' => false,
                   'message' =>"User does not exist",
                   'action'  =>1
       
                 ]);
               }else{
                  $act5="UPDATE_PASSWORD";
                  DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array($act5,0,"","",$rp_email,$rp_confirm_password,0,$rp_time,"","","","","","",$rp_time));
                 
       
                  DB::table('password_resets')->where('email', $rp_email)->delete();
                   $data = array(
                 'nactivity' =>  "Password Changed",
                 'nname'=> $reguser->full_name,
                 'nmessage1'=>"You have successfully reset your password.",
                 'nmessage2'=>"If it wasn't you, change your password immediately or Contact Us",
                 'nbutton'=>"Reset Password",
                 'nlink' =>'/LaraTest/public/forgotpwd'
                 ); 
               // Send a notification
              Notification::route('mail',$rp_email)->notify(new AccountNotification($data));
                 
                return response()->json([
                   'success' => true,
                   'message' =>"Password changed",         
                       ]);
                
                }
                 
                 }else{
                 return response()->json([
                   'success' => false,
                   'message' =>"Token Mismatch.",
                   'action' => 2
       
                 ]);
               }
               
             
             
             }
}
