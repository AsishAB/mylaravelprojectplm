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
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    public function contact_us(Request $request){
      
        $cu_full_name = $request->cu_full_name;
        $cu_email     = strtolower($request->cu_email);
        $cu_message   = $request->cu_message;
        date_default_timezone_set("Asia/Kolkata"); 
        $cu_received_dt         =   date("Y-m-d,H:i:s ");
      
      
      do{
        $cu_ticketid1 = mt_rand(1,1000000);
        $cu_ticketid2 = mt_rand();
        $cu_ticketid = $cu_ticketid1.'-'.$cu_ticketid2;
        $msgid = DB::table('contactus')->where('ticketid', $cu_ticketid)->get();
      }while(!empty($msgid->count()));
      
      $data= array(
        'ticketid'=>$cu_ticketid,
          'name'=> $cu_full_name,
          'email'=> $cu_email,
          'cumessage'=> $cu_message
      );
      
      DB::table('contactus')->insert([
          'ticketid'=>$cu_ticketid,
          'name'=>$cu_full_name, 
          'email'=>$cu_email,
           'message'=>$cu_message,
           'asked_on'=>$cu_received_dt 
       ]);
        // $msg_id = DB::table('contactus')->where('email',$cu_email)->first('id');
         DB::SELECT('CALL check_account_existance(?)',array( $cu_email));
         DB::SELECT('CALL cust_reply(?,?)',array($cu_email,0));
      
       
          $when = now()->addMinutes(10);
      
          Mail::to($data['email'])
          ->cc('asish24in@gmail.com')
          ->later($when, new ContactUsMessage($data));
      
      //   Mail::send('emails.home',$data,function ($message) use($data){
      //    $message->from('asishbishoi2442@gmail.com');
      //    $message->to($data['email'])->subject('New Message Received.');
      // });
         
          return response()->json(
            ['success'=>true,
              'message'=>"Message received"
            ]);
      
        
       
        
       
      
          }//contact_us ends  
          public function contact_admin(Request $request){
            $ad_userid  = $request->ad_userid;
            $ad_name    = $request->ad_name;
            $ad_email   = $request->ad_email;
            $ad_role    = $request->ad_role;
            $ad_mobno   = $request->ad_mobno;
            $ad_msg     = $request->ad_msg;
            date_default_timezone_set("Asia/Kolkata"); 
           $ad_received_dt         =   date("Y-m-d,H:i:s ");
      
            do{
              $ad_ticketid1 = mt_rand(1,1000000);
              $ad_ticketid2 = mt_rand();
              $ad_ticketid = $ad_ticketid2.'-'.$ad_ticketid1;
              $id = DB::table('contact_admin')->where('ad_ticketid', $ad_ticketid)->get();
            }while(!empty($id->count()));
      
             DB::table('contact_admin')->insert([
              'ad_ticketid'=>$ad_ticketid,
              'ad_userid'=>$ad_userid,
              'ad_name'=>$ad_name, 
              'ad_email'=>$ad_email,
               'ad_role'=>$ad_role,
               'ad_mobno'=>$ad_mobno,
               'ad_msg'=>$ad_msg,
               'ad_askedon'=>$ad_received_dt, 
           ]);
      
             return response()->json(
            ['success'=>true,
              'message'=>"Message received by Admin"
            ]);
            
        }  
      
}
