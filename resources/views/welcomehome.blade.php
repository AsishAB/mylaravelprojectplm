
@extends('commonview.app')
@section('content')
@include('welcome-css')

    <div id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="" alt="AB" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Account Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#email">Email Address</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Password</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Personal Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Other Personal Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Location Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Account Related</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                      Asish
                        <span class="text-primary">B</span>
                    </h1>
                    <div class="subheading mb-5">
                        Jatni
                        <a href="#">name@email.com</a>
                    </div>
                    <p class="lead mb-5">Hello and Welcome to your Profile</p>
                    <!-- <div class="social-icons">
                        <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                    </div> -->
                </div>
            </section>
            <section class="resume-section" id="email">
                <div class="resume-section-content">
                   <h2 class="mb-5">Email Address</h2>
                    <div class="subheading mb-5">
                       
                        This is your login id/username too
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">name@email.com</h6>
                            <div class="subheading mb-3"></div>
                            <p class="lead mb-5"></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">Email verified-</span></div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Password-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Password</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Password won't be shown here</h6>
                            <div class="subheading mb-3"></div>
                            <p class="lead mb-5">Please change your password at regular intervals</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">Last updated on-Pasword</span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                           <a href=""> <h3 class="lead mb-0">Use this link to change your password</h3></a>
                            
                           
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Personal Details-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Personal Details</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">First Name</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                         <!--    <div>Computer Science - Web Development Track</div> -->
                            
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Last Name</h3>
                            
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Other Personal Details-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Other Personal Details</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Mobile Number</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                         <!--    <div>Computer Science - Web Development Track</div> -->
                            
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Date of Birth</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                         </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                 </div>
            </section>
            <hr class="m-0" />
            <!-- Location Details-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Address Line</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                          </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Country</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                         </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">State</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                        </div>
                      <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">City</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Pincode</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                         </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Complete Address</h3>
                            <p class="lead mb-5"> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rece</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Manage Account</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Edit Account Details</h3>
                           <p class="lead mb-5">Click the button below ,to Edit your account details</p>
                           <a href="edit_user"><button type="submit" class="btn btn-warning" id="edit_user_button">Edit Details</button></a>
                         </div>
                       </div>
                    
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>

                    <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Delete Account</h3>
                            <p class="lead mb-5">If that's what you want, go for it. Click the Delete button below</p>
                            <p class="lead mb-5">You are always welcome to recreate your account, if you change your mind later</p>
                           <button type="button" id="delete_user" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete Account</button>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"></span></div>
                    </div>
                    
                </div>
            </section>
        </div>

      
<script type="text/javascript">
  
    (function ($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top,
                    },
                    1000,
                    "easeInOutExpo"
                );
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $(".js-scroll-trigger").click(function () {
        $(".navbar-collapse").collapse("hide");
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $("body").scrollspy({
        target: "#sideNav",
    });
})(jQuery); // End of use strict

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
               url:"delete_user",
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

                        setTimeout(function(){ window.location = "login";},2000);

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
                         setTimeout(function(){ window.location = "login";},100);



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
