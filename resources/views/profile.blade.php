
@extends('commonview.app')
@section('content')
@include('welcome-css')
@auth
@php
  
@endphp
    <div id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"></span>
                <span class="d-none d-lg-block">
                 <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{url('storage/app/public/'.Auth::user()->profilepic)}}" alt="AB" />
                </span>

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Profile</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#email">Email Address</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#password">Password</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#personaldetails">Personal Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#otherpersonaldetails">Other Personal Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#locationdetails">Location Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#profilepic">Profile Picture</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#manageaccount">Manage Account</a></li>

                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Back to Top</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                 <div class="display-4">
                  Hello <i class="fab fa-ello" style="color:pink"></i>
                  </div>
                    <h1 class="mb-0">
                      {{Auth::user()->first_name}}
                        <span class="text-primary">{{Auth::user()->last_name}}</span>
                    </h1>
                    <!-- <div class="subheading mb-5">
                       
                        
                    </div> -->
                    <div class="display-4">
                    Welcome to your Profile
                  </div>
                    <!-- <div class="social-icons">
                        <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                    </div> -->
                </div>
            </section>

            <hr class="m-0" />
          
            <section class="resume-section" id="email">
                <div class="resume-section-content">
                  <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                   <h2 class="mb-5" style="color: rgb(0, 99, 71)"><i class="fas fa-at"></i> Email Address</h2>
                 </div>
                  <div class="flex-shrink-0">
                          <a href="{{url('edit_user?p=uid')}}" target="_blank"><button type="button" class="btn border border-primary editbtn1"><i class="fas fa-user-edit"></i> EDIT Email</button></a>
                  </div>
                  </div>
                    <div class="subheading mb-5">
                       
                        This is your login id/username as well
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <a href="javascript:void(0)" class="display-4">{{Auth::user()->email}}</a>
                            <div class="subheading mb-3"></div>
                          @if(!(Auth::user()->email_verified===1))
                            <p class="lead mb-5" style="color:red">Please verify your email (Click on the button below to verify email)</p>
                            <button type="button" class="btn btn-info" id="verify_email"><i class="fas fa-certificate"></i> Verify Email</button>
                          @endif
                        </div>
                        @if(Auth::user()->email_verified===1)
                        <div class="flex-shrink-0 mt-3"><span class="text-success">Email is verified</span></div>
                        @else
                        <div class="flex-shrink-0 mt-3"><span class="text-primary">Email Not Verified</span></div>
                        @endif
                     </div>
                  </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Password-->
            <section class="resume-section" id="password">
                <div class="resume-section-content">
                   <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                    <h2 class="mb-5" style="color: rgb(0, 255, 181)"><i class="fas fa-key"></i> Password</h2>
                    </div>
                    <div class="flex-shrink-0">
                          <a href="{{url('edit_user?p=pwd')}}" target="_blank"><button type="button" class="btn border border-primary editbtn8"><i class="fas fa-key"></i> EDIT Password</button></a>
                  </div>
                </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h6 class="mb-0" style="color: red">For security, your Password <u>will not</u> be shown here</h6>
                            <div class="subheading mb-3"></div>
                            <p class="lead mb-5">Please change your password at regular intervals</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">Last updated on- {{ date('d M Y, h:i A',strtotime(Auth::user()->password_updated_at)) }} </span></div>
                    </div>
                    
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                   
            </section>
            <hr class="m-0" />
            <!-- Personal Details-->
            <section class="resume-section" id="personaldetails">
                <div class="resume-section-content">
                  <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                    <h2 class="mb-5" style="color: rgb(0, 70, 181)"><i class="fas fa-user-shield"></i> Personal Details</h2>
                    </div>
                    <div class="flex-shrink-0">
                      @if(!(Auth::user()->email_verified===1))
                       <p class="lead mb-5" style="color: red;">Please verify your email first.<br> Only then, you can edit these details</p>
                      @else
                      <a href="{{url('edit_user?p=pd')}}" target="_blank"><button type="button" class="btn border border-primary editbtn2"><i class="fas fa-user-secret"></i> EDIT Personal Details</button></a>
                      @endif
                    </div>
                  </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                         <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(106, 90, 205)">First Name</h3>
                            <p class="lead mb-5"> {{Auth::user()->first_name}}</p>
                         <!--    <div>Computer Science - Web Development Track</div> -->
                            
                        </div>
                     </div>
                   
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(106, 90, 205)">Last Name</h3>
                            <p class="lead mb-5">{{Auth::user()->last_name}}</p>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Other Personal Details-->
            <section class="resume-section" id="otherpersonaldetails">
                <div class="resume-section-content">
                   <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                    <h2 class="mb-5" style="color: rgb(63, 162, 132)"><i class="fas fa-user-shield"></i> Other Personal Details</h2>
                  </div>
                  <div class="flex-shrink-0">
                    @if(!(Auth::user()->email_verified===1))
                       <p class="lead mb-5" style="color: red;">Please verify your email first.<br>Only then, you can edit these details</p>
                      @else
                          <a href="{{url('edit_user?p=opd')}}" target="_blank"><button type="button" class="btn border border-primary editbtn3"><i class="fas fa-user-secret"></i> EDIT Other Personal Details</button></a>
                          @endif
                  </div>
                </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(186, 255, 100)">Mobile Number</h3>
                            <p class="lead mb-5">{{Auth::user()->mobno}}</p>
                         <!--    <div>Computer Science - Web Development Track</div> -->
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(186, 255, 100)">Date of Birth </h3>
                            <p class="lead mb-5">{{ date('d M Y',strtotime(Auth::user()->DOB)) }}</p>
                         </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(186, 255, 100)">Gender</h3>
                            <p class="lead mb-5">{{Auth::user()->gender}}</p>
                         </div>
                    </div>
                 </div>
            </section>
            <hr class="m-0" />
            <!-- Location Details-->
            <section class="resume-section" id="locationdetails">
                <div class="resume-section-content">
                  <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                  <h2 class="mb-5" style="color: rgb(155, 100, 55)"><i class="fas fa-search-location"></i> Location Details</h2>
                </div>
                  <div class="flex-shrink-0">
                    @if(!(Auth::user()->email_verified===1))
                       <p class="lead mb-5" style="color: red;">Please verify your email first.<br>Only then, you can edit these details</p>
                      @else
                          <a href="{{url('edit_user?p=ld')}}" target="_blank"><button type="button" class="btn border border-primary editbtn4"><i class="fas fa-map-marked-alt"></i> EDIT Location Details</button></a>
                          @endif
                        </div>
                      </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(255, 255, 168)">Address Line</h3>
                            <p class="lead mb-5">{{Auth::user()->address}}</p>
                          </div>
                       
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(255, 255, 168)">Country</h3>
                            <p class="lead mb-5">{{Auth::user()->country}}</p>
                         </div>
                      
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(255, 255, 168)">State</h3>
                            <p class="lead mb-5">{{Auth::user()->state}}</p>
                        </div>
                     
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(255, 255, 168)">City</h3>
                            <p class="lead mb-5">{{Auth::user()->city}}</p>
                        </div>
                       
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(255, 255, 168)">Pincode</h3>
                            <p class="lead mb-5">{{Auth::user()->pincode}}</p>
                         </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(255, 255, 168)">Complete Address</h3>
                            <p class="lead mb-5">{{Auth::user()->full_address}}</p>
                        </div>
                       
                    </div>
                </div>
            </section>
            <hr class="m-0" />
             <section class="resume-section" id="profilepic">
                <div class="resume-section-content">
                  <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                  <h2 class="mb-5" style="color: gray"><i class="fas fa-camera-retro"></i> Profile Picture/Avatar</h2>
                </div>
                  <div class="flex-shrink-0">
                    @if(!(Auth::user()->email_verified===1))
                       <p class="lead mb-5" style="color: red;">Please verify your email first.<br>Only then, you can edit these details</p>
                      @else
                         <a href="{{url('edit_user?p=pic')}}" target="_blank"><button type="button" class="btn border border-primary editbtn3"><i class="far fa-image"></i> Edit Profile Picture</button></a>
                         @endif
                    </div>
                  </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(180, 180, 180)">Current Avatar</h3>
                             <img class="img-fluid rounded mt-5" style="max-width: 100% ;height: auto;" src="{{url('storage/app/public/'.Auth::user()->profilepic)}}" alt="AB" />
                        </div>
                     
                    </div>
                </div>
            </section>
            <hr class="m-0" />
           
            <section class="resume-section" id="manageaccount">
                <div class="resume-section-content">
                  
                    <h2 class="mb-5" style="color: rgb(255, 62, 150)"><i class="far fa-id-card"></i> Manage Account</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                      @if(!(Auth::user()->email_verified===1))
                           <p class="lead mb-5" style="color: red;">Please verify your email first.Only then, you can edit the details or delete your account. You can only edit your <a href="#email"><i class="fas fa-edit"></i> email address</a> or <a href="#password"><i class="fas fa-edit"></i> password</a><br><br> You can contact Customer Support or an Administrator if you need more help with email verification</p>
                          @else
                        <div class="flex-grow-1">

                            <h3 class="mb-0" style="color: rgb(255, 118, 10)">Edit Account Details <i class="fas fa-edit"></i></h3>
                           <p class="lead mb-5">

                            You can edit individual details (link available in each section above). Or you can click on the button below to Edit your account details (all in one go)<br>
                          </p>
                           <strong class="text-danger">Please Note: </strong><br>
                           <p class="lead mb-5">
                           You cannot change your password here. Please <a href="#password"><i class="fas fa-arrow-right"></i> click here </a> and follow the link to change it.
                           </p>
                           <p class="lead mb-5">
                            To change your <strong class="text-secondary">Profile Picture</strong>, <a href="#profilepic"><i class="fas fa-arrow-right"></i> click here</a> and use the <u>Edit button</u> in the respective column
                           </p>
                           <a href="{{('edit_user?p=alldetails')}}" target="_blank"><button type="button" class="btn btn-warning" id="edit_user_button"><i class="fas fa-edit"></i> Edit All Details</button></a>
                         </div>
                       </div>
                     <div class="flex-shrink-0"><span class="text-primary"></span></div>

                    <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                        <div class="flex-grow-1">
                            <h3 class="mb-0" style="color: rgb(255, 0, 0)">Delete Account <i class="fas fa-user-times"></i> </h3>
                            <p class="lead mb-5">If that's what you want, go for it. Click the Delete button below</p>
                            <p class="lead mb-5">You are always welcome to recreate your account, should you change your mind later</p>
                           <button type="button" id="delete_user" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-user-times"></i> Delete Account</button>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    @endif
                </div>
            </section>
            <div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
      
        <h5 class="modal-title text-danger text-center"  id="exampleModalLabel"><i class="fas fa-exclamation-circle"></i> Are you sure you want to delete your account?</h5>
       
      </div>
      <div class="modal-body " method="post" autocomplete="off">
        <strong class="text-info text-center "><i class="fas fa-check-double"></i> Please Confirm your Details</strong>
        <form id="delete_user_form">
          @csrf
          <div class="form-group">
             <input type="hidden" name="_token" id="d_csrf" value="{{Session::token()}}">
            <input type="hidden" class="form-control" id="d_id" name="d_id" value="{{Auth::user()->id}}">
            <input type="hidden" class="form-control" id="d_email" name="d_email" value="{{Auth::user()->email}}">
             <!-- <input type="text" class="form-control" id="d_id" name="d_id" value="{{Auth::user()->id}}" readonly> -->
            <label for="d_full_name" class="col-form-label">Full Name:</label>
            <input type="text" class="form-control" id="d_full_name" name="d_full_name">
          </div>
          <div class="form-group">
            <label for="d_password" class="col-form-label">Confirm Your Password:</label>
            <input type="password" class="form-control" name="d_password" id="d_password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
        <button type="button" class="btn btn-danger" id="final_delete"><i class="far fa-trash-alt"></i> Delete User</button>
      </div>
    </div>
  </div>
