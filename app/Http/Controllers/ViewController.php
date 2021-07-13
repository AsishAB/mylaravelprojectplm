<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function loginOptions(){
    	return view('loginoptions');
    }
    public function signupOptions(){
    	return view('signupoptions');
    }
    public function newSignUp(){
    	return view('newsignup');
    }
}
