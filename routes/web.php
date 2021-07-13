<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', function(){
	return view('home');
});
Route::get('contact', function(){
	return view('contact_us');
});
Route::get('test', function(){
	return view('test');
});

// Route::get('contactbackend', function(){
// 	return view('contactbackend');
// });
// Route::get('backendreply', function(){
// 	return view('backend_reply');
// });


// Optional

// Route::get('feedbackform',function(){
//    return view('feedbackform');

// });

// Route::get('multistepform_1', function(){
// 	return view('multistepform_1');
// });
// Route::get('backup2', function(){
// 	return view('backup2');
// });

// Route::get('verifyemail', function(){
// 	return view('emails.verifyemail');
// });

// Route::get('notf', function(){
// 	 $data = array(
//     'nactivity' =>  "New User Registered! Welcome",
//     'nname'=> "XY YZ",
//     'nmessage1'=>"New User created successfully."
//     'nmessage2'=>"You may login to your account by clicking on the button below",
//     'nbutton'=>"Login Now",
//     'nlink' =>'/LaraTest/public/login',
//     'nemail' =>'basish210@gmail.com',
//     'nimg'=>"https://miro.medium.com/max/712/1*c3cQvYJrVezv_Az0CoDcbA.jpeg"
//     ); 
//     // Send a notification
//     return (new App\Notifications\AccountNotification($data))->toMail($data['nemail']);
// });


// Route::get('resetpasswordmail',function(){
//   return view('emails.resetpasswordmail');
// });

// Optional
// Route::get('navbar',function(){

//  return view('commonviews.navbar');
// });

// Route::get('footer',function(){

//  return view('commonviews.footer');
// });

// Route::get('welcomehome',function(){

//  return view('welcomehome');
// });
// Route::get('dashboard1',function(){

//  return view('dashboard1');
// });

// Route::get('multipage1',function(){

//  return view('multipage1');
// });
// Route::get('multipage2',function(){

//  return view('rmultipage2');
// });

// Route::match(['get', 'post'], '/', function () {

//  return view('multipage2');
// });

// Route::match(['get', 'post'], '/', function () {

//  return view('multipage3');
// });
// Route::get('review',function(){
//  return view('multipage_review');

// });
// Route::get('allusers',function(){
//  return view('allusers');

// });

// Route::get('pusher','LoginController@pusher');
     
  


Route::get('pwdform',function(){

 return view('pwdform');
});


// Optional ends




Route::get('/',function(){

	return view('welcome');
   });
Route::get('loginoptions','ViewController@loginOptions');
Route::get('signupoptions','ViewController@signupOptions');
Route::get('newsignup','ViewController@newSignUp');


Route::get('login','LoginController@loginPage')->name('login');
Route::post('login_attempt' , 'LoginController@loginUser' );
// Route::get('dashboard','LoginController@dashboard')->middleware('auth', 'PreventBackHistory')->name('dashboard');
// Route::get('logout', 'LoginController@logoutsuccess')->middleware('auth','PreventBackHistory');
// Route::get('cngpwd', 'LoginController@viewchangepassword')->middleware('auth','PreventBackHistory');
Route::get('check-email' , 'LoginController@checkemail' );

Route::get('dashboard','LoginController@dashboard')->middleware('auth')->name('dashboard');
Route::get('logout', 'LoginController@logoutsuccess')->middleware('auth');
Route::get('cngpwd', 'LoginController@viewchangepassword')->middleware('auth');

Route::get('new_user','NewUserController@new_user_reg');
Route::get('signup_p','NewUserController@new_user1');
Route::get('get-states','NewUserController@getStateList');
Route::get('get-cities','NewUserController@getCityList');

// Route::post('recheck_form', 'NewUserController@showdata')->middleware('PreventBackHistory');

Route::post('recheck_form', 'NewUserController@showdata');
Route::get('checkrefno','NewUserController@checkrefno');
Route::get('new_user2','NewUserController@new_user2');

// Route::get('new_user2','NewUserController@new_user2')->middleware('PreventBackHistory');

Route::match(['get', 'post'], 'mp_password_show','NewUserController@mp_password_show');
Route::match(['get', 'post'], 'mp_name_show','NewUserController@mp_name_show');
Route::match(['get', 'post'], 'mp_details_show','NewUserController@mp_details_show');
Route::match(['get', 'post'], 'mp_location_show','NewUserController@mp_location_show');
Route::match(['get', 'post'], 'mp_review','NewUserController@mp_review');
Route::get('prevmpage','NewUserController@prevmpage');


