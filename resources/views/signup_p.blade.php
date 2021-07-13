@extends('commonview.app')
@section('content')
@include('signup-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 <div class="alert alert-info shadow text-center m-5 text-dark"><h3 class="display-4 ">New User Registration</h3></div>
<div class="container-fluid m-5 p-5">
=
<div class="row no-gutter">
        <!-- The image half -->
   <div class="col-md-6 d-none d-md-flex bg-image"></div>
  <!-- The content half -->
    <div class="col-md-6 bg-light">
      <div class="login d-flex align-items-center">
        <div class="container">
           <div class="row">
             <div class="col-lg-10 col-xl-7 mx-auto">
<form id="new_user1" autocomplete="off">
      	@csrf
    <input type="hidden" name="_token" id="_csrf" value="{{Session::token()}}">

    <!-- Email Page -->

<div id="emailpage" class="animate__animated animate__bounce animate__faster frm">
	<img src= "{{ asset('assets/img/blog-wp-login.png') }}" alt="Login" style=" width: 100px; height: 100px;" class="text-center"><br>
   <div class="form-group mb-2">
     <p class="text-muted mb-4">Let's start with your Login/UserName Info</p>

     <!-- Alert Box -->
      <div class="alert alert-danger " role="alert" id="alerts">
	   <strong id="emailtaken"></strong>
	 </div>

      <input id="email" name="email" type="text" placeholder="Email address" class="form-control rounded-pill border-0 shadow-sm px-4">
        <div class="error text-danger"></div> 
         </div>

          <button type="button" class="btn btn-primary btn-block text-uppercase mb-4 mt-2 rounded-pill shadow-sm step1" id="start">Get started <i class="fas fa-arrow-alt-circle-right"></i></button>   
        </div>

   <!-- Password Page -->

 <div id="passworddetailspage" class="animate__animated animate__bounce animate__faster frm">
   <img src= "{{ asset('assets/img/blog-wp-login.png') }}" alt="Login" style=" width: 100px; height: 100px;" class="text-center"><br>
   <p class="text-muted mb-4">Please use a strong Password</p>

    <div class="form-group mb-3" >
      <input  type="password" id="password" name="password" placeholder="Password" class="form-control rounded-pill border-0 shadow-sm px-4">
     <div class="error text-danger"></div>
     </div>

     <div class="form-group mb-3">
     <input id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" class="form-control rounded-pill border-0 shadow-sm px-4 ">
     <div class="error text-danger"></div>
      </div>

   <input type="checkbox" name="chkbox" onclick="showpwd()"> Show Password

   <button type="button" class="btn btn-warning btn-block text-uppercase mb-2 rounded-pill shadow-sm back2"><i class="fas fa-backward"></i> Previous</button>

   <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm step2">Next <i class="fas fa-forward"></i></button>
    </div>


    <!-- Personal Details -->

<div id="personaldetailspage" class="animate__animated animate__bounce animate__faster frm">
  <img src=  "{{ asset('assets/img/blog-wp-login.png') }}" alt="Login" style=" width: 100px; height: 100px;" class="text-center"><br>
   <p class="text-muted mb-4">Personal Details</p>
    <div class="form-group mb-3" >
       <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control rounded-pill border-0 shadow-sm px-4">
        <div class="error text-danger"></div>
   </div>

     <div class="form-group mb-3" >
       <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control rounded-pill border-0 shadow-sm px-4">
      <div class="error text-danger"></div>
      </div>

 <button type="button" class="btn btn-warning btn-block text-uppercase mb-2 rounded-pill shadow-sm back3"><i class="fas fa-backward"></i> Previous</button>

   <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm step3">Next <i class="fas fa-forward"></i></button>
    </div>



  <!-- Other Personal Details -->

 <div id="otherdetailspage" class="animate__animated animate__bounce animate__faster frm">
  <img src= "{{ asset('assets/img/blog-wp-login.png') }}" alt="Login" style=" width: 100px; height: 100px;" class="text-center"><br>
    <p class="text-muted mb-4">Other Personal details</p>

  <div class="form-group mb-3" >
   <input id="mobno" name="mobno" type="text" placeholder="Mobile Number" class="form-control rounded-pill border-0 shadow-sm px-4">
    <div class="error text-danger"></div>
  </div>

 <div class="form-group mb-3" id="form1">
 <input id="dob" name="dob" type="text" placeholder="Date of Birth (YYYY-MM-DD)" class="form-control rounded-pill border-0 shadow-sm px-4">
  <div class="error text-danger"></div>

    <div class="form-group mb-3" id="form1">
     <label for="gender">Gender:</label>
     <br>
	   &nbsp;&nbsp;&nbsp;&nbsp;

	  <input class="form-check-input gender" type="radio"  name="gender" id="Female" value="Female">
	  <label class="form-check-label" for="Female">Female</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	  <input class="form-check-input gender" type="radio"  name="gender" id="Male" value="Male">
	  <label class="form-check-label" for="Male"> Male </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	  <input class="form-check-input gender " type="radio" name="gender" id="Other" value="Other">
	  <label class="form-check-label" for="Other">Other</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>

  <div class="error text-danger"></div>
  </div>
</div>

  <button type="button" class="btn btn-warning btn-block text-uppercase mb-2 rounded-pill shadow-sm back4"><i class="fas fa-backward"></i> Previous</button>

    <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm step4">Next <i class="fas fa-forward"></i></button>
 </div>


<!-- Optional Location Details -->

 <div id="locationdetailspage" class="animate__animated animate__bounce animate__faster frm">
  <img src=  "{{ asset('assets/img/blog-wp-login.png') }}" alt="Login" style=" width: 100px; height: 100px;" class="text-center"><br>
  <p class="text-muted mb-4">Location details</p>
   <p class="text-muted mb-4">You can skip this step and add them later</p>

   <div class="form-group mb-3" >
   <textarea id="address" name="address" placeholder="Address Line 1" class="form-control rounded-pill border-0 shadow-sm px-4"></textarea> 
   <div class="error text-danger"></div>
  </div><br>

  <div class="form-group mb-3">

 <select name="country" class="form-control rounded-pill border-0 shadow-sm px-4" id="countrylist">
      <option disabled selected>Select Country</option>
      
      @foreach($countryname as $key => $country)
       <option id="countryname" value="{{$country->countryname}}" {{old('country')==$country->countryname ?'selected' :''}}>{{$country->countryname}}</option>
       
        @endforeach
     </select>
   
   </div>

  <div class="form-group mb-3" id="statelistdiv">
  <select name="state" id="statelist" class="form-control demoInputBox">
      <option readonly disabled>Select State</option>
    
    </select>
  <div class="error text-danger"></div>
   </div>

<div class="form-group mb-3" id="citylistdiv">
 <select name="city" id="citylist" class="form-control demoInputBox">
         <option readonly disabled>Select City</option>
       </select>
 <div class="error text-danger"></div>
 </div>

<div class="form-group mb-3">
 <input id="pincode" name="pincode" type="text" placeholder="Pin Code" class="form-control rounded-pill border-0 shadow-sm px-4">
</div>
<div class="error text-danger"></div>

<button type="button" class="btn btn-warning btn-block text-uppercase mb-2 rounded-pill shadow-sm back5"><i class="fas fa-backward"></i> Previous</button>

 <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm step5">Next <i class="fas fa-forward"></i></button>


  </div>


   <!-- Review Page -->



   <div id="signupnowpage" class="animate__animated animate__bounce animate__faster frm">
   <img src=  "{{ asset('assets/img/blog-wp-login.png') }}" alt="Login" style=" width: 100px; height: 100px;" class="text-center"><br>

   <p class="text-muted mb-4">All Set.</p>

   <p class="text-muted mb-4">Please review your data before submitting<strong> specifically your Email and Password</strong> You can change all other data after your registraton is complete too</p>

     <strong>Email : </strong>          <span id="uid"></span><br>
     <strong>Password :</strong>       <span  id="pwd">It won't be shown. But you can change it by clicking previous                         button</span><br>
     <strong>First Name : </strong>     <span id="fn"></span><br>
     <strong>Last Name : </strong>      <span id="ln"></span><br>
     <strong>Full Name : </strong>      <span id="fum"></span><br>
     <strong>Mobile : </strong>         <span id="mob"></span><br>
     <strong>Date of Birth : </strong>  <span id="db"></span><br>
     <strong>Gender : </strong>         <span id="gnd"></span><br>
     <strong>Address : </strong>        <span id="addr"></span><br>
     <strong>Country : </strong>        <span id="cou"></span><br>
     <strong>State : </strong>         <span id="st"></span><br>
     <strong>City : </strong>           <span id="ct"></span><br>
     <strong>Pincode : </strong>        <span id="pin"></span><br>


<div class="form-group mb-3">
  <label class="form-check-label">Do you want to verify your email now? </label>
 <select name="emver" id="emver" class="form-control rounded-pill border-0 shadow-sm px-4">
         <option class="mb-2 rounded-pill shadow-sm" value="yes">Yes.Send me Instructions to verify email</option>
         <option class="mb-2 rounded-pill shadow-sm" value="no" selected>No.I will do it later,after logging into my account</option>
       </select>
 <!-- <div class="error text-danger"></div> -->
 </div>
<button type="button" class="btn btn-warning btn-block text-uppercase mb-2 rounded-pill shadow-sm back6"><i class="fas fa-backward"></i> Previous</button>

 <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" id="submit_now"><i class="fas fa-check-circle"></i> Sign Up <i class="fas fa-check-circle"></i></button><br>
 
  <button type="button" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm"  id="cancel_rgn"><i class="far fa-window-close"></i> Cancel Registration </i></button>
  </div>
  <!-- Email verification request -->
 
 </form>
 <a href="{{url('login')}}">Already Signed up? Login Here</a>
 </div>
  </div>
</div><!-- End -->
</div>

<script type="text/javascript">

 $(document).ready(function(){
   $(function(){
     viewStateList();
     viewCityList();
    });
   
 //     $('#statelistdiv').hide();
 // $('#citylistdiv').hide();
 // $('#pincode').hide();

  
function viewStateList(){
 var countryname = $('#countrylist').val();
 
     console.log("State Name for Country",countryname);

       if(!countryname){
         return;
       }
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
           });  
                $.ajax({
                       type:'GET',
                       url: "{{ url('get-states?countryname=') }}"+countryname,
                       success:function(response){
                         // console.log(response);
                         if(response){
                            // $('#statelistdiv').show();
                           $("#statelist").empty();
                           // If no State exists for a country
                           if(response.length==0){
                               $('#statelist').append('<option value="Unnamed State in '+countryname+'">Unnamed State in '+countryname+'</option>');
                             }
                            
                            // $("#statelist").append('<option>Select State</option>');
                            $.each(response,function(key,value){
                             console.log("States-> ",value);
                               $("#statelist").append('<option value="'+value+'">'+value+'</option>');
                             
                              
                               });
                         }

                      },
        

                }); //ajax ends

 
} //viewStateList ends

function viewCityList(){
var statename = $('#statelist').val();
  console.log("City Name for state",statename);
       if(!statename){
         return;
       }
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
           });  
       $.ajax({
                 type:'GET',
                 url: " {{ url('get-cities?statename=') }} "+statename,

                 success:function(response){
                   // console.log(response);

                   if(response){                  
                     // $('#citylistdiv').show();
                     $("#citylist").empty();
                      // $("#citylist").append('<option>Select City</option>');
                      if(response.length==0){
                       $('#citylist').append('<option value="Unnamed City in '+statename+'">Unnamed City in '+statename+'</option>');
                     }
                    
                      $.each(response,function(key,value){
                       console.log("Cities-> ",value);
                       
                         $("#citylist").append('<option value="'+value+'">'+value+'</option>');
                       
                         
                             // $('#pincode').show();
                     });
                   }
                     // $('#pincode').show();
                 },

   

          }); //ajax ends


} //viewCityList ends

