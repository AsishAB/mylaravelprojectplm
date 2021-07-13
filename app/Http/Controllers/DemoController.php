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

class DemoController extends Controller
{
    public function demoLogin(){
    	return view('demo.demo-login');
    }
    public function demoProfile(){
    	return view('demo.demo-profile');
    }
    public function demoDashboard(){
    	return view('demo.demo-dashboard');
    }
    public function demoContactEmail(){
    	return view('demo.demo-contactemail');
    }
    public function demoNotification(){
    	return view('demo.demo-notification');
    }
    public function demoResetPassword(){
    	return view('demo.demo-resetpassword');
    }
    public function demoVerifyEmail(){
    	return view('demo.demo-verifyemail');
    }
    public function demoWelcomeEmail(){
    	return view('demo.demo-welcomemail');
    }
}
