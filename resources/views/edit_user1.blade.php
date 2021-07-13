@extends('commonview.app')
@section('content')
 @auth
<div class="alert alert-success text-center" role="alert">

<strong> Hello {{Auth::user()->first_name}}!</strong> You are Logged In.
 
</div>
<div class="alert alert-info text-center" role="alert">
<strong>Edit</strong> your data here<br>
<strong>If you want to change your password, <a href="cngpwd">Click Here</a></strong>
 
</div>

<form class="form-group" id="edit_user_form" method="POST"  autocomplete="off">
 <div class="row  m-5 p-5 bg-success text-white">
     <div class="col">
<div class="form-group">
  @csrf
  <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
  <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
 <label for="fname">First Name:</label>
  <input type="text" class="form-control" id="first_name" name="first_name" value="{{Auth::user()->first_name}}" >
  <div class="error text-white bg-danger"></div>
</div>
<div class="form-group">
 <label for="lname">Last Name:</label>
  <!-- <input type="text" class="form-control" name="last_name" id="last_name" value="{{Auth::user()->last_name}}"> -->
<input type="text" class="form-control" name="last_name" id="last_name" value="{{Auth::user()->last_name}}" >
<div class="error text-danger"></div>
</div>
<div class="form-group">
 <label for="lname">Full Name:</label>
  <!-- <input type="text" class="form-control" name="last_name" id="last_name" value="{{Auth::user()->last_name}}"> -->
<input type="text" class="form-control" name="full_name" id="full_name" value="{{Auth::user()->full_name}}" readonly>
<!-- <div class="error text-white bg-danger"></div> -->
</div>
<div class="form-group">
 <label for="email">Email/Username:</label>
  <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
<div class="error text-white bg-danger"></div>
</div>

<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="text" class="form-control" name="hpassword" id="hpassword" value="{{'**** For security, your password is hidden****'}}" readonly>
  <input type="hidden" class="form-control" name="password" id="password" value="{{Auth::user()->password}}" readonly>

</div>

  <div class="form-group">
 <label for="mobno">Mobile Number:</label>
  <input type="text" class="form-control" name="mobno" id="mobno" value="{{Auth::user()->mobno}}">
<div class="error text-white bg-danger"></div>
</div>
<div class="form-group">
 <label for="dob">Date of Birth(in YYYY-MM-DD):</label>
  <input type="text" class="form-control" name="dob" id="dob" value="{{Auth::user()->DOB}}">
<div class="error text-white bg-danger"></div>
</div>

<div class="form-group ">
  <label for="gender">Gender:</label>
  <br>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" {{old('gender',"Female") == Auth::user()->gender ? 'checked' : '' }}>
  <label class="form-check-label" for="Female">
    Female
  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" {{ old('gender',"Male") == Auth::user()->gender ? 'checked' : '' }}>
  <label class="form-check-label" for="Male">
    Male
  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
  <input class="form-check-input " type="radio" name="gender" id="Other" value="Other" {{old('gender',"Other") == Auth::user()->gender ? 'checked' : '' }}>
  <label class="form-check-label" for="Other">
    Other
  </label>
  <input type="hidden" class="form-control" name="gender2" id="gender2" value="{{Auth::user()->gender}}" readonly>
  <div class="error text-white bg-danger"></div>
  
  

 </div>
 <div class="error text-white bg-danger"></div>
  <div class="form-group">
  <label for="address">Address:</label>
  <textarea class="form-control" rows="5" name="address" id="address">{{Auth::user()->address}}</textarea>
<div class="error text-white bg-danger"></div>
</div>

<!-- <div class="form-group">
<label for="country">Country:</label>
 <input name="country" class="form-control" id="countrylist" value="{{Auth::user()->country}}">
</div> -->
<div class="form-group">
<label for="country">Country:</label>
 <select name="country" class="form-control" id="countrylist">
       <option disabled>Select Country</option>
       @foreach($countryname as $key => $country)
       <option id="countryname" value="{{$country->countryname}}" {{old('country',$country->countryname)== Auth::user()->country ?'selected' :''}}>{{$country->countryname}}</option>
      @endforeach
    </select>
<div class="error text-white bg-danger"></div>
</div>

<div class="form-group {{$errors->first('state') ? ' has-error' : '' }}" id="statelistdiv">
   <label>State:</label><br /> 
   <select name="state" id="statelist" class="form-control demoInputBox">
      <option readonly disabled>Select State</option>
   </select>
   <div class="error text-white bg-danger"></div>
