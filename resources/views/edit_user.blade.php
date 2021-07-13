@auth
@extends('commonview.app')
@include('editform-css')
@section('content')
@include('welcome-css')
  
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"></span>
                <span class="d-none d-lg-block"> <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{url('storage/app/public/'.Auth::user()->profilepic)}}" alt="Profile Pic(if any)?" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                 @if($p == 'uid')
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#email">Edit Email Address</a></li>
                 @endif

                 @if($p == 'pwd')
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#password">Edit Password</a></li>
                 @endif

                 @if($p == 'pd')
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#personaldetails">Edit Personal Details</a></li>
                 @endif

                 @if($p == 'opd')
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#otherpersonaldetails">Edit Other Personal Details</a></li>
                 @endif

                 @if($p == 'ld')
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#locationdetails">Edit Location Details</a></li>
                 @endif  

                  @if($p == 'pic')
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Edit Profile Picture</a></li>
                 @endif 

                  @if($p == 'alldetails')
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Edit Details</a></li>
                 @endif      
                </ul>
            </div>
        </nav>
  <div class="body2">
 <div class="agile-login">

    <h1>Hello There! </h1>
    <div class="text-center">
    <strong class="text-warning"><i class="fas fa-info"></i> Please Note : </strong><p class="text-white"> If you see this icon <i class="fas fa-skull-crossbones" style="color:red;"></i> in the <u>Edit</u> Button and are unable to edit your details, please <strong>wait for a few seconds</strong>. If you still cannot edit, please <a href="#" id="reloadpage" class="text-info">click here to reload this page</a> and try again.</p>
  </div>
    <div class="wrapper">
      
      <div class="w3ls-form">
      
        @if($p == 'uid')
        <p class="text-white text-center">Edit Email/Username</p>
        <div class="alert alert-danger" role="alert" id="alerts">
            <strong id="emailtaken"></strong>
        </div>
        <h2>Edit Email</h2>
        <form id='editemail' autocomplete="off">
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="{{Auth::user()->id}}">
          <label>Username/Email</label>
          <input type="text" name="email" id="email" placeholder="Username/Email" value="{{Auth::user()->email}}">
          <div class="error text-danger"></div>
          <button type="submit" class="buttons bttn" id='editemailb'>Edit</button>
          <button type="button" class="cancelb">Cancel</button>
        </form>
        @endif

       @if($p == 'pwd')
<p class="text-white text-center">Edit Password</p>
       <div class="jumbotron border border-info">
  <h5 class="display-5 text-center text-dark ">Do you remember your current password?</h5>
  <p class="text-center">
   <button type="button" class="btn btn-primary" id="rp_yes">Yes</button>
   <button type="button" class="btn btn-danger"  id="rp_no">No</button>
</p><br>
<div class="text-center">
 <button type="button" class="cancelb" style="color: brown">Cancel</button>
</div>
</div>
<div class="collapse border border-danger rounded" id="not_rem_p">
    <h1 class="display-5 text-center text-info">Hmm! Seems like you were logged in before.</h1>
    <p class="text-center text-white">
       <strong> It seems like you are logged in, because of a previous session.<br>
        Unfortunately, you cannot change your password from here.<br>
    </strong>
          </p> 
      <div class="alert alert-warning ml-2 mr-2">
    <strong>Please use  <a href="#" id="forgot_password">Forgot Password <i class="fas fa-external-link-alt"></i></a> to Reset your Password</strong>
     </div>
  
</div>
<div class="collapse"  id="password_reset_div">
<div class="w3ls-form " >
<h5 class="text-white">Great, please fill out this form to change your password</h5>
        
        <form  autocomplete="off" id='password_reset_form'>
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="rp_id" id='rp_id' value="{{Auth::user()->id}}">
          <label>Current Password:</label>
          <input type="password" class="pwdfield" id="rp_current_password" name="rp_current_password">
          <div class="error text-danger"></div>
          <label>New Password:</label>
          <input type="password" class="pwdfield" name="rp_new_password" id="rp_new_password">
          <div class="error text-danger"></div>
          <label>Confirm Password:</label>
          <input type="password" class="pwdfield" name="rp_confirm_password" id="rp_confirm_password">
          <div class="error text-danger"></div>
          <button type="submit" class="buttons bttn" id='change_password'>Change Password</button>
          <button type="button" class="cancelb">Cancel</button>
        </form>
        <div class="alert alert-danger alert-dismissible shadow fade show m-4" role="alert" id="alert_errors">            <strong id="alert_messages"></strong>
        </div> 
    </div>
