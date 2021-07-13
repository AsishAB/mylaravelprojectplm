<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AccountNotification;

class userController extends Controller
{
    public function edit_user_form(Request $request){
        $p = $request->p;
        return view('edit_user',compact('p'));
       
     }
 
 public function getStateList(Request $request)
          {
           $ctryid=DB::table("countries")
                     ->where("countryname",$request->countryname)
                     ->pluck("countryid");
         $states = DB::table("states")
                     ->where("country_id",$ctryid)
                     ->pluck("statename","stateid");
         return response()->json($states);
           }
          
           public function getCityList(Request $request)
                {
                 $steid=DB::table("states")
                     ->where("statename",$request->statename)
                     ->pluck("stateid");
         $cities = DB::table("cities")
                     ->where("state_id",$steid)
                     ->pluck("cityname","cityid");
         return response()->json($cities);
                  }
     
 
   public function insert_user(Request $request){
      //print_r('hiuhiuhiu');exit;
   $r_first_name     = $request->first_name;
   $r_last_name      =   $request->last_name;
   $r_email          =   strtolower($request->email);
   $r_password       =   Hash::make($request->password, [
                        'memory' => '1024',
                        'time' =>  '2',
                        'threar' =>  '2',
                   ]);
   $r_confirm_password  =   Hash::make($request->password, [
                        'memory' => '1024',
                        'time' =>  '2',
                        'threar' =>  '2',
                   ]);
   $r_mobno          = $request->mobno;
   $r_dob            = $request->dob;
   $r_gender         = $request->gender;
   $r_address        = $request->address;
   $r_country        = $request->country;
   $r_state          = $request->state;
   $r_city           = $request->city;
   $r_pincode        = $request->pincode;
   $emver            = $request->emver;
   date_default_timezone_set("Asia/Kolkata"); 
   $r_time           =   date("Y-m-d,H:i:s ");
   $form_type =     $request->form_type;
 
   // $r_first_name     = $request->first_name;
   // $r_last_name      =   $request->last_name;
   // $r_email          =   $request->email;
   // $r_email       =   $request->password;
   // $confirm_password   =   $request->confirm_password;
   // $mobno        = $request->mobno;
   //   $dob        = $request->dob;
   // $gender       = $request->gender;
   // $address      = $request->address;
   // $country      = $request->country;
   // $state          = $request->state;
   // $city           = $request->city;
   // $pincode        = $request->pincode;
   
   // $time       =   $request->dt;
   
 if($emver == 'yes'){
   return redirect()->action(
     'VerifyEmailController@verifyEmail', ['email' => $r_email ]
     );
 }
 
 if($form_type==1){
 
  $messages=[
     
 
       'required'        =>   "The :attribute field is required",
       'email.email'       =>    "The :attribute :input format should be example@example.com/.in/.edu/.org....",
        'email.unique'       =>   "The :attribute :input is taken. Please use another email address",
        'confirm_password.same'  =>   "Password and Confirm password fields must match exactly",
        'mobno.digits'           =>    "The :attribute  field accepts only numbers",
        'mobno.digits:10'    =>    "The :attribute should be 10 digits long",
        'dob.date_format'      =>    "The date format :input should be YYYY-MM-DD",
        'address.string'         =>    "The :attribute :input must be in the form of a string",
        'state.required'      => "The :attribute field is required. Select or reselect from the country dropdown to select state",
        'city.required'        =>   "The :attribute field is required. Select or reselect from the state dropdown to select city"
 
  
 ];
 
 
 $rules = [
       
               'first_name'         =>      'required',
               'last_name'          =>      'required',
               'email'              =>    'required|email|unique:users',
               
               'password'           =>      'required|min:8',
               'confirm_password'   =>      'required|min:8|same:password',
               'mobno'              =>      'required|digits:10',
               'dob'                =>      'required|date|date_format:Y-m-d',
               'gender'             =>      'required',
               'address'            =>      'required|string',
               'country'            =>       'required',
               'state'              =>       'required',
               'city'               =>       'required',
               'pincode'            =>       'required'
   
  
 ] ;
 
 $validate =  Validator::make($request->all(),$rules,$messages);
  
 
  if($validate->fails()){
   return back()->withInput()->withErrors($validate->messages());
  }
 
   //   $r_first_name     = $request->first_name;
   // $r_last_name      =   $request->last_name;
   // $r_email          =   strtolower($request->email);
   // $r_password       =   Hash::make($request->password, [
   //                      'memory' => '1024',
   //                      'time' =>  '2',
   //                      'threar' =>  '2',
   //                 ]);
   // // $confirm_password  =   $request->confirm_password;
   // $r_mobno          = $request->mobno;
   //   $r_dob          = $request->dob;
   // $r_gender         = $request->gender;
   // $r_address        = $request->address;
   // $r_country        = $request->country;
   // $r_state          = $request->state;
   // $r_city           = $request->city;
   // $r_pincode        = $request->pincode;
   // $emver            = $request->emver;
   // date_default_timezone_set("Asia/Kolkata"); 
   // $r_time           =   date("Y-m-d,H:i:s ");
 
       // $users = new Newuser();
 
       // $users->first_name = $first_name; 
       // $users->last_name = $last_name; 
       // $users->email = $email; 
       // $users->password = $password; 
       // $users->mobno = $mobno; 
       // $users->dob = $dob; 
       // $users->gender = $gender; 
       // $users->address = $address; 
       // $users->country = $country; 
       // $users->TIME_STAMP = $time; 
       // $users->save();
     $act =  "INSERT";
   DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
     array($act,0,$r_first_name,$r_last_name,$r_email,$r_password,$r_mobno,$r_dob,$r_gender,$r_address,$r_country,$r_state,$r_city, $r_pincode,$r_time));
 
 return redirect()->back()->with('message',"User Registered Successfully");
 
 }else{
    $act =  "INSERT";
   DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
     array($act,0,$r_first_name,$r_last_name,$r_email,$r_password,$r_mobno,$r_dob,$r_gender,$r_address,$r_country,$r_state,$r_city, $r_pincode,$r_time));
   //Notification new account success
    // $data = array(
    //  'nactivity' =>  "Registeration Successful! Welcome",
    //  'nname'=> $r_first_name+" "+$r_last_name,
    //  'nmessage1'=>"New User created successfully. You may login to your account by clicking on the button below",
    //  'nmessage2'=>"If you don't remember signing up for an account with us, please Contact Us right away",
    //  'nbutton'=>"Login Now",
    //  'nlink' =>'/LaraTest/public/login'
    //  ); 
    //  // Send a notification
    // Notification::route('mail',$r_email)->notify(new AccountNotification($data));
 
 
 
