<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AccountNotification;

class NewUserController extends Controller
{
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



      // Single Step Signup
     public function new_user_reg(){
  if(!Auth::check()){
$countryname = DB::table('countries')->get();
// $statename = DB::table('indian_state')->get();
// $cityname = DB::table('indian_city')->get();

 return view('new_user')
  -> with('countryname', $countryname);
      
}else{
  Auth::login();
    }
}


// Multi Step Signup
    public function new_user1(){
    if(!Auth::check()){
    $countryname = DB::table('countries')->get();
    // $statename = DB::table('indian_state')->get();
    // $cityname = DB::table('indian_city')->get();

    return view('signup_p')
    -> with('countryname', $countryname);
        
    }else{
    Auth::login();
        }
    }


    public function checkrefno(Request $request){
    $reference = $request->refno;
    $tuser = DB::table('temp_users')->where('referenceno',$reference)->first();
    if(is_null($tuser)){
        return response()->json([
            'success' =>false,
            'message' => "Invalid Reference No. Please enter a valid one"
        ]);     

        }else{
        return response()->json([
                'success' =>true,
                'message' => "Valid Reference"
            ]);  
        }
    }

    // Multi Page Signup with reference no
    public function new_user2(Request $request){
    if(!Auth::check()){
        $reference = $request->refno;
        if((is_null($reference))){

                $ref1   =  mt_rand(10,1000);
                $ref2   =  mt_rand();
                $reference    =  $ref1."-".$ref2;  
            return view('multipage_email')->with('ref',$reference);
    } else{
            $tuser = DB::table('temp_users')->where('referenceno',$reference)->first();
                // return view('multipage1',compact('tuser'));
            
                    return view('multipage_email',compact('tuser'));
                }
            }else{
            $user = Auth::user();
            Auth::login($user);
            }
    }
    public function mp_password_show(Request $request){
    $refno  =   $request->refno;
    $email  =   $request->email;

    $emexist = DB::table('temp_users')->where('temp_email',$email)->first();
    if(is_null($emexist)){
    DB::table('temp_users')->updateOrInsert(
            ['referenceno' => $refno],
            ['temp_email' => $email, 'referenceno' => $refno],
        );
    
    }else{
        $refno = $emexist->referenceno;
    }
    $request->session()->put('id', $refno);
    return view('multipage_password')->with('refno',$refno);
    }

    public function mp_name_show(Request $request){
    $refno  =   $request->refno;
    $password  =   Hash::make($request->cpassword, [
                        'memory' => '1024',
                        'time' =>  '2',
                        'threar' =>  '2',
                    ]);
    DB::table('temp_users')->updateOrInsert(
            ['referenceno' => $refno],
            ['temp_password' => $password]
        );
        $tuser = DB::table('temp_users')->where('referenceno',$refno)->first();

        if(is_null($tuser)){
        return view('multipage_name')->with('refno',$refno);
        }else{
            $request->session()->put('id', $tuser->referenceno);
        return view('multipage_name')->with('refno',$refno)->with('tuser',$tuser);
        }

    }
    public function mp_details_show(Request $request){
    $refno  =   $request->refno;
    $firstname =$request->first_name;
    $lastname = $request->last_name;
        

    DB::table('temp_users')->updateOrInsert(
            ['referenceno' => $refno],
            ['temp_first_name' => $firstname, 'temp_last_name' => $lastname]
        );
    $tuser = DB::table('temp_users')->where('referenceno',$refno)->first();
    if(is_null($tuser)){
    return view('multipage_otherdetails')->with('refno',$refno);
    }else{
        $request->session()->put('id', $tuser->referenceno);
    return view('multipage_otherdetails')->with('refno',$refno)->with('tuser',$tuser);

    }

    }