$('#countrylist').change(viewStateList);
   

$('#statelist').change(viewCityList);

     


      


 

}); //ready fn ends
</script>

</div><!-- End -->
</div>
</div>

<!-- jQuery validation Plugin -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<!-- Other Scripts -->
<script type="text/javascript">
function showpwd(){
    // $(this).find($(".far")).toggleClass('fa-eye fa-eye-slash');
   var xy = document.getElementById('password');
   var xz= document.getElementById('cpassword');
   if(xy.type==="password" && xz.type==="password"){
    
    xy.type="text";
    xz.type="text";

   }else{
      xy.type="password";
      xz.type="password";
    
   }
}
	$(document).ready(function(e){
     
     $('#cancel_rgn').click(function(e){
       swal({
              title: "Are you sure?",
              text: "You will have to start from the first page again, if you want to signup",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("You will now be redirected.,", {
                  icon: "success",
                  button:false
                }); setTimeout(function(){location.replace("{{ url('signup') }}");},2000);
              } else {
                swal("Please continue with the signup process");
              }
            });

     });

		//Toggle password visiblity
		
    $('#alerts').hide();
    $('#passworddetailspage').hide();
     $('#personaldetailspage').hide();
    $('#otherdetailspage').hide();
    $('#locationdetailspage').hide();
    $('#signupnowpage').hide();

     jQuery.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
        }, "No white space. Please clear any blank space between, before and after the text");

        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

     var x= $('#new_user1').validate({
      focusCleanup:true,
      rules: {
                
                first_name:{
                    required:true,
                    nowhitespace :true
                },

                last_name:{
                    required:true,
                    nowhitespace :true
                },
         
                email: {
                    required: true,
                    email: true,
                    nowhitespace :true
                },
                password:{
                  required:true,
                  nowhitespace:true,
                  minlength:8
                },
                cpassword:{
                  required:true,
                  nowhitespace:true,
                  equalTo:"#password"
                },

                mobno:{
                    required:true,
                    digits:true,
                    minlength: 10,
                    maxlength: 10,
                    nowhitespace :true
                },

                dob:{
                    required:true,
                    date:true,
                    dateISO: true,
                    nowhitespace :true
                },

                // gender:{
                //     requiredRadioValue:true
                // },
                
                // address:{
                //     required:true,
                //     // nowhitespace :true
                // },

                // country:{
                //     required:true,
                //     // nowhitespace :true
                // },
                // state:{
                //     required:true,
                //     // nowhitespace :true
                // },
                // city:{
                //     required:true,
                //     // nowhitespace :true
                // },
                // pincode:{
                //     required:true,
                //     nowhitespace :true
                // },
            },

            messages: {
                first_name: {
                    required:"Firstname field cannot be empty",
                },
                last_name: {
                    required:"Lastname field cannot be empty",
                },
                email: {
                    required: "Email address cannot be blank",
                    email: "Email format should be example@examle.com or similar",
                    // remote: "Email id is already taken. Please use another one."
                },
                password:{
                    required:"Password cannot be empty",
                    
                    minlength:"Password must be 8 chars long",
                    
                },
                cpassword:{
                    required:"Confirm Password cannot be empty",
                    equalTo:"Password and Confirm Password must be same"
                },
                mobno:{
                    required:"Mobile Number cannot be empty",
                    digits:"Mobile number must contain only numbers from 0-9",
                    minlength:"Mobile number must be 10 digits long",
                    minlength:"Mobile number must be 10 digits long",
                },
                dob:{
                    required:"Date of Birth cannot be empty",
                    date:"The Date input must be a date",
                    dateISO: "The Date input must be of the form YYYY-MM-DD"
                },
                gender:{
                    requiredRadioValue:"Please select one option",
                },
                // address:{
                //     required:"The address field cannot be empty"
                // },  
                // country:{
                //     required:"The country field cannot be empty "
                // },
                // state:{
                //     required:"The state field cannot be empty "
                // },
                // city:{
                //     required:"The city field cannot be empty "
                // },
                // pincode:{
                //     required:"The pincode field cannot be empty "
                // },
            },
            errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },
        });
     // $('.step1').click(function(){
     //  if(x.form()){
     //     $('.frm').hide();
     //   $("#passworddetailspage").show();
      
     //    }
   // });
 $('.step1').click(function(){
	 	$.ajax({
         url:" {{url('check-email') }}",
         type:'get',
         data:{
             'email':$('#email').val(),
            },
            dataType:'JSON',
            success: function e(response){
                 if(response.success==false){
                 	
                 	var em= $('#email').val();
                 	em+= " is taken. Please try a different one";
                 	em+= " or <a href='login'>Login Now</a>  ";
                 	 $(".frm").hide();
               $('#emailpage').show();
               	$('#alerts').show();
              $('#emailtaken').html(em);
              $('#email').val("");
             }else{
             	if(x.form()){
             	$('#alerts').hide();
             	$('.frm').hide();
             	$("#passworddetailspage").show();
                 }
             }

            },
            error:function e1(response){
                console.log('error=>' ,response);

            }
          });


	 });


     $('.step2').click(function(){
      if(x.form()){
       $('.frm').hide();
       $('#personaldetailspage').show();
      }
     });
     $('.step3').click(function(){
      if(x.form()){
       $('.frm').hide();
       $('#otherdetailspage').show();
      }
     });

     $('.step4').click(function(){
      if(x.form()){
       $(".frm").hide();
       $("#locationdetailspage").show();
       }
     });
      $('.step5').click(function(){
      if(x.form()){
       $(".frm").hide();

var email = $('#email').val();
var fname = $('#first_name').val();
var lname = $('#last_name').val();
var name = fname+" "+lname;
var mobile = $('#mobno').val();
var gender = $('.gender:checked').val();
// var gender = $(".gender:selected").val();
var gender  = $('input[name="gender"]:checked').val();
var dob = $('#dob').val();
var address = $('#address').val();
var country = $('#countrylist').val();
var state = $('#statelist').val();
var city = $('#citylist').val();
var pincode = $('#pincode').val();

$('#uid').html(email);
$('#fn').html(fname);
$('#ln').html(lname);
$('#fum').html(name);
$('#mob').html(mobile);
$('#db').html(dob);
$('#gnd').html(gender);
$('#addr').html(address);
$('#cou').html(country);
$('#st').html(state);
$('#ct').html(city);
$('#pin').html(pincode);
       $("#signupnowpage").show();
       }
     });
      


     $('.back2').click(function(){
       $(".frm").hide();
       $("#emailpage").show();
       });
    

   
     $('.back3').click(function(){
       $(".frm").hide();
        $("#passworddetailspage").show();
       });

     
     $('.back4').click(function(){
        $(".frm").hide();
      $("#personaldetailspage").show();
      });


      $('.back5').click(function(){
        $(".frm").hide();
      $("#otherdetailspage").show();
     });
      $('.back6').click(function(){
        $(".frm").hide();
      $("#locationdetailspage").show();
     });


 
 
  //disable form submit on hittin Enter key
