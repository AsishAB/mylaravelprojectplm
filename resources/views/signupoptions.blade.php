@extends('commonview.app')
@section('content')

<div class="card text-center m-5 shadow-lg">
  <div class="card-header">
    <img src="{{ asset('assets/img/1046x616_sayitwithme_customers.jpg') }}" height="200px" width="400px">
  </div>
  <div class="card-body">
    <h5 class="card-title">Hello</h5>
    <strong class="card-text">You will find two options to view the Signup Pages.</strong>
    <div class="container">
      <div class="row">

    <div class="col">
      <p>Click Here for <strong class="text-info">Live</strong> Signup Page</p>
      <button class="btn btn-primary" id="signuppage"><i class="fas fa-user-plus"></i> Live Signup</button>
    </div>
   

    <div class="col">
   <p>Click Here for <strong class="text-warning">Demo</strong> Signup Page</p>
      <button class="btn btn-warning" id="demosignuppage"><i class="fas fa-user-plus"></i> Demo Signup</button>
    </div>
 </div>
 <div class="row">
 	<div class="col">
 		 <div class="col">
      <button class="btn btn-danger btn-lg" id="hideall"><i class="fas fa-minus-square"></i> Hide all options</button>
    </div>
 	</div>
 </div>
 </div>
 <br>
 <div>
 Already have an account? <a href="{{url('loginoptions')}}" id="signup"> <i class="fas fa-sign-in-alt"></i> Login Here</a>
</div>

  </div>
  <div class="card-footer text-muted">
   Welcome
   <div class="mt-4 collapse" id="arrowdown">
    <i class="fas fa-angle-double-down fa-4x" style="color: purple;"></i>
    </div>
 </div>
</div>

<div class="card text-center m-5 shadow collapse collapse2" id="livesignup">
	<div class="card-header"> 
  <h5 class="text-info">Live Signup Page</h5>
  <div class="mt-5">
  <i class="fas fa-database fa-3x"></i> <i class="fas fa-long-arrow-alt-right fa-3x"></i> <i class="fas fa-check fa-3x text-success"></i>
</div>
</div>

  <div class="card-body ">
    <h5 class="card-title">Here you will <strong class="text-success">NEED</strong> database connection, as you will be registered using a database</h5>
    <p class="card-text text-info">Click  the <strong>button below</strong> to go the Live Signup Page.</p>
    <a href="{{url('newsignup')}}" target="_blank"><button type="button" class="btn btn-primary">Live Signup Page <i class="fas fa-sign-in-alt"></i></button></a>
  </div>
</div>

<div class="card text-center m-5 shadow collapse collapse2" id="demosignup">
  <div class="card-header"> 
  <h5 class="text-warning">Demo Signup Page</h5>
  <div class="mt-5">
  <i class="fas fa-database fa-3x"></i> <i class="fas fa-long-arrow-alt-right fa-3x"></i> <i class="fas fa-times fa-3x text-danger"></i>
</div>
</div>
  <div class="card-body">
    <h5 class="card-title">Here you will <strong class="text-danger">NOT</strong> need database connection, as the input fields will be pre-filled</h5>
    <p class="card-text text-warning">Click the <strong>button below</strong> to go the Demo Signup Page.</p>
    <a href="{{('demo-login')}}" target="_blank"><button type="button" class="btn btn-warning">Demo Signup Page <i class="fas fa-sign-in-alt"></i></button></a>
  </div>
</div>


<script type="text/javascript">
	 $(document).ready(function(){
  
         $('#signuppage').click(function(){
          $('#arrowdown').collapse('show');
         	 $('#livesignup').collapse('show');
             $('#demosignup').collapse('hide');
         });
         $('#demosignuppage').click(function(){
          $('#arrowdown').collapse('show');
         	 $('#demosignup').collapse('show');
             $('#livesignup').collapse('hide');
         });
       	$('#hideall').click(function(){
          $('#arrowdown').collapse('hide');
         	$('.collapse2').collapse('hide');
         });
 
	 });


</script>
@endsection