</div>

 <div class="form-group" id="citylistdiv">
     <label>City:</label><br /> 
     <select name="city" id="citylist" class="form-control demoInputBox">
         <option readonly disabled>Select City</option>
       </select>
       <div class="error text-white bg-danger"></div>
 </div>

<div class="form-group" >
 <label for="pincode">Pin Code:</label>
 <input type="text" class="form-control" name="pincode"  value="{{Auth::user()->pincode}}" id="pincode">
 <div class="error text-white bg-danger"></div>
</div>

 <div class="form-group">
 <label for="dt">Date and Time of Update:</label>
  <input type="text" class="form-control" name="dt" id="dt" value=@php date_default_timezone_set("Asia/Kolkata"); echo date("Y-m-d,H:i:s ") @endphp readonly>
</div>
<div class="form-group text-center">
<!-- <a href="{{url('recheck_form')}}"/><button type="submit" class="btn btn-primary mb-2 text-center" onclick="store_using_ajax()">Submit</button> -->
</div>
<div class="form-group text-center ">

<button type="submit" class="btn btn-warning" id="edit_user_button">Edit</button>
<!-- <a href="{{url('dashboard')}}"></a> -->
<button  class="btn btn-info" id="cancel_edit">Cancel</button>

</div>
<p id="summary" class="alert-warning text-center text-info"></p>
</div>

</div>

</form>

</div>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<!-- Cancel button -->
<script type="text/javascript">
  $(document).ready(function(){

    
    $('#cancel_edit').click(function (e){
      e.preventDefault();
      window.location="{{ url('dashboard') }}";

    });

  });


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script type="text/javascript">

 $(document).ready(function(){
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
                 url: "{{ url('get-cities?statename=') }}"+statename,

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

<script type="text/javascript">
   
    $(document).ready(function(){
        
        //Validation For no white spaces
        jQuery.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
        }, "No white space please");

        //Validation For Radio options

        var validator = $("#edit_user_form").validate({
          showErrors: function(errorMap, errorList) {
            if(this.numberOfInvalids()>0){
                $("#summary").html("Your form contains "+this.numberOfInvalids()+ " errors, see details above.");
                   this.defaultShowErrors();
                 }
                    },
          
          
           focusCleanup: true,
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
                gender:{
                    requiredRadioValue:"Please select one option",
                },
                address:{
                    required:"The address field cannot be empty"
                },  
                country:{
                    required:"The country field cannot be empty "
                },
                state:{
                    required:"The country field cannot be empty "
                },
                city:{
                    required:"The country field cannot be empty "
                },
                pincode:{
                    required:"The country field cannot be empty "
                },
            },
            errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },
        });


        // AJAX PART

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','#edit_user_button',function(e){
            e.preventDefault();
       
            if($("#edit_user_form").valid()){
                $.ajax({
                    type:"POST" ,
                    url: "{{ url('edit-user') }}" ,
                    cache: false,
                    processData:true,   //Required
                    contentType: 'application/x-www-form-urlencoded',
                    data: {
                        '_token'             :    $("#csrf").val(),
                        'id'                :     $('#id').val(),
                        'first_name'         :    $('#first_name').val(),
                        'last_name'         :    $('#last_name').val(),
                        'email'             :    $('#email').val(),
                        'password'           :    $('#password').val(),
                        'mobno'              :    $('#mobno').val(),
                        'dob'                 :     $('#dob').val(),
                       'gender'                  :  $('input:radio[name=gender]:checked').val(),
                        'address'              :       $('#address').val(),
                        'country'              :       $('#countrylist').val(),
                        'state'                :       $('#statelist').val(), 
                        'city'                 :      $('#citylist').val(),
                        'pincode'              :     $('#pincode').val(),
                    },
                    dataType: 'JSON',
                    success:function enter_data(response){
                        swal({
                            title: "Data Updated.",
                            text: "Returning to Profile Page ",
                            icon: "success",
                            button: false,      
                        });
                        setTimeout(function(){ window.location = "dashboard";},2000);
                        console.log(response);
                    },
                    error: function error_in_submitting(response){
                        swal({
                            title: "Error in submitting form",
                            text: "Please try again later! ",
                            icon: "error",
                            button: "Okay",
                        });
                        // console.log(response);
                    },
                }); //Ajax Submit ends
            }
        });
});



</script>

@endauth
@guest

<!-- Unauthenticated users are kicked out -->

 <!-- <a href="{{url('logout')}}"/> <button type="button" class="btn btn-danger btn-lg btn-block">Unauthorised user! Please login or signup before you can enter this page</button>   -->

 <script type="text/javascript">window.location="{{ url('login') }}"</script>

@endguest

@endsection