$('#new_user1').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});


$('#submit_now').on('click',function(e){
   e.preventDefault();
   $('#submit_now').html("Please Wait..");
   if($('#new_user1').valid()){
   // console.log( $('new_user1' ).serialize());exit();

   	$.ajax({
    method:"post",
    url:"{{ url('submit-form') }}",
    cache: false,
    processData:true,   //Required
    contentType: 'application/x-www-form-urlencoded',
     data: {
          '_token'             :    $("#csrf").val(),
         'first_name'         :    $('#first_name').val(),
          'last_name'         :    $('#last_name').val(),
          'email'             :    $('#email').val(),
          'password'           :    $('#password').val(),
          'mobno'              :    $('#mobno').val(),
          'dob'                 :     $('#dob').val(),
          'gender'              :   $('input[name="gender"]:checked').val(),
          'address'              :    $('#address').val(),
          'country'              :    $('#countrylist').val(),
           'state'              :     $('#statelist').val(),
            'city'              :      $('#citylist').val(),
            'pincode'              :  $('#pincode').val(),
            'emver'             : $('#emver').val(),
          'dt'                  :      $('#dt').val(),
      },  
      dataType: 'JSON',
     success:function(){
      $('#submit_now').html('<i class="fas fa-check-circle"></i> Sign Up <i class="fas fa-check-circle"></i>');
            swal({
         title: "New User Registered . Welcome !",
         text: " You will now be directed to Login Page. Please verify your email too.",
         icon: "success",
         button: true,
      }).then((value) => {
         setTimeout(function(){ window.location="{{ url('login') }}";},100);
                  });
      setTimeout(function(){ window.location="{{ url('login') }}";},8000);
       },
       error: function error_in_contact(response){
         $('#submit_now').html('<i class="fas fa-check-circle"></i> Sign Up <i class="fas fa-check-circle"></i>');
            swal({
                title: "Something is wrong",
                text: "Please try later",
                icon: "error",
                button: "Okay",
                  });
               console.log("Error=> ",response);
                    },

   	}); //Ajax ends
 }
 
	});
 });
</script>



@endsection

@guest
@endguest
@auth
<script type="text/javascript">window.location="{{ url('dashboard') }}"</script>
@endauth