</div>

       @endif
       
      @if($p == 'pd')

        <form id='editpersonaldetails' autocomplete="off">
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="{{Auth::user()->id}}">
          <label>First Name</label>
          <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{Auth::user()->first_name}}">
          <div class="error text-danger"></div>
          <label>Last Name</label>
          <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{Auth::user()->last_name}}">
          <div class="error text-danger"></div>
          <button type="submit" class="buttons bttn" id='editpdb'>Edit</button>
          <button type="button" class="cancelb">Cancel</button>
        </form>
       @endif

       @if($p == 'opd')
        <h2>Edit Other Personal Details</h2>
          <form id='editotherdetails' autocomplete="off">
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="{{Auth::user()->id}}">
          <label>Mobile Number</label>
          <input type="text" name="mobno" id="mobno" placeholder="Mobile Number" value="{{Auth::user()->mobno}}">
          <div class="error text-danger"></div>
          <label>Date of Birth (YYYY-MM-DD format)</label>
          <input type="text" name="dob" id="dob" placeholder="Date of Birth(YYYY-MM-DD)" value="{{Auth::user()->DOB}}">
          <div class="error text-danger"></div>
          <label>Gender</label>
          <br>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input  type="radio" name="gender" id="Female" value="Female" {{(Auth::user()->gender == "Female") ? 'checked' :''}}>
              <label  for="Female">
                Female
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <input type="radio" name="gender" id="Male" value="Male" {{(Auth::user()->gender == "Male") ? 'checked' :''}}>
              <label  for="Male">
                Male
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
              <input  type="radio" name="gender" id="Other" value="Other" {{(Auth::user()->gender == "Other") ? 'checked' :''}}>
              <label  for="Other">
                Other
              </label>
          <div class="error text-danger"></div>
          <button type="submit" class="buttons bttn" id='editopdb'>Edit</button>
          <button type="button" class="cancelb">Cancel</button>
             </form>
            @endif

            @if($p == 'ld')
            <h2>Edit Location Details</h2>
          <form id='editlocationdetails' autocomplete="off">
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="{{Auth::user()->id}}">
          <label>Address</label>
          <textarea name="address" id="address" placeholder="Address Line">{{Auth::user()->address}}</textarea>
          <label>Country</label>
            <select name="country" id="countrylist">
                <option disabled selected>Select Country</option>
                @php
                   $countryname = DB::table('countries')->get();
                @endphp
                     @foreach($countryname as $key => $country)
                       <option id="countryname" value="{{$country->countryname}}" {{Auth::user()->country == $country->countryname ? 'selected' : ''}}>{{$country->countryname}}</option>
                    @endforeach
            </select>
          <label>State</label>
                  <select name="state" id="statelist">
              <option readonly disabled>Select State</option>
           </select>
          <label>City</label>
           <select name="city" id="citylist">
         <option readonly disabled>Select City</option>
       </select>
          <label>Pin Code</label>
          <input type="text" name="pincode" id="pincode" placeholder="Pin Code" value="{{Auth::user()->pincode}}">
        <button type="submit" class="buttons bttn" id='editldb'>Edit</button>
        <button type="button" class="cancelb">Cancel</button>
        </form>
         @endif


    @if($p == 'pic')
      <h2>Edit Profile Picture</h2>
        <form id='profilepic' autocomplete="off" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="{{Auth::user()->id}}">
          <label>Select an image to upload : <br><br>(only jpg, jpeg,png files are allowed)</label><br><br>
          <input type="file" name="mypic" id="mypic" class="text-white">
          <div class="error text-danger"></div>
          <button type="submit" class="buttons bttn" id='editprofilepic'>Upload Image</button>
          <button type="button" class="cancelb">Cancel</button>
        </form>
      
    @endif

         @if($p == 'alldetails')
         <div class="alert alert-danger " role="alert" id="alerts">
              <strong id="emailtaken"></strong>
          </div>
          <h2>Edit Your Details</h2>
        <form id='editdetails' autocomplete="off">
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="{{Auth::user()->id}}">
          <label>Username/Email</label>
          <input type="text" name="email" id="email" placeholder="Username/Email" value="{{Auth::user()->email}}">
          <div class="error text-danger"></div>
          <label>First Name</label>
          <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{Auth::user()->first_name}}">
          <div class="error text-danger"></div>
          <label>Last Name</label>
          <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{Auth::user()->last_name}}">
          <div class="error text-danger"></div>
          <label>Mobile Number</label>
          <input type="text" name="mobno" id="mobno" placeholder="Mobile Number" value="{{Auth::user()->mobno}}">
          <div class="error text-danger"></div>
          <label>Date of Birth (YYYY-MM-DD format)</label>
          <input type="text" name="dob" id="dob" placeholder="Date of Birth(YYYY-MM-DD)" value="{{Auth::user()->DOB}}">
          <div class="error text-danger"></div>
          <label>Gender</label>
          <br>
               &nbsp;&nbsp;&nbsp;&nbsp;
              <input  type="radio" name="gender" id="Female" value="Female" {{(Auth::user()->gender == "Female") ? 'checked' :''}}>
              <label  for="Female">
                Female
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <input type="radio" name="gender" id="Male" value="Male" {{(Auth::user()->gender == "Male") ? 'checked' :''}}>
              <label  for="Male">
                Male
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
              <input  type="radio" name="gender" id="Other" value="Other" {{(Auth::user()->gender == "Other") ? 'checked' :''}}>
              <label  for="Other">
                Other
              </label>
              <div class="error text-danger"></div>
             <label>Address Line</label>
          <textarea name="address" id="address" placeholder="Address Line">{{Auth::user()->address}}</textarea>
          <label>Country</label>
            <select name="country" id="countrylist">
                <option disabled selected>Select Country</option>
                @php
                   $countryname = DB::table('countries')->get();
                @endphp
                     @foreach($countryname as $key => $country)
                       <option id="countryname" value="{{$country->countryname}}" {{Auth::user()->country == $country->countryname ? 'selected' : ''}}>{{$country->countryname}}</option>
                    @endforeach
            </select>
          <label>State</label>
                  <select name="state" id="statelist">
              <option selected disabled>Select State</option>
           </select>
          <label>City</label>
           <select name="city" id="citylist">
         <option selected disabled>Select City</option>
       </select>
          <label>Pin Code</label>
          <input type="text" name="pincode" id="pincode" placeholder="Pin Code" value="{{Auth::user()->pincode}}">

          <button type="submit" class="buttons bttn" id='editdetailsb'>Edit</button>
          <button type="button" class="cancelb">Cancel</button>
        </form>
     @endif

      </div>
     
      
    </div>
    <br>
   </div> 