    public function mp_location_show(Request $request){
    $refno  =   $request->refno;
    $mobno =$request->mobno;
    $dob = $request->dob;
    $gender=$request->gender;

    DB::table('temp_users')->updateOrInsert(
            ['referenceno' => $refno],
            ['temp_mobno' => $mobno, 'temp_DOB' => $dob,'temp_gender'=>$gender]
        );
    $countryname = DB::table('countries')->get();
    $tuser = DB::table('temp_users')->where('referenceno',$refno)->first();

    if(is_null($tuser)){
    return view('multipage_locationdetails')->with('refno',$refno);
    }else{
        $request->session()->put('id', $tuser->referenceno);
    return view('multipage_locationdetails')->with('refno',$refno)->with('tuser',$tuser)->with('countryname', $countryname);

    }

    }
    public function mp_review(Request $request){
    $refno  =   $request->refno;
    $address =$request->address;
    $country = $request->country;
    $state=$request->state;
    $city = $request->city;
    $pincode = $request->pincode;

    DB::table('temp_users')->updateOrInsert(
            ['referenceno' => $refno],
            ['temp_address' => $address, 'temp_country' => $country,'temp_state'=>$state,'temp_city'=>$city,'temp_pincode'=>$pincode]
        );
    
    $tuser = DB::table('temp_users')->where('referenceno',$refno)->first();
        $request->session()->put('id', $tuser->referenceno);
    return view('multipage_review')->with('tuser',$tuser);

    }

    public function prevmpage(Request $request){
        $uid = 0;
        $page = $request->p;

    if($request->session()->has('id')){
        $uid = $request->session()->get('id');
    $tuser = DB::table('temp_users')->where('referenceno',$uid)->first();
        if($page === '1'){
        return view('multipage_email',compact('tuser'));
        }
        else if($page === '2'){
        return view('multipage_password',compact('tuser'));
        }
        else if($page === '3'){
    return view('multipage_name')->with('tuser',$tuser);

        }
        else if($page === '4'){
    return view('multipage_otherdetails')->with('tuser',$tuser);

        }
        else if($page === '5'){
        $countryname = DB::table('countries')->get();
    return view('multipage_locationdetails')->with('tuser',$tuser)->with('countryname', $countryname);

        }
    }else{
        return redirect()->to('signup');
    }
    

    }

    public function showdata(Request $request){
        //print_r('hiuhiuhiu');exit;
        $first_name			=	$request->first_name;
        $last_name			= 	$request->last_name;
        $email    			= 	$request->email;
        $password 			=  	$request->password;
        $confirm_password 	=   $request->confirm_password;
        $mobno				=	$request->mobno;
        $dob				=	$request->dob;
        $gender 			=	$request->gender;
        $address 			=	$request->address;
        $country 			=	$request->country;
    $state          = $request->state;
    $city           = $request->city;
    $pincode        = $request->pincode;
    
    $time				= 	$request->dt;
    

    $messages=
            [
        

        'required'				=>   "The :attribute field is required",
        'email.email'  			=>    "The :attribute :input format should be example@example.com/.in/.edu/.org....",
        'email.unique' 			=>   "The :attribute :input is taken. Please use another email address",
        'confirm_password.same'  =>   "Password and Confirm password fields must match exactly",
        'mobno.digits'           =>    "The :attribute  field accepts only numbers",
        'mobno.digits:10' 		=>    "The :attribute should be 10 digits long",
        'dob.date_format'  		=>    "The date format :input should be YYYY-MM-DD",
        'address.string'         =>    "The :attribute :input must be in the form of a string",
        'state.required'      => "The :attribute field is required. Select or reselect from the country dropdown to select state",
        'city.required'        =>   "The :attribute field is required. Select or reselect from the state dropdown to select city"
    
    ];


    $rules = [
        
                'first_name'   	     =>   	 'required',
                'last_name'    	     =>    	 'required',
                'email' 			       => 	 'required|email|unique:users',
                
                'password'     	     =>      'required|min:8',
                'confirm_password'   =>      'required|min:8|same:password',
                'mobno'              =>    	 'required|digits:10',
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
    else{
    return view('recheck_form')
    ->with('first_name',$first_name)
    ->with('last_name',$last_name)
    ->with('email',$email)
    ->with('password',$password)
    ->with('mobno',$mobno)
    ->with('dob',$dob)
    ->with('gender',$gender)
    ->with('address',$address)
    ->with('country',$country)
    ->with('state',$state)
    ->with('city',$city)
    ->with('pincode',$pincode)
    ->with('time',$time);
    }
    

    }

}
