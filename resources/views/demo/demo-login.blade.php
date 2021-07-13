 @extends('commonview.app')

   @section('content')
  @include('login-css')
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto bg-light">
      @if(Session::has('error'))
                        
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Username and Password do not match</strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif
    <div class="card card0 border-0">
        <div class="row d-flex">
          <div class="col-lg-6">
                <div class="card1 pb-5">
                    
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{ asset('assets/img/loginpage-image.png') }}" class="image"> </div>
                </div>
            </div>
            
            <div class="col-lg-6">

                <div class="card2 card border-0 px-4 py-5">
                  
                    <div class="row mb-4 px-3">
                      
                        <h6 class="mb-0 mr-4 mt-2">Sign in</h6>
                        <!-- <div class="facebook text-center mr-3">
                            <div class="fa fa-facebook"></div>
                        </div>
                        <div class="twitter text-center mr-3">
                            <div class="fa fa-twitter"></div>
                        </div>
                        <div class="linkedin text-center mr-3">
                            <div class="fa fa-linkedin"></div>
                        </div> -->
                    </div>
                    <div id="login_form" autocomplete="off">
                      
                    <div class="row px-3"> 
                      <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                      <label class="mb-1">

                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> 

                        <input class="mb-4" type="text" id="login_email" placeholder="Email/Username" name="login_email" value="user@example.com" readonly>
                          <small class="text-danger">{{$errors->first('login_email') }}</small>
                      </div>
                      
          
                    <div class="row px-3"> 
                      <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> 
                      <input type="password"id="login_password" placeholder="Password" name="login_password" value="password" readonly>  
                      <small class="text-danger">{{$errors->first('login_password')}}</small>

                     
                      </div>
                      Show Password<i class="far fa-eye-slash" onclick="showpwd()"></i> 
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> 
                    <input type="checkbox" id="remember_me" name="remember_me"  >
                      <label class="text-sm ml-auto" for="vehicle1">Remember me</label><br>
                          <!-- <input type="checkbox" id="remember_me"  name="remember_me" class="custom-control-input">
                          <label for="chk1" class="custom-control-label text-sm">Remember me</label> -->
                         </div> 
                         <a href="forgotpwd" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>
                     <div class="row mb-3 px-3"> 
                      <a href=" {{ url('demo-profile') }} "  type="button" class="btn btn-info text-center">Login</a> 
                     
                     </div>
                    
                     </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">Or</small>
                        <div class="line"></div>
                    </div>
                   
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account?  <a class="text-danger"href="signup"><i class="fas fa-user-plus"></i> Register Here</a></small> </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
  function showpwd(){
    // $(this).find($(".far")).toggleClass('fa-eye fa-eye-slash');
   var x = document.getElementById('login_password');
   if(x.type==="password"){
    
    x.type="text";

   }else{
      x.type="password";
    
   }

  }

</script>





 @endsection
 