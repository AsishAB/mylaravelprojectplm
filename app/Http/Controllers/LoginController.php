<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AccountNotification;
use App\Events\NewNotificationEvent;

class LoginController extends Controller
{
    public function pusher(){
      
        event (new NewNotificationEvent("Hello World")); 
      }
      public function loginPage(){
          return view('login-page');
      }
  
      public function checkemail(Request $request){
        $email   =   $request->email;
         $users= DB::table('users')->where('email',$email)->first();
  
          if($users){
               return response()->json(['success'=>false]);
              } else{
              return response()->json(['success'=>true,'message'=>"Email available"]);
          }
      }
      
  public function loginUser(Request $request){
      // echo "hello";exit;
       
       $loginemail     =    $request->login_email;
       $loginpassword  =    $request->login_password;
       $login_dt       =    $request->login_dt;
       $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
      
      $messages     =     [
                    
                    'login_email.required' 		  =>   'Email/Username field is required',
                    'login_password.required'   =>   'Password field is required' ,
                    'login_email.email'  			  =>   'The email/username format should be example@example.com'
  
  
      ];
   
  
      $rules   =    [
  
          'login_email'      =>    'required|email',
          'login_password'   =>    'required'
  
  
   
      ];
   
  
    $validate   =     Validator::make($request->all(), $rules, $messages);
  
     // If fields are empty
    if($validate->fails()){
        return back()-> withInput()->withErrors($validate->messages());
    
    }
     $user_data  =    array(
       'email'     =>    $loginemail,
       'password'  =>   $loginpassword 
       
  
     );
     if(Auth::attempt($user_data,$remember_me)){
      // $user = User::where('email', '=', Input::get('login_email'));
  // if (User::where('email', '=', Input::get('email'))->count() === 0) {
  //        return back()->with('error', 'Username does not exist');
  //     }else{
          
            // login notification
     //        $data = array(
     //  'nactivity' =>  "Someone accessed your account",
     //  'nname'=> Auth::user()->full_name,
     //  'nmessage1'=>"Someone logged into your account. If it was you, you can ignore this mail safely. ",
     //  'nmessage2'=>"Or else, change your password immediately or Contact Us",
     //  'nbutton'=>"Reset Password",
     //  'nlink' =>'/LaraTest/public/forgotpwd'
     //  ); 
     //  // Send a notification
     // Notification::route('mail',Auth::user()->email)->notify(new AccountNotification($data));
            
  
           return redirect()->intended('dashboard');
           
         
     }
   
     else{
      return back()->with('error', 'Username and Password do not match');
     }
  
   }
  
   public function dashboard(){
           
           if(Auth::check()){
              return view('welcome_user');
           }   
  
  
   }
  public function logoutsuccess(){
    $user = DB::table('users')->where('email',auth()->user()->email)->first();
    if(!(is_null($user->remember_token))){
      DB::table('users')->where('email',auth()->user()->email)->update(['remember_token'=>'']);
    }
    Auth::logout();
    Session::flush();
    
  
    return redirect('login');
    
    
    // PreventBackHistory.php middleware and registered in Kernel.php $routeMiddleware to prevent logging in after clicking back button in browser
  }
   public function viewchangepassword(){
   
    if(Auth::check()){
     return view('changepassword');
  
    }
  
  
   }
}
