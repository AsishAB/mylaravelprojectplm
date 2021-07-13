@extends('commonview.app')
@section('content')
<div class="contaier m-5">
<div class="alert alert-primary shadow  show m-4" role="alert">
<strong>If your email id exists in our database, instructions to reset your password will be sent to your email address and you will be notified here about the same. Please check your inbox after filling out the form below and clicking Reset Password button</strong>
</div>
 <div class="alert alert-danger alert-dismissible shadow fade show m-4" role="alert" id="alert_errors">              
                 <strong id="alert_messages"></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
    
                   </div>  
   <div class="alert alert-success alert-dismissible shadow fade show m-4" role="alert" id="reset_success">              
                 <strong id="checkemail"></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
    
      </div>


  <div class="row ">
 <div class="col-md-6 offset-md-3 justify-content-center shadow border border-primary">
            <div class="panel panel-default">
              <div class="panel-heading mt-2 text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Enter your details below.</p>
                </div>
                  <div class="panel-body">
    
                    <form  role="form" autocomplete="off" id="forgot_password_form">
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input type="text"  class="form-control" placeholder="Please enter your Email address" name="fp_email" id="fp_email">
                           <div class="error text-danger"></div>
                        </div>
                          
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block" id="reset_password" name="reset_password">Reset Password</button> 
                      </div>
                     New User? <a href="new_user">Click Here to  Sign Up</a><br>
                     Have an account? <a href="login">Login Here</a>
                      
                      <!-- <input type="hidden" name="fp_token" id="fp_token" value="">  -->
                    </form>
   
                  </div>
                </div>
              </div>
            </div>
          </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
  <script type="text/javascript">
   $(document).ready(function(){
    $('#alert_errors').hide();
    $('#reset_success').hide();
     jQuery.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
        }, "No white space please");

     $('#forgot_password_form').validate({
        focusCleanup:true,
        rules:{
            fp_email:{
               required:true,
               email:true,
               nowhitespace:true
            },
 
        },
        messages:{
          fp_email:{
                required:"The email address field is required",
                email:"Please enter a valid email address"
          },

        },
        errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },

     });
       $('#reset_password').click(function(e){
        $('#reset_password').html("Please Wait..");
           e.preventDefault();
           if($('#forgot_password_form').valid()){

                  $.ajax({
                      method:"POST",
                      url:"{{ url('forgot-password') }}",
                      cache: false,
                    processData:true,   //Required
                    contentType: 'application/x-www-form-urlencoded',
                    data:{
                      '_token'         : $("#csrf").val(),
                       'fp_email'      : $('#fp_email').val(),
                       // 'fp_token'      : $('#fp_token').val(),
                    },
                    dataType: 'JSON',
                    success:function pwd_rest(response){
                       
                      if(response.success===true){
                         
                         setTimeout(function(){ $('#reset_success').show(); }, 2000);
                        
                       $('#checkemail').html("Instructions sent to your email. Please check your inbox");
                         // $('#reset_password').html("Reset Password");
                         setTimeout(function(){ location.reload(); }, 8000);

                         console.log(response);
                       }
                       else if(response.success===false){
                         $('#reset_password').html("Please Wait..");
                            if(response.action===2){
                              $('#alert_errors').show();

                              $('#alert_messages').html(response.message);
                              setTimeout(function(){ $('#alert_errors').hide();$('#forgot_password_form').reset();  }, 2000);
                               console.log(response);
                               $('#reset_password').html("Reset Password");
                              

                            }
                       }
                    },
                    error: function error_reset(response){
                       $('#reset_password').html("Reset Password");
                        swal({
                            title: "Oops! Server error.",
                            text: "Unable to change password. Please try again",
                            icon: "error",
                            button: true,                                                                                
                        }).then((value)=>{
                            setTimeout(function(){ location.reload();},100);
                        });
                        setTimeout(function(){location.reload();},7000);
                        console.log(response);


                          },
                  });

           }else{
              $('#reset_password').html("Reset Password");
           }
           
       });

   });



</script>  

@endsection