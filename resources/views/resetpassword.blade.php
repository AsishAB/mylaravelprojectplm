@extends('commonview.app')
@section('content')
<div class="container">
<div class="row">
 
   <div class="col-md-6 offset-md-3 justify-content-center">
    <div class="alert alert-secondary shadow fade show m-4" role="alert">
  <strong class="text-danger">Note: Please confirm your email address before proceeding</strong>
</div>
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                  <h3><i class="fa fa-wrench fa-4x"></i></h3>
                  <h2 class="text-center">Reset Password</h2>
                  <p>You can reset your password here</p>
                </div>
                  <div class="panel-body">
                    <div class="alert alert-success alert-dismissible fade show m-4" role="alert" id="p_rst_success">
                        <strong id="p_success">Password changed successfully. You will be redirected to Login Page.. OR<a href="/LaraTest/public/login">Click Here</a> to be redirected immediately</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="alert alert-danger alert-dismissible fade show m-4" role="alert" id="p_rst_error"> 
                        <strong  id="p_error"></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
    
                    <form   autocomplete="off" id="reset_password_form">
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <input type="hidden" name="p_resettoken" id="p_resettoken" value={{$token}}>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input type="text"  class="form-control" placeholder="Email address" name="rp_email" id="rp_email" value={{$email}}>
                           <div class="error text-danger"></div>
                        </div>

                          
                      </div>
                      <div class="form-group">
                          
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input type="password"  class="form-control" placeholder="New Password" name="rp_new_password" id="rp_new_password">
                           <div class="error text-danger"></div>
                        </div>
                        
                          
                      </div>
                      <div class="form-group">
                        
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input type="password"  class="form-control" placeholder="Confirm Password" name="rp_confirm_password" id="rp_confirm_password">
                           <div class="error text-danger"></div>
                        </div>
                        
                          
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block" id="r_password" name="r_password">Reset Password</button> 
                      </div>
                      
                     
                    </form>
   
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- jQuery Validation Plugin -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

          <script type="text/javascript">
             $(document).ready(function(){
              $('#p_rst_success').hide();
              $('#p_rst_error').hide();


              jQuery.validator.addMethod("nowhitespace", function(value, element) {
                  return this.optional(element) || /^\S+$/i.test(value);
              }, "Please delete any blank space in between or before the text");
              
                $('#reset_password_form').validate({
                 focusCleanup: true,
                  rules:{
                    rp_email:{
                      required:true,
                      nowhitespace:true,
                      email:true
                    },
                   rp_new_password:{
                      required:true,
                      nowhitespace:true,
                      minlength:8,
                    },
                    rp_confirm_password:{
                      required:true,
                      equalTo:'#rp_new_password',
                     
                    },
                  },
                  messages:{
                     rp_email:{
                        required: "This field is required",
                        email:"Please enter a valid email address. Delete all spaces before the start of the email address"
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


                });
                $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                $('#r_password').click(function(e){
                  e.preventDefault();
                    $('#r_password').html("Please Wait..");
                     if($('#reset_password_form').valid()){
                        $.ajax({
                           method:'POST',
                          url:"{{ url('reset_password') }}",
                          cache: false,
                        processData:true,   //Required
                        contentType: 'application/x-www-form-urlencoded',
                        data:{
                          '_token'       :   $("#csrf").val(),
                          'p_resettoken'     :   $("#p_resettoken").val(),
                          'rp_email'        :   $("#rp_email").val(),
                          'rp_confirm_password'       :   $("#rp_confirm_password").val(),
                            
                        },
                        dataType:"JSON",
                        success: function pd_rst(response){
                          if(response.success===true){
                            $('#p_rst_success').show();
                              $('#p_success').html("Password changed successfully. You will be redirected to Login Page.. ");
                              $('#r_password').html("Reset Password");
                              setTimeout(function(){ window.location = "{{ url('login') }}";},6000);
                            
                            // setTimeout(function(){ $('#p_rst_success').hide();}, 8000);

                       console.log("Success=> ",response);
                         
                          }else if(response.success=== false){
                            if(response.action===1){
                              $('#p_rst_error').show();
                              $('#p_error').html(response.message);
                              // setTimeout(function(){ window.location = "login";},2000);
                            $('#r_password').html("Reset Password");
                            setTimeout(function(){ $('#p_rst_error').hide();}, 8000);

                            }else if(response.action===2){
                              swal({
                            title: "Token Mismatch",
                            text: "Please use the password reset form again.",
                            icon: "error",
                            button: true,                                                                                
                        }).then((value)=>{
                           $('#r_password').html("Reset Password");
                            setTimeout(function(){window.location ="{{ url('forgotpwd') }}";},1000);
                            });
                          }



                        }
                      },
                        error:  function pd_err(response){
                          swal({
                            title: "Oops! Some error.",
                            text: "Unable to change password. Please try later",
                            icon: "error",
                            button: true,                                                                                
                        }).then((value)=>{
                           $('#r_password').html("Reset Password");
                            // setTimeout(function(){location.reload;},1000);
                        });



                        },

     
                        });//ajax ends
                     }
                });



             });//end of ready fn



          </script>
    @endsection