</div>
        </div>

      
<script type="text/javascript">
   $(document).ready(function (){
    if({{Auth::check()}}){
      var em = "{{Auth::user()->email}}";
     $('#verify_email').click(function(e){
      $('#verify_email').html("Please Wait..");
          $.ajax({
             url:"{{url('emverrequest') }}",
             method:'get',
             data:{
               'email':em
             },
            success:function f(response){
              $('#verify_email').html("Verify Email");
              if(response.success===true){
                   swal({
                      title: response.title,
                      text: response.message,
                      icon: "success",
                      button: "Okay",
                    });
                }
             },
            error:function e(response){
              $('#verify_email').html("Verify Email");
             swal({
                  title: "Error in verifying mail",
                  text: "Please Try Later",
                  icon: "error",
                  button: "Okay",
                });

            }
 
          });
  
     });
   }

   });


</script>
<script type="text/javascript">
      
         $('#deleteModal').ready(function(){
          // alert("HELLO");
         
          $('#final_delete').on('click', function(e) {
           
            e.preventDefault();
             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       // var get_data = $("#delete_user_form").serialize(); 
            $.ajax({
               method:"post",
               url:"{{url('delete_user') }}",
               cache: false,
               processData:true,   //Required
               contentType: 'application/x-www-form-urlencoded',
               // data:get_data,
               data:

               {
                      'd_token'            :    $("#csrf").val(),
                       'd_id'              :    $('#d_id').val(),
                     'd_email'             :    $('#d_email').val(),
                     'd_full_name'         :    $('#d_full_name').val(),
                     'd_password'          :    $('#d_password').val(),

                },

                dataType :"JSON",
                success:function (response){
                   // console.log('delete----->',response);
                  if(response.success===true){
                                  swal({
                        title: "User deleted Successfully",
                        text: "You will now be logged out.Sorry to see you go!!",
                         icon: "warning",
                        button: false,
                         });

                        setTimeout(function(){ window.location = "{{url('login') }}";},2000);

                       }else if(response.success===false){
                         if(response.action===0){
                                      swal({
                                // title: "Error!",
                                 title: "Name or Password cannot be blank",
                                 text: "Please input correct details are try again",
                                icon: "warning",
                                button: true,
                                           });

                                 } else if(response.action===1){
                                      swal({
                                // title: "Error!",
                                 title: "Either Name or Password is not correct",
                                 text: "Please input correct details are try again",
                                icon: "warning",
                                button: true,
                                           });

                                 }else if(response.action===2){
                                      swal({
                                // title: "Error!",
                                 title: "Unauthenticated User! Please re-login to continue",
                                icon: "warning",
                                button: false,
                                       });
                         setTimeout(function(){ window.location = "{{url('login') }}";},100);



                                }
                  // console.log('delete----->',response);
                 // setTimeout(function(){ window.location = "login";},2000);
                }
              },
                error:function (response){
                  // console.log(textStatus.responseText);
                  swal({
                   title: "Oops! Some Error",
                   text: "Please use the Contact Us form to Contact us to Delete your Account",
                   icon: "warning",
                   button: true,
                  dangerMode: true,

                  });
                  
                   

                },
            }); //ajax ends here

          }); //$("#final_delete").click ends

          
            
         
  });
  
 //$('#delete_user').click(function(e) ends

 // });
 //  });

</script> 
    </div>
@endsection
@endauth
@guest
<script type="text/javascript">window.location="{{url('login') }}"</script>
@endguest
