@extends('commonview.app')
@section('content')
@guest

@if(Session::has('error'))
<div class="alert alert-danger m-5" id="mainalert">You have some error.<a href="#sessionalert"> Click Here to go there</a></div>
<script type="text/javascript"> setTimeout(function(){ $('#mainalert').hide(); }, 15000);</script>
@endif

<div class="card m-5 border border-warning shadow shadow-lg text-center">
	  <img src="{{ asset('assets/img/new-user-onboarding.jpg') }}" style=" width: 100%; height: 500px;" class="card-img-top shadow" alt="Welcome">
  <div class="card-header display-4 ml-5 mr-5 mt-5">
   Hello, and Welcome!
  </div>
  <div class="card-body">
    <h5 class="card-title">Below you will find three options to signup. All the forms will register you as a New User. The only difference is the progress system</h5><br><br><br>
   <div class="container">
  
  <div class="row">

    <div class="col">
      <p>Click Here for Multi Step Signup form</p>
      <button class="btn btn-primary" id="multi_step_btn">Multi Step Signup Form</button>
    </div>
   

    <div class="col">
   <p>Click Here for Multi Page Signup form</p>
      <button class="btn btn-warning" id="multi_page_btn">Multi Page Signup Form</button>
    </div>
    

    <div class="col">
   <p>Click Here for Instant Signup form</p>
    <button class="btn btn-info" id="instant_page_btn">Instant Signup Form</button>
    </div>

 </div>

  <div class="row mt-5">
    <div class="col">
     <button class="btn btn-danger btn-lg" id="hideall">Hide all options</button>
 </div>
  </div>

   <div class="row mt-5">
    <div class="col">
     Already Signed up? <a href="{{url('loginoptions')}}"> <i class="fas fa-sign-in-alt"></i>  Login Here</a>
 </div>
  </div>

   <div class="row mt-5 collapse signupoptions" id="pointdown">
      <div class="col">
        <i class="far fa-hand-point-down fa-4x" style="color: #FF4500"></i>
      </div>
 </div >


   </div>

  </div>
</div>


<div class="collapse card m-5 shadow signupoptions" id="multistep_signup">
  <div class="card-header text-center">
    <h4>Multi-Step Form</h4>
    <div class="mt-3">
    <i class="fas fa-tasks fa-3x"></i>  <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-tasks fa-3x"></i> <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-clipboard-list fa-3x"></i>  <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-clipboard-check fa-3x"></i>
  </div>
  <div class="mt-5">
  <i class="fas fa-ban fa-3x text-danger"></i>  <i class="fas fa-arrow-left fa-3x"></i>  <i class="fas fa-tasks fa-3x"></i>  <i class="fas fa-arrow-left fa-3x"></i>   <i class="far fa-window-close fa-3x"></i> <i class="fas fa-arrow-left fa-3x"></i>  <i class="fas fa-clipboard-list fa-3x"></i>

  </div>
  </div>
 <div class="card-body text-center ml-3">
    <h5 class="card-title text-center">You will have to fill up all the details in multiple steps. If you hit cancel, you will have to restart the registration process again</h5>
     <a href="{{url('signup_p')}}" target="_blank"><button type="button" class="btn btn-primary btn-lg">Click Here</button></a> to Go to the <strong>Multi-Step</strong> form
   </div>
</div>
</div>



<div class="collapse card m-5 shadow signupoptions" id="multipage_signup">
  <div class="card-header text-center">
    <h4>Multi-Page Form</h4>
    <div>
    <i class="fas fa-tasks fa-3x"></i>  <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-tasks fa-3x"></i> <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-clipboard-list fa-3x"></i>  <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-clipboard-check fa-3x"></i>
  </div>
  <div class="mt-5">
    <i class="far fa-thumbs-up fa-3x text-info"></i>  <i class="fas fa-arrow-left fa-3x"></i>  <i class="fas fa-tasks fa-3x"></i>  <i class="fas fa-arrow-left fa-3x"></i>   <i class="far fa-window-close fa-3x"></i> <i class="fas fa-arrow-left fa-3x"></i>  <i class="fas fa-clipboard-list fa-3x"></i>
 </div>
  </div>
  <div class="card-body ml-3">
    <h5 class="card-title text-center">Your signup process will be divided into multiple steps. A reference number will be available to you in the first step itself. After completion of each step, you will be able to return any time to fill up the rest of the form, or edit other details that you had filled up, as long as you have the reference number. Once the final reigstration is complete, the reference number will be destroyed.</h5><br><br>
    <div class="text-center">
    <h4 class="card-text">I <strong class="text-success">HAVE</strong> a reference number :-</h4>
    <p class="text-muted">Enter the reference number in the field below</p>
     <form id="reference" method="get" action="{{url('new_user2')}}">
    <div class="form-group row">
    <label for="refno" class="col-sm-2 col-form-label sr-only">Reference No. : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="refno" name="refno" placeholder="Enter your Reference No.">
    </div>
    <button type="submit" class="btn btn-warning ml-2 mb-2" id="refsubmit">Go</button><br>
  </div>
  </form>