   return response()->json(
             [
                 'success' => true,
                 
             ]
         );
   }
 
 }
 
 public function edituser_email(Request $request){
    if(Auth::check()){
          $u_id            =   $request->id; 
          $u_email         =   strtolower($request->email);
          date_default_timezone_set("Asia/Kolkata"); 
          $u_time         =   date("Y-m-d,H:i:s ");
          
          DB::table('users')->where('id',$u_id)->update(['email'=> $u_email,'updated_at'=>$u_time,'email_verified'=>0]);
          return response()->json([
             'success'=>true,
          ]);
     }
 
 }
  public function edituser_password(Request $request){
     $rp_id = $request->rp_id;
     $rp_old_password = $request->rp_current_password;
     $rp_new_password =$request->rp_new_password;
     $rp_confirm_password = $request->rp_confirm_password;
       date_default_timezone_set("Asia/Kolkata"); 
   $rp_time         =   date("Y-m-d,H:i:s ");
 if(Auth::check()){
   $act= "SELECT";
     $users = DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
             array($act,$rp_id,"","","","",0,$rp_time, "","","","","","",$rp_time));
 
 
 foreach($users as $user){
   if(Hash::check($rp_old_password,$user->password)){
           $act5="UPDATE_PASSWORD";
           $rp_password = Hash::make($rp_confirm_password, [
                        'memory' => '1024',
                        'time' =>  '2',
                        'threar' =>  '2',
                   ]);
           if($rp_password===$user->password){
             return response()->json([
             'success'=>false,
             'action'=>4,
             'message' =>"Current password and new password are same. Please try a different new password"
          ]);
           
         }else{ 
           DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array($act5,$rp_id,"","","",$rp_password,0,$rp_time,"","","","","","",$rp_time));
            
     //        $data = array(
     // 'nactivity' =>  "Password changed successfully",
     // 'nname'=> $user->full_name,
     // 'nmessage'=>"Password changed successfully. You can login now by clicking on the button below",
     // 'nbutton'=>"Login Now",
     // 'nlink' =>'/LaraTest/public/login'
     // ); 
     
     // Send a notification $user must be an object
     // Notification::send($user,(new AccountNotification($data)));
           
          //   Notification::route('mail',$user->email)->notify(new AccountNotification($data));
          // return response()->json([
          //    'success'=>true,
          //    'message' =>"Password changed successfully"
          // ]);
           return response()->json([
             
             'success'=>true,
             'message' =>"Password changed."
          ]);
 
 
        }
   }else{
 
     return response()->json([
             'action'=>2,
             'success'=>false,
             'message' =>"Password did not match our records."
          ]);
 
      }
 
   }//foreach ends
 }//auth::check ends
 else{
   return response()->json([
             'action'=>3,
             'success'=>false,
             'message' =>"Unauthenticated user. Login to continue"
          ]);
 
 
 }
 
 
 }
 public function edituser_opd(Request $request){
    if(Auth::check()){
          $u_id            =   $request->id; 
          $u_mob           =   $request->mobno;
          $u_dob           =   $request->dob;
          $u_gender        =  $request->gender;
          date_default_timezone_set("Asia/Kolkata"); 
          $u_time         =   date("Y-m-d,H:i:s");
          
          DB::table('users')->where('id',$u_id)->update(['mobno'=> $u_mob,'DOB'=>$u_dob,'gender'=>$u_gender,'updated_at'=>$u_time]);
            return response()->json([
             'success'=>true,
          ]);
     }
 
 }
 
 public function edituser_ld(Request $request){
    if(Auth::check()){
          $u_id            =   $request->id; 
          $u_address         =  $request->address;
          $u_country             = $request->country;
          $u_state         =       $request->state;
          $u_city          =         $request->city;
          $u_pincode       =       $request->pincode;
          date_default_timezone_set("Asia/Kolkata"); 
          $u_time         =   date("Y-m-d,H:i:s ");
 
          DB::table('users')->where('id',$u_id)->update(['address'=> $u_address,'country'=>$u_country,'state'=>$u_state, 'city'=>$u_city ,'pincode'=>$u_pincode,'updated_at'=>$u_time]);
 
            return response()->json([
             'success'=>true,
          ]);
     }
 
 }
 public function edituser_pd(Request $request){
    if(Auth::check()){
          $u_id            =   $request->id; 
          $u_first_name     = $request->first_name;
          $u_last_name        = $request->last_name;
          date_default_timezone_set("Asia/Kolkata"); 
          $u_time         =   date("Y-m-d,H:i:s ");
          
          DB::table('users')->where('id',$u_id)->update(['first_name'=> $u_first_name,'last_name'=>$u_last_name,'updated_at'=>$u_time]);
 
            return response()->json([
             'success'=>true,
          ]);
     }
 
 }
 
 public function edituser_pic(Request $request){
   if(Auth::check()){
           $u_id = $request->id; 
         if($request->hasFile('mypic')){
           $path = Storage::disk('public')->put('profile_image',$request->mypic);
           
               $profilepic = $path;
             
               DB::table('users')->where('id',$u_id)->update(['profilepic'=>$profilepic]);
          return response()->json([
             'success'=>true,
             'status'=>'Path available',
             'path'=>$profilepic,
          ]);
 
          }else{
             $profilepic='';
             DB::table('users')->where('id',$u_id)->update(['profilepic'=>$profilepic]);
 
          return response()->json([
             'success'=>true,
             'status'=>'No path detected',
             'path'=>$profilepic,
          ]);
          }
            
          
      }
    }
 
 public function edit_user(Request $request){
 
 
          if (Auth::check()) {
      $u_id            =   $request->id;   	 
   
     $u_first_name			=	$request->first_name;
     $u_last_name			= 	$request->last_name;
     $u_email    			= 	strtolower($request->email);
     // $u_password             =   $request->password;
     $u_mobno				=	$request->mobno;
    $u_dob					=	$request->dob;
     $u_gender 				=	$request->gender;
     $u_address 				=	$request->address;
     $u_country 				=	$request->country;
   $u_state        = $request->state;
   $u_city        = $request->city;
   $u_pincode        = $request->pincode;
     date_default_timezone_set("Asia/Kolkata"); 
     $u_time					= 	date("Y-m-d,H:i:s ");
       $act4 	= "UPDATE";
 
       DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array($act4,$u_id,$u_first_name,$u_last_name,$u_email,"",$u_mobno,$u_dob,$u_gender,$u_address,$u_country,$u_state,$u_city,$u_pincode,$u_time));
 
    //   $data = array(
    //  'nactivity' =>  "Account details changed",
    //  'nname'=> $u_first_name  +" "+$u_first_name,
    //  'nmessage'=>"Your account details have been changed successfully",
    //  'nbutton'=>"Login Now",
    //  'nlink' =>'/LaraTest/public/login'
    //  ); 
    //  // Send a notification
    // Notification::route('mail',  $u_email)->notify(new AccountNotification($data));
          return response()->json(
             [
                 'success' => true,
                 
             ]
         );
   
      } //if (Auth::check()) statement ends here
  } //edit_user() function ends here 
 
 
 public function delete_user(Request $request){
     
     // echo "action";exit;
     $user=Auth::user();
      
     $d_id =  $request->d_id;
     $d_email = $request->d_email;
     $d_full_name=$request->d_full_name;
     $d_password   =   $request->d_password;
         // print_r($d_password);exit;									
     date_default_timezone_set("Asia/Kolkata"); 
     $d_time					= 	date("Y-m-d,H:i:s ");
 
     // print_r($request->all());exit;
 
     if (Auth::check()) {
     // Check if the full name and password are correct
 $act =  "SELECT";
 
     $user_login =  DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array($act,0,"","",$d_email,"",0,$d_time, "","","","","","",$d_time));
     // print "<pre>"; print_r($user_login);exit;
    if(is_null($d_full_name) || is_null($d_password)){
        return response()->json([
                'success'=>false,
                'action'=>0,
                 'message'=>"Name or Password cannot be blank"
 
    
                    ]); 
    }else{
     // Delete Action
     foreach($user_login as $loguser){
 
    if($d_email===$loguser->email && $d_full_name===$loguser->full_name){
 
         if (Hash::check($d_password,$loguser->password)){
    
                 $act2 = "DELETE";
 
               DB::select('CALL my_stored_procedures(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
                 array($act2,$d_id,"","","","",0,$d_time, "","","","","","",$d_time));
                 return response()->json([
                'success'=>true,
                   ]); 
                             
                      Auth::logout();
                         Session::flush();
        
         // return redirect('login');
         
                }else{
                    // $data['success']=false;
                    
                        // $action==0;//Password is wrong
                    return response()->json(
             [
                 'success'=>false,
                 'action'=>1,
                 'message'=>"Name or Password is not correct"
                 
             ]
         );
                    
                    }
           }else{
               return response()->json(
             [
               'success'=>false,
               'action'=>1,
                 'message'=>"Name or Password is not correct"
                 
             ]
                 );
                     
                }
        }//foreach ends
    }
 
  
 //auth::check ends
 
          } else{
              return response()->json(
             [
                 'success'=>false,
                 'action'=>2,
                 'message'=>"Unauthenticated User! Please re-login to continue"
                 
             ]
                 );
                     
                    
           }
 } //delete_user ends here  
    
 
 public function contactmessage(Request $request){
 
       if(Auth::check()){
         // $messages['msg']  =  DB::table('contactus')->where('email',Auth::user()->email)->pluck('id','message','asked_on','answered_on');
          $messages['msg']  =  DB::table('reg_cust_msg')->where('reg_email',Auth::user()->email)->get();
          
 
         return view('contactmessages')->with($messages);
       }
 
 
   }
 
 
 public function showusermessages($id){
   if(Auth::check()){
   $messageresp['msgs'] = DB::table('reg_cust_msg')->where('msg_id',$id)->get();
 
     return view('usermessage')->with($messageresp); 
   }
    
 }
 public function storeuserreply(Request $request){
    if(Auth::check()){
     // $msgid =   $request->msgid;
    $messagereply =   $request->reply_message;
    $message_id  =    $request->message_id;
    date_default_timezone_set("Asia/Kolkata"); 
       $time         =   date("Y-m-d,H:i:s ");
       
       DB::table('reg_cust_msg')
         ->where('msg_id',$message_id)
         ->insert(['msg_id'=>$message_id,'cust_reply'=> $messagereply,'cust_reply_on'=>$time]);
 
         
 
         return response()->json([
 
           'success'=>true,
           'message'=>"Message Received"
         ]);
       }
     }
 
     public function viewProfile(){
      if(Auth::check()){
      return view('profile');
      }else{
      return redirect()->route('login');
 
      }
 
 
     }
}