Route::post('submit-form' , 'userController@insert_user');
Route::get('edit_user', 'userController@edit_user_form')->middleware('auth');
// Route::post('edit-password', 'userController@edituser_password')->middleware('auth','PreventBackHistory')->name('edit-password');
Route::post('edit-user', 'userController@edit_user')->middleware('auth');
// Route::post('delete_user', 'userController@delete_user')->middleware('auth', 'PreventBackHistory')->name('delete_user');

Route::post('edit-password', 'userController@edituser_password')->middleware('auth')->name('edit-password');
Route::post('delete_user', 'userController@delete_user')->middleware('auth')->name('delete_user');

Route::get('/contactm', 'userController@contactmessage')->middleware('auth');
Route::get('user-message/{id}','userController@showusermessages')->middleware('auth');
Route::post('store-userreply','userController@storeuserreply');
// Route::get('profile','userController@viewProfile')->middleware('auth','PreventBackHistory');
// Route::post('edituser_email','userController@edituser_email')->middleware('auth','PreventBackHistory');
// Route::post('edituser_pd','userController@edituser_pd')->middleware('auth','PreventBackHistory');
// Route::post('edituser_opd','userController@edituser_opd')->middleware('auth','PreventBackHistory');
// Route::post('edituser_ld','userController@edituser_ld')->middleware('auth','PreventBackHistory');
// Route::post('edituser_pic','userController@edituser_pic')->middleware('auth','PreventBackHistory');

Route::get('profile','userController@viewProfile')->middleware('auth');
Route::post('edituser_email','userController@edituser_email')->middleware('auth');
Route::post('edituser_pd','userController@edituser_pd')->middleware('auth');
Route::post('edituser_opd','userController@edituser_opd')->middleware('auth');
Route::post('edituser_ld','userController@edituser_ld')->middleware('auth');
Route::post('edituser_pic','userController@edituser_pic')->middleware('auth');



Route::get('emverrequest','VerifyEmailController@verifyEmail');
// Route::get('verifymail/email/{email}/{token}','VerifyEmailController@viewEmailVerified')->middleware('PreventBackHistory');

Route::get('verifymail/email/{email}/{token}','VerifyEmailController@viewEmailVerified');


Route::post('contact_us_msg', 'ContactUsController@contact_us');
Route::post('contact-admin', 'ContactUsController@contact_admin');


Route::get('forgotpwd','ResetPasswordController@viewforgotpassword')->name('forgotpassword');

// Route::get('forgotpwd','ResetPasswordController@viewforgotpassword')->name('forgotpassword')->middleware('PreventBackHistory');
Route::post('forgot-password','ResetPasswordController@forgotpassword');
Route::get('reset/{tokenname}/email/{email?}','ResetPasswordController@viewresetpassword');
Route::post('reset_password','ResetPasswordController@resetpassword');


Route::get('viewnotf','NotificationController@viewNotf');
Route::get('notf-action','NotificationController@notfAction');

Route::get('contactbackend','BackendController@viewMessages');
Route::get('backendreply/{msgid}','BackendController@eachMessage');
Route::post('backend-reply','BackendController@backendreply');
Route::post('ticket-solved','BackendController@ticketSolved');
Route::get('userslist','BackendController@allUsers');
Route::get('sendnotf/{id}','BackendController@viewSendNotf');
Route::post('send-notf','BackendController@sendNotf');
Route::get('admin-email','BackendController@adminEmail');
Route::get('cngstatus','BackendController@cngStatus');
//============================== DEMO SHOWCASE=================================================================//

Route::get('demo-login','DemoController@demoLogin');
Route::get('demo-profile','DemoController@demoProfile');
Route::get('demo-dashboard','DemoController@demoDashboard');
Route::get('demo-contactemail','DemoController@demoContactEmail');
Route::get('demo-notification','DemoController@demoNotification');
Route::get('demo-resetpassword','DemoController@demoResetPassword');
Route::get('demo-verifyemail','DemoController@demoVerifyEmail');
Route::get('demo-welcomeemail','DemoController@demoWelcomeEmail');



Route::get('changeform',function(){
   
    $id= mt_rand();
    return view('changerequestform',compact('id'));
});