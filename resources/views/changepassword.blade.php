@extends('commonview.app')
@section('content')
@include('editform-css')
@section('content')
@include('welcome-css')
@php 
$img = "https://www.iconhot.com/icon/png/vista-style-business-and-data/256/users-17.png";
@endphp
@auth
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{$img}}" alt="AB" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#password">Password</a></li>
                    
                </ul>
            </div>
  </nav>
    <div class="body2">
<div class="agile-login ">
 
     <h1>User, Me</h1>

 <div class="jumbotron border border-info ml-5 mr-5">
  <h5 class="display-5 text-center text-dark ">Do you remember your current password?</h5>
  <p class="text-center">
   <button type="button" class="btn btn-primary" id="rp_yes">Yes</button>
   <button type="button" class="btn btn-danger"  id="rp_no">No</button>
</p>
<div class="text-center">
<button type="button" class="btn btn-warning"  id="cancel_change">Cancel</button>
</div>
</div>
<div class="wrapper collapse border border-danger shadow-lg rounded" id="not_rem_p">
    <h1 class="display-5 text-center text-info">Hmm! Seems like you were logged in before.</h1>
    <p class="text-center text-white">
       <strong> It seems like you are logged in, because of a previous session.<br>
        Unfortunately, you cannot change your password from here.<br>
    </strong>
          </p> 
      <div class="alert alert-warning text-center mx-5">
        <strong>Please use <a href="#" id="forgot_password">Forgot Password</a> link to Reset your Password</strong>

     </div>
  
</div>
<div class="wrapper collapse"  id="password_reset_div">
<div class="w3ls-form " >
<h5 class="text-white">Great, please fill out this form to change your password</h5>
        
        <form  autocomplete="off" id='password_reset_form'>
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="">
          <label>Current Password:</label>
          <input type="password" class="pwdfield" id="rp_current_password" name="rp_current_password">
          <div class="error text-danger"></div>
          <label>New Password:</label>
          <input type="password" class="pwdfield" name="rp_new_password" id="rp_new_password">
          <div class="error text-danger"></div>
          <label>Confirm Password:</label>
          <input type="password" class="pwdfield" name="rp_confirm_password" id="rp_confirm_password">
          <div class="error text-danger"></div>
          <button type="submit" class="buttons" id='change_password'>Change Password</button>
          <button type="button" class="cancelb">Cancel</button>
        </form>
        <div class="alert alert-danger alert-dismissible shadow fade show m-4" role="alert" id="alert_errors">            <strong id="alert_messages"></strong>
        </div> 
    </div>
</div>
</div>
</div> 

<script type="text/javascript">
    $(document).ready(function(){
      $('#forgot_password').click(function(e){
        e.preventDefault();
        swal({
              title: "Are you sure?",
              text: "You will be logged out and redirected to a new page",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("You will now be redirected.,", {
                  icon: "success",
                  button:false
                }); setTimeout(function(){location.replace("{{ url('forgotpwd') }}");},2000);
              } else {
                swal("You should change your password as soon as possible. You will be logged out once the session expires");
              }
            });
      });
         $('#alert_errors').hide();
          $('#cancel_change').click(function(e){
            e.preventDefault();
            window.location="dashboard";         
           });//cancel button ends
        $('#rp_yes').click(function(){
            $("#password_reset_div").collapse('show');
                 $("#not_rem_p").collapse('hide');
        });
        $('#rp_no').click(function(){
                $("#not_rem_p").collapse('show');
                $("#password_reset_div").collapse('hide');
        });
                jQuery.validator.addMethod("nowhitespace", function(value, element) {
                    return this.optional(element) || /^\S+$/i.test(value);
                    }, "No white space please");
     
         $('#password_reset_form').validate({
          focusCleanup: true,
     rules:{
            rp_current_password:{
              required:true,
              nowhitespace:true
            },
            rp_new_password:{
              required:true,
              nowhitespace:true,
              minlength:8,

            },
            rp_confirm_password:{
              required:true,
              equalTo:'#rp_confirm_password'
            },
     },
     messages:{
        rp_current_password:{
          required: "This field is required",
            },
        rp_new_password:{
          required: "This field is required",
          minlength:"Password length must be of 8 characters"
            },
        rp_confirm_password:{
          required: "This field is required",
          equalTo:  "Password and Confirm password must be same"
            },
     },
     errorPlacement: function(error, element){
        element.each(function(){
            $(this).next("div .error").html(error);

        });
     }

     });//validate function ends
   $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
           }); 
  $('#change_password').on('click',function(e){
     e.preventDefault();
         if($('#password_reset_form').valid()){
                 $.ajax({
                     method:'post',
        url:"{{ url('reset-password') }}",
        cache: false,
        processData:true,   //Required
        contentType: 'application/x-www-form-urlencoded',
        data:{
            '_token'              : $('#csrf').val(),
            'rp_id'               : $('#rp_id').val(),
            'rp_current_password' : $('#rp_current_password').val(),
            'rp_new_password'     : $('#rp_new_password').val(),
            'rp_confirm_password' : $('#rp_confirm_password').val(),
        },
        dataType:"JSON",
        success: function reset_password(response){
            if(response.success===true){
                        swal({
                            title: "Password changed Successfully.",
                            text: "Returning to Profile Page ",
                            icon: "success",
                            button: false,                                                                                
                        });
                        setTimeout(function(){ window.location = "{{ url('dashboard') }}";},2000);
                        console.log(response);
                    }else if(response.success===false){
                        if(response.action===2){
                         $('#alert_errors').show();
                         $('#alert_messages').html("Current Password did not match our records");
                        setTimeout(function(){ $('#alert_errors').hide();$('#password_reset_form').reset();}, 8000);                                  
                        console.log(response);
                        }else if(response.action===3){
                            swal({
                            title: "Unauthenticated User. Login to continue",
                            text: "Returning to Login Page ",
                            icon: "error",
                            button: false,                                                                                
                        });
                            window.location = "{{ url('login') }}";
                             console.log(response);
                        }else if(response.action===4){
                            $('#alert_errors').show();
                         $('#alert_messages').html("Current password and New password are same. Please try a different new password");
                        
                         setTimeout(function(){ $('#alert_errors').hide(); }, 8000);
                           console.log(response);
                            }
                        

                    }


        },
        error: function error_reset(response){
                        swal({
                            title: "Oops! Some error.",
                            text: "Unable to change password. Please try later",
                            icon: "error",
                            button: true,                                                                                
                        }).then((value)=>{
                            // setTimeout(function(){ window.location = "dashboard";},100);
                        });
                        // setTimeout(function(){ window.location = "dashboard";},2000);
                        console.log(response);


        },

                 });//ajax ends

      }
  });


}); //ready fn ends


 
</script>

@endauth
@endsection