</div>


  
<script type="text/javascript">
 $(function(){
     viewStateList();
     viewCityList();
    }); 
function viewStateList(){
 var countryname = $('#countrylist').val();
 
    // console.log("State Name for Country",countryname);

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
                       url: 'get-states?countryname='+countryname,
                       success:function(response){
                         // console.log(response);
                         if(response){
                            // $('#statelistdiv').show();
                           $("#statelist").empty();
                           // If no State exists for a country
                           if(response.length==0){
                               $('#statelist').append('<option value="Unnamed State in '+countryname+'">Unnamed State in '+countryname+'</option>');
                             }
                            
                            $.each(response,function(key,value){
                             // console.log("States-> ",value);
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
                 url: "{{url('get-cities?statename=')}}"+statename,

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
                       // console.log("Cities-> ",value);
                       
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

 
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<script type="text/javascript">
   $(document).ready(function(){
 $('#alert_errors').hide();
 $('#alerts').hide();
 $('#rp_yes').click(function(){
            $("#password_reset_div").collapse('show');
                 $("#not_rem_p").collapse('hide');
        });
        $('#rp_no').click(function(){
                $("#not_rem_p").collapse('show');
                $("#password_reset_div").collapse('hide');
        });
$('#reloadpage').click(function(e){
     e.preventDefault();
     location.reload();
 });



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
    var noofsubmits = 0;
    $('.cancelb').click(function(){
      swal({
          title: "Dont want to change anything? Alright !",
          text: "You will be redirected to your Profile Page. Or, click 'Okay' to be redirected immediately.",
          icon: "success",
          button: true,      
      }).then((value)=>{
        setTimeout(function(){ location.replace("{{ url('profile') }}");},100);
      });
      setTimeout(function(){ location.replace("{{ url('profile') }}");},10000);
    }); 
    
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
     jQuery.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
        }, "No white space please. Also, please remove spaces before,between and after the text");
      var x = $('#editemail').validate({
         
          rules:{
            email: {
                  required: true,
                  email: true,
                  nowhitespace :true
                },
              },
            messages:{
                 email:{
                     required: "The email address field cannot be blank",
                     email: "Please enter email address in the format example@example.com",
                 },
              },
           errorPlacement: function (error, element) {
            element.each(function () {
                $(this).next("div .error").html(error);
            });
        },

      }); //validator ends
      
    $('#editemailb').on('click',function(e){
     
    e.preventDefault();
    var em= $('#email').val();
    if($('#editemail').valid()){
       noofsubmits++;
       if(noofsubmits > 1){
         $('.bttn').html('<i class="fas fa-skull-crossbones" style="color:red;"></i>');
      }

          if(noofsubmits == 1){
         $.ajax({
         url:"{{url('check-email')}}",
         type:'get',
         data:{
             'email':$('#email').val(),
            },
            dataType:'JSON',
            success: function e(response){
             
                    if(response.success==false){
                        if(em != "{{Auth::user()->email}}"){
                          em+= " is taken. Please use a different email address";
                          $('#alerts').show();
                          $('#emailtaken').html(em);
                          
                          $('#editemail')[0].reset();
                          noofsubmits=0;
                      
                      }else{
                          Command: toastr["warning"]("No change in email! Please hit the <u>cancel button</u> if you <u>do not</u> want to change it")
                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-full-width",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut",
                              
                            }
                             
                         $('#editemail')[0].reset();
                         noofsubmits=0;
                    }
                  }else{
                      $.ajax({
                        url:"{{url('edituser_email')}}",
                        method:'post',
                        cache: false,
                        processData:true,   //Required
                        contentType: 'application/x-www-form-urlencoded',
                        data:{
                             '_token' :$('#csrf').val(),
                             'id'     : $('#id').val(),
                             'email'  : $('#email').val(),
                        },
                        success: function ew(response){
                          
                             Command: toastr["success"]("Username changed.Please verify your email. Please note: Your login id has also changed", "You will be redirected..")
                                toastr.options = {
                                  "closeButton": false,
                                  "debug": false,
                                  "newestOnTop": false,
                                  "progressBar": true,
                                  "positionClass": "toast-top-full-width",
                                  "preventDuplicates": false,
                                  "onclick": null,
                                  "showDuration": "300",
                                  "hideDuration": "1000",
                                  "timeOut": "5000",
                                  "extendedTimeOut": "1000",
                                  "showEasing": "swing",
                                  "hideEasing": "linear",
                                  "showMethod": "fadeIn",
                                  "hideMethod": "fadeOut"
                                }

                                
                                 setTimeout(function(){ location.replace('http://localhost/LaraTest/public/profile');},5500);
                              
                        },
                        error: function e(response){
                           Command: toastr["error"]("Some error : Please try later", response.message)
                             toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-full-width",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                              }

                        }
                        
                      });//ajax ends

                     }

                    },
                    error:function e1(response){
                        console.log('error=>' ,response);

                    }
                  });//ajax ends
                 }
               }
              });

        $('#alert_errors').hide();
          $('#cancel_change').click(function(e){
            e.preventDefault();
            window.location="{{ url('dashboard') }}";         
           });//cancel button ends
        $('#rp_yes').click(function(){
            $("#password_reset_div").collapse('show');
                 $("#not_rem_p").collapse('hide');
        });
        $('#rp_no').click(function(){
                $("#not_rem_p").collapse('show');
                $("#password_reset_div").collapse('hide');
        });
        
     
        var p =  $('#password_reset_form').validate({
          
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
   });
        $('#change_password').on('click',function(e){
          e.preventDefault();
         if($('#password_reset_form').valid()){
                 $.ajax({
                     method:'post',
        url:"url('edit-password')}}",
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
                        setTimeout(function(){ location.replace("{{ url('profile') }}");},2000);
                        console.log(response);
                    }else if(response.success===false){
                        if(response.action===2){
                         $('#alert_errors').show();
                         $('#alert_messages').html("Current Password did not match our records");
                        setTimeout(function(){ $('#alert_errors').hide();$('#password_reset_form')[0].reset();}, 100);                                  
                        console.log(response);
                        }else if(response.action===3){
                            swal({
                            title: "Unauthenticated User. Login to continue",
                            text: "Returning to Login Page ",
                            icon: "error",
                            button: false,                                                                                
                        });
                            window.location = "login";
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
                            // setTimeout(function(){ window.location = "{{url('dashboard') }}";},100);
                        });
                        // setTimeout(function(){ window.location ="{{url('dashboard') }}";},2000);
                        console.log(response);


        },

                 });//ajax ends

      }
  });
      var x = $('#editpersonaldetails').validate({
         
          rules:{
            first_name: {
                  required: true,
                  nowhitespace :true
                },
            last_name: {
                  required: true,
                  nowhitespace :true
                },
              },
            messages:{
                 first_name:{
                     required: "The first name field cannot be blank",
                    },
                  last_name:{
                     required: "The last name field cannot be blank",
                    },
              },
           errorPlacement: function (error, element) {
            element.each(function () {
                $(this).next("div .error").html(error);
            });
        },

      }); //validator ends  

      $('#editpdb').on('click',function(e){
        
          e.preventDefault();
          
        if($('#editpersonaldetails').valid()){
          noofsubmits++;
          if(noofsubmits > 1){
            $('.bttn').html('<i class="fas fa-skull-crossbones" style="color:red;"></i>');
          }

          if(noofsubmits == 1){
          $.ajax({
                url:"{{url('edituser_pd') }}",
                method:'post',
                cache: false,
                processData:true,   //Required
                contentType: 'application/x-www-form-urlencoded',
                data:{
                     '_token' :$('#csrf').val(),
                     'id'     : $('#id').val(),
                     'first_name'  : $('#first_name').val(),
                     'last_name'   :$('#last_name').val(),
                },
                success: function ew(response){
                     Command: toastr["success"]("Details changed. You will be redirected..")
                        toastr.options = {
                          "closeButton": false,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-full-width",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                           
                        }
                      setTimeout(function(){ location.replace(" {{url('profile')}} ");},5500);
                },
                error: function e(response){
                   Command: toastr["error"]("Some error : Please try later", response.message)
                     toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-full-width",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }

                }
                
           });//ajax ends

        }
      }
      });
      
      var x = $('#editotherdetails').validate({
      
          rules:{
            mobno: {
                  required: true,
                  nowhitespace :true,
                  digits:true,
                  minlength: 10,
                  maxlength: 10,
                },
            dob:{
                    required:true,
                    date:true,
                    dateISO: true,
                    nowhitespace :true
                },
              },
            messages:{
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
              },
           errorPlacement: function (error, element) {
            element.each(function () {
                $(this).next("div .error").html(error);
            });
        },

      }); //validator ends  

      $('#editopdb').on('click',function(e){
        
          e.preventDefault();
         
        if($('#editotherdetails').valid()){
          noofsubmits++;
          if(noofsubmits > 1){
             $('.bttn').html('<i class="fas fa-skull-crossbones" style="color:red;"></i>');
          }

           if(noofsubmits == 1){
          $.ajax({
                url:"{{url('edituser_opd')}}",
                method:'post',
                cache: false,
                processData:true,   //Required
                contentType: 'application/x-www-form-urlencoded',
                data:{
                     '_token' :$('#csrf').val(),
                     'id'     : $('#id').val(),
                      'mobno'     :    $('#mobno').val(),
                        'dob'      :     $('#dob').val(),
                       'gender'    :  $('input:radio[name=gender]:checked').val(),
                        
                },
                success: function ew(response){
                     Command: toastr["success"]("Details changed. You will be redirected..")
                        toastr.options = {
                          "closeButton": false,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-full-width",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut",
                           
                        }
                        setTimeout(function(){ location.replace("{{ url('profile') }}");},5500); 
                },
                error: function e(response){
                   Command: toastr["error"]("Some error : Please try later", response.message)
                     toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-full-width",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }

                }
                
           });//ajax ends

        }
      }
      });
      
      $('#editldb').on('click',function(e){
        noofsubmits++;
          e.preventDefault();
          if(noofsubmits > 1){
             $('.bttn').html('<i class="fas fa-skull-crossbones" style="color:red;"></i>');
          }

          if(noofsubmits == 1){
          $.ajax({
                url:"{{url('edituser_ld')}}",
                method:'post',
                cache: false,
                processData:true,   //Required
                contentType: 'application/x-www-form-urlencoded',
                data:{
                     '_token' :$('#csrf').val(),
                     'id'     : $('#id').val(),
                       'address'              :       $('#address').val(),
                        'country'              :       $('#countrylist').val(),
                        'state'                :       $('#statelist').val(), 
                        'city'                 :      $('#citylist').val(),
                        'pincode'              :     $('#pincode').val(),
                },
                success: function ew(response){
                     Command: toastr["success"]("Details changed. You will be redirected..")
                        toastr.options = {
                          "closeButton": false,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-full-width",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut",
                          
                        }
                       setTimeout(function(){ location.replace("{{ url('profile') }}");},5500); 
                },
                error: function e(response){
                   Command: toastr["error"]("Some error : Please try later", response.message)
                     toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-full-width",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }

                }
                
           });//ajax ends

        }  
      });
    $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param * 1000000)
}, 'File size must be less than {0} MB');

    jQuery.validator.addMethod("extension", function(value, element, param) {
  param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
  return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"))
}, "Please enter a value with a valid extension.");

   var v = $('#profilepic').validate({
       rules:{
        mypic:{
          required:true,
          extension: "jpg|jpeg|png",
          filesize:true,
        },
      },
      messages:{
        mypic:{
           required:"Please select an image file. If you dont't want a profile pic, please use the cancel button",
           extension:"Image files with the following extensions are allowed - .jpg, .jpeg, .png",
           filesize: "Maximum size of the image - 5 MB",
        },
      },
        errorPlacement: function (error, element) {
            element.each(function () {
                $(this).next("div .error").html(error);
            });
        },
    }); 
    
    $('#editprofilepic').click(function(e){
        e.preventDefault();
        if($('#profilepic').valid()){
          var f = $('#mypic').val();
           var formData = new FormData(document.getElementById("profilepic"));
          //console.log(formData);

           noofsubmits++;
           if(noofsubmits > 1){
                  $('.bttn').html('<i class="fas fa-skull-crossbones" style="color:red;"></i>');
           }
 
         if(noofsubmits == 1){
       
          $.ajax({
              url: "{{ url('edituser_pic') }}",
              method:'post',
              cache: false,
              processData:false,   //Required
              contentType: false,
              data:formData,
              // data:{
              //      '_token' :$('#csrf').val(),
              //      'id'     : $('#id').val(),
              //      'mypic'  : $('#mypic').val(),
              // },
              success:function e(response){
                console.log(response.path);
                  console.log(response.status);
                 if(response.success == true){
                  Command: toastr["success"]("You will now be redirected..","Profile Picture updated.")
                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-full-width",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut",
                              
                            }
                             
                           setTimeout(function(){ location.replace("{{ url('profile') }}");},5500); 
                  }else{
                     Command: toastr["warning"]("Some error","Please try later")
                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-full-width",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut",
                              
                            }
                            noofsubmits = 0;

                  }
              },
              error:function es(response){
                swal({
                  title:"Some error",
                  text:"Please try later",
                  icon:"warning",
                  button:true
                });
                noofsubmits = 0;
              }

          }); //ajax ends
        }
      }
    });


     var validator = $("#editdetails").validate({
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
                    email: "Email format should be example@examle.com or similar"
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
                // gender:{
                //     requiredRadioValue:"Please select one option",
                // },
                // address:{
                //     required:"The address field cannot be empty"
                // },  
                // country:{
                //     required:"The country field cannot be empty "
                // },
                // state:{
                //     required:"The country field cannot be empty "
                // },
                // city:{
                //     required:"The country field cannot be empty "
                // },
                // pincode:{
                //     required:"The country field cannot be empty "
                // },
            },
            errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },
        });
   $('#editdetailsb').on('click', function(e){
      e.preventDefault();
      
      if($('#editdetails').valid()){
         noofsubmits++;
         if(noofsubmits > 1){
           $('.bttn').html('<i class="fas fa-skull-crossbones" style="color:red;"></i>');
         }

         if(noofsubmits == 1){
          console.log(noofsubmits);
              $.ajax({
                 url:"{{url('check-email') }}",
                 method:'get',
                 data:{
                   'email':$('#email').val(),
                 },
                 success: function s(response){
                      var em = $('#email').val();
                       if(response.success==false){
                        if(em != "{{Auth::user()->email}}"){
                          em+= " is taken. Please use a different email address";
                          $('#alerts').show();
                          $('#emailtaken').html(em);
                          
                          $('#editdetails')[0].reset();
                          noofsubmits=0;
                      } else{
                    $.ajax({
                        method:'post',
                        url:"{{ url('edit-user') }}",
                        cache: false,
                        processData:true,   //Required
                        contentType: 'application/x-www-form-urlencoded',
                        data: {
                          '_token'             :    $("#csrf").val(),
                        'id'                :     $('#id').val(),
                        'first_name'         :    $('#first_name').val(),
                        'last_name'         :    $('#last_name').val(),
                        'email'             :    $('#email').val(),
                        'mobno'              :    $('#mobno').val(),
                        'dob'                 :     $('#dob').val(),
                       'gender'                  :  $('input:radio[name=gender]:checked').val(),
                        'address'              :       $('#address').val(),
                        'country'              :       $('#countrylist').val(),
                        'state'                :       $('#statelist').val(), 
                        'city'                 :      $('#citylist').val(),
                        'pincode'              :     $('#pincode').val(),
                        },
                       success:function ss(response){
                        console.log(noofsubmits);
                        Command: toastr["success"]("You will now be redirected..","Details changed. If you have changed your email, please verify it")
                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-full-width",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut",
                              
                            }
                           setTimeout(function(){ location.replace("{{ url('profile') }}");},5500); 
                            
                       },
                       error: function e(response){
                         swal({
                            title:"Some error",
                            text:"Please try later",
                            icon:'warning',
                            button:true
                            });
                         noofsubmits=0;
                       }
                    });

                  }
                }
                 },
                 error:function er(response){
                  swal({
                    title:"Some error",
                    text:"Please try later",
                    icon:'warning',
                    button:true
                     });
                  noofsubmits=0;
                 }

              });
         }

      }
    
 
   });
     

 });


</script>

@endsection
@endauth
@guest
  <script type="text/javascript">
    location.replace("{{ url('loginoptions') }}")
  </script>
  
@endguest