<div class="text-danger mt-2" id="referror"></div>
</div>
<div class="divider py-1 mt-5 bg-dark"></div>
  <div class="text-center">
   <h4 class="card-text mt-4">I <strong class="text-danger">DO NOT</strong> have a reference number :-</h4>
     <a href="{{url('new_user2')}}" target="_blank"><button type="button" class="btn btn-warning btn-lg">Click Here</button></a> to Go to the <strong>Multi Page</strong> signup form. A reference number will be generated, which you should note down
  </div>  
    </div>
    <script type="text/javascript">
  $('#multipage_signup').ready(function(){
    var invref;
    $('#refsubmit').click(function(e){
    e.preventDefault();
    $.ajax({
        url:"{{ url('checkrefno') }}",
        method:'get',
        data:{
          'refno':$('#refno').val(),
          },
        success: function f(response){
          invref= $('#refno').val();
          invref = invref.trim();
          if(invref===""){
          $('#referror').html("Please enter a value. Also, please remove white spaces in the front and rear sides of the text. Or click the link below to generate a new referece no.");
          $('#refno').val("");
          $('#reference').reset();
          }
           if(response.success === false){
              invref+= " is ";
            invref+= response.message;
             $('#referror').html(invref);
             $('#refno').val("");
             $('#reference').reset();
           }else if(response.success === true){
            $('#reference').submit();
           }

        },
        error: function e(response){
     }
    });
  });
});
</script>
</div>


<div class="collapse card m-5 shadow signupoptions" id="instant_signup">
  <div class="card-header text-center">
    <h4>Instant Form</h4>
    <i class="fas fa-tasks fa-3x"></i>  <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-clipboard-list fa-3x"></i> <i class="fas fa-arrow-right fa-3x"></i>  <i class="fas fa-clipboard-check fa-3x text-success"></i>
  <div class="mt-5">
  <i class="fas fa-ban fa-3x text-danger"></i>  <i class="fas fa-arrow-left fa-3x"></i>  <i class="far fa-window-close fa-3x"></i> <i class="fas fa-arrow-left fa-3x"></i>  <i class="fas fa-clipboard-list fa-3x"></i>
 </div>
  </div>
  <div class="card-body text-center ml-3">
    <h5 class="card-title text-center">You will fill up all the details in one page</h5>
    <a href="{{url('new_user')}}" target="_blank"><button type="button" class="btn btn-info btn-lg">Click Here</button></a> to Go to the <strong>Instant Signup</strong> form
    </strong></div>
</div>


<script type="text/javascript">
  
        $('#multi_step_btn').click(function(){
          
          $("#multipage_signup").collapse('hide');
          $("#instant_signup").collapse('hide');

          $('#pointdown').collapse('show');
          $("#multistep_signup").collapse('show');
                 
        });
        $('#multi_page_btn').click(function(){
          $("#multistep_signup").collapse('hide');
          $("#instant_signup").collapse('hide');
         

          $('#pointdown').collapse('show');
          $("#multipage_signup").collapse('show');
                
        });

        $('#instant_page_btn').click(function(){
            $("#multistep_signup").collapse('hide');
           $("#multipage_signup").collapse('hide');

          $('#pointdown').collapse('show');
          $("#instant_signup").collapse('show');
             
        });

        $('#hideall').click(function(){
          $('#pointdown').collapse('hide');
          $(".signupoptions").collapse('hide');
        });
</script>
@endguest
@auth
<script type="text/javascript">window.location(" {{ url('dashboard') }}")</script>
@endauth
@endsection
