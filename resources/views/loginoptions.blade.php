@extends('commonview.app')
@section('content')

<div class="card text-center m-5 shadow-lg">
  <div class="card-header">
    <img src=" {{asset('assets/img/php-login-and-authentication-the-definitive-guide.png')}} " height="200px" width="200px">
  </div>
  <div class="card-body">
    <h5 class="card-title">Hello</h5>
    <strong class="card-text">You will find two options to view the Login Pages.</strong>
    <div class="container">
      <div class="row">

    <div class="col">
      <p>Click Here for <strong class="text-info">Live</strong> Login Page</p>
      <button class="btn btn-primary" id="loginpage"><i class="fas fa-sign-in-alt"></i> Live Login</button>
    </div>
   

    <div class="col">
   <p>Click Here for <strong class="text-warning">Demo</strong> Login Page</p>
      <button class="btn btn-warning" id="demologinpage"><i class="fas fa-sign-in-alt"></i> Demo Login</button>
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
 New user? <a href="{{url('signupoptions')}}" id="signup"> <i class="fas fa-user-plus"></i> Signup Here</a>
  </div>
  <div class="card-footer text-muted">
   Welcome
   <div class="mt-4 collapse" id="arrowdown">
    <i class="fas fa-arrow-down fa-3x" style="color: #FF1493;"></i>
   </div>
  </div>
</div>

<div class="card text-center m-5 shadow collapse collapse2" id="livelogin">
	<div class="card-header"> 
  <h5 class="text-info">Live Login Page</h5>
  <div class="mt-5">
  <i class="fas fa-database fa-3x"></i> <i class="fas fa-long-arrow-alt-right fa-3x"></i> <i class="fas fa-check fa-3x text-success"></i>
</div>
</div>

  <div class="card-body ">
    <h5 class="card-title">Here you will <strong class="text-success">NEED</strong> database connection, as you will be logged in based on the data in the database</h5>
    <p class="card-text text-info">Click  the <strong>button below</strong> to go the Login Page.</p>
    <a href="{{url('login')}}" target="_blank"><button type="button" class="btn btn-primary">Live Login Page <i class="fas fa-sign-in-alt"></i></button></a>
  </div>
</div>

<div class="card text-center m-5 shadow collapse collapse2" id="demologin">
  <div class="card-header "> 
  <h5 class="text-warning">Demo Login Page</h5>
  <div class="mt-5">
  <i class="fas fa-database fa-3x"></i> <i class="fas fa-long-arrow-alt-right fa-3x"></i> <i class="fas fa-times fa-3x text-danger"></i>
</div>
</div>
  <div class="card-body">
    <h5 class="card-title">Here you will <strong class="text-danger">NOT</strong> need database connection, as the input fields will be pre-filled</h5>
    <p class="card-text text-warning">Click the <strong>button below</strong> to go the Demo Login Page.</p>
    <a href="{{('demo-login')}}"><button type="button" class="btn btn-warning">Demo Login Page <i class="fas fa-sign-in-alt"></i></button></a>
  </div>
</div>


<script type="text/javascript">
	 $(document).ready(function(){
	 	// $('#arrowdown').hide();
         $('#loginpage').click(function(){
         	$('#arrowdown').collapse('show');
         	 $('#livelogin').collapse('show');
             $('#demologin').collapse('hide');
         });
         $('#demologinpage').click(function(){
         	$('#arrowdown').collapse('show');
         	 $('#demologin').collapse('show');
             $('#livelogin').collapse('hide');
         });
       	$('#hideall').click(function(){
       		$('#arrowdown').collapse('hide');
         	$('.collapse2').collapse('hide');
         });
 
	 });


</script>
@endsection