@extends('commonview.app')
@section('content')
@guest

<div class="container pt-2">
<div class="row shadow p-3 mb-5 bg-info rounded text-center text-white">
 <div class="col ">
 <h2>New User Registration</h2>
 </div>
   </div>
 </div>

   @if(Session::has('message'))
   <div class="alert alert-success text-center" role="alert">
   {{session()->get('message')}}<br>
   The page will reload shortly. Please wait until this message disappears
</div>
<script> setTimeout(function(){ location.reload(); }, 10000);</script>
@endif


 <div class="m-5 p-5 bg-light text-info ">
<form class="form-group" method="post" action="{{url('submit-form')}}" autocomplete="off">

<div class="frm1"  id="rform">

<div class="form-group {{ $errors->first('first_name') ? ' has-error' : 'has-success' }}">
 @csrf
<label for="fname">First Name:</label>
 <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
 <small class="text-danger">{{$errors->first('first_name') }}</small>
 
</div>


<div class="form-group {{ $errors->first('last_name') ? ' has-error' : 'has-success' }}">
<label for="lname">Last Name:</label>
 <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
 <small class="text-danger">{{ $errors->first('last_name') }}</small>
</div>


<div class="form-group {{ $errors->first('email') ? ' has-error' : 'has-success' }}">
<label for="email">Email/Username:</label>
 <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
 <small class="text-danger">{{ $errors->first('email') }}</small>
</div>

<div class="form-group {{ $errors->first('password') ? ' has-error' : 'has-success' }}">
 <label for="pwd">Password:</label>
 <input type="password" class="form-control" id="password" name="password" >
 <small class="text-danger">{{$errors->first('password') }}</small>
</div>


<div class="form-group {{ $errors->first('confirm_password') ? ' has-error' : 'has-success' }}">
 <label for="confpwd">Confirm Password:</label>
 <input type="password" class="form-control"  id="confirm_password" name="confirm_password" >
 <small class="text-danger">{{ $errors->first('confirm_password') }}</small>
</div>


 <div class="form-group {{ $errors->first('mobno') ? ' has-error' : 'has-success' }}">
<label for="mobno">Mobile Number:</label>
 <input type="text" class="form-control" name="mobno" id="mobno" value="{{ old('mobno') }}">
 <small class="text-danger">{{ $errors->first('mobno') }}</small>
</div>


<div class="form-group {{ $errors->first('dob') ? ' has-error' : '' }}">
<label for="dob">Date of Birth(in YYYY-MM-DD):</label>
 <input type="text" class="form-control" name="dob" id="dob" value="{{ old('dob') }}">
 <small class="text-danger">{{ $errors->first('dob') }}</small>
</div>


<div class="form-group {{ $errors->first('gender') ? ' has-error' : '' }}">
 <label for="gender">Gender:</label>

 <br>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" {{old('gender')=="Female" ? 'checked': ""}}>
 <label class="form-check-label" for="Female">
   Female
 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input class="form-check-input" type="radio" name="gender" id="Male" value="Male"  {{old('gender')=="Male" ? 'checked': ""}}>
 <label class="form-check-label" for="Male">
   Male
 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input class="form-check-input " type="radio" name="gender" id="Other" value="Other"  {{old('gender')=="Other"?'checked':""}}>
 <label class="form-check-label" for="Other">
   Other
 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
 <small class="text-danger">{{ $errors->first('gender') }}</small>
</div>


 <div class="form-group {{$errors->first('address') ? ' has-error' : '' }}">
 <label for="address">Address:</label>
 <textarea class="form-control" rows="2" name="address" id="address">{{ old('address') }}</textarea>
 <small class="text-danger">{{ $errors->first('address') }}</small>
</div>


<div class="form-group {{ $errors->first('country') ? ' has-error' : '' }}">
<label for="country">Country:</label>
<select name="country" class="form-control" id="countrylist">
      <option disabled selected>Select Country</option>
      
      @foreach($countryname as $key => $country)
       <option id="countryname" value="{{$country->countryname}}" {{old('country')==$country->countryname ?'selected' :''}}>{{$country->countryname}}</option>
       
        @endforeach
     </select>
   <small class="text-danger">{{ $errors->first('country') }}</small>
   </div>

  <div class="form-group {{$errors->first('state') ? ' has-error' : '' }}" id="statelistdiv">
   <label>State:</label><br /> 
   <select name="state" id="statelist" class="form-control demoInputBox">
      <option readonly disabled>Select State</option>
    
    </select>
<small class="text-danger">{{ $errors->first('state') }}</small>
</div>

 <div class="form-group {{$errors->first('city') ? ' has-error' : '' }}" id="citylistdiv">
     <label>City:</label><br /> 
     <select name="city" id="citylist" class="form-control demoInputBox">
         <option readonly disabled>Select City</option>
       </select>
   <small class="text-danger">{{ $errors->first('city') }}</small>
 </div>

<div class="form-group {{ $errors->first('pincode') ? ' has-error' : 'has-success' }}" >
 <label for="pincode">Pin Code:</label>
 <input type="text" class="form-control" name="pincode"  value="{{ old('pincode') }}" id="pincode">
 <small class="text-danger">{{$errors->first('pincode')}}</small>
</div>


<div class="form-group">
 <label for="dt">Date and Time of Submission:</label>
 <input type="text" class="form-control" name="dt" readonly value=@php date_default_timezone_set("Asia/Kolkata"); echo date("Y-m-d,H:i:s ") @endphp>
</div>





<div class="form-group text-center">
<button type="button" class="btn btn-primary btn-lg" id="reviewfrm">Review Form <i class="fas fa-chevron-circle-right"></i> </button><br><br>
Already Signed up? <a href="{{url('login')}}"><i class="fas fa-sign-in-alt"></i> Login Here</a>
</div>

</div>

<div class="card frm1" id="review_form">
  <div  class="card-img-top text-center mt-3"><i class="fas fa-search fa-4x"></i></div>
  <div class="card-body mt-3">
    <h5 class="card-title text-center">Review your input before submitting</h5>
   <p class="card-text text-danger text-center"> <strong>P.S :-</strong> If you want to change some of your data, do not hit the back button in the browser. Use the <a href="#back">Back</a> button instead</p><br>

    <strong>Email : </strong>          <span id="uid"></span><br><br>
     <strong>Password :</strong>       <span  id="pwd">It won't be shown. But you can change it by clicking back button</span><br><br>
     <strong>First Name : </strong>     <span id="fn"></span><br><br>
     <strong>Last Name : </strong>      <span id="ln"></span><br><br>
     <strong>Full Name : </strong>      <span id="fum"></span><br><br>
     <strong>Mobile : </strong>         <span id="mob"></span><br><br>
     <strong>Date of Birth : </strong>  <span id="db"></span><br><br>
     <strong>Gender : </strong>         <span id="gnd"></span><br><br>
     <strong>Address : </strong>        <span id="addr"></span><br><br>
     <strong>Country : </strong>        <span id="cou"></span><br><br>
     <strong>State : </strong>         <span id="st"></span><br><br>
     <strong>City : </strong>           <span id="ct"></span><br><br>
     <strong>Pincode : </strong>        <span id="pin"></span><br><br>

     <div class="form-group">
  <label class="form-check-label">Do you want to verify your email now? </label>
 <select name="emver" id="emver" class="form-control rounded-pill border-0 shadow-sm px-4">
         <option class="mb-2 rounded-pill shadow-sm" value="yes">Yes.Send me Instructions to verify email</option>
         <option class="mb-2 rounded-pill shadow-sm" value="no" selected>No.I will do it later,after logging into my account</option>
       </select>
  </div>

<div class="text-center">
<button type="button" class="btn btn-warning btn-lg" id="back"><i class="fas fa-backward" ></i> Back</button><br><br>
  <button type="submit" class="btn btn-info btn-lg" id="submit_form"><i class="fas fa-check-circle"></i> Submit Form</button><br><br>
  <button type="button" class="btn btn-danger btn-lg" id="cancel_reg"><i class="far fa-window-close"></i> Cancel</button><br><br>
  Already Signed up? <a href="{{url('login')}}"><i class="fas fa-sign-in-alt"></i> Login Here</a>
    </div>
  </div>
</div>

</form>
</div>


<script type="text/javascript">

 $(document).ready(function(){
   $(function(){
     viewStateList();
     viewCityList();
    });
 
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
                       url: "url('get-states?countryname=')}} "+countryname,
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
                 url:  "url('get-cities?statename=')}}"+statename,

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

});

</script>
<script type="text/javascript">
$(document).ready(function(e){
$('#showalert').hide();
$('#review_form').hide();


$('#reviewfrm').click(function(){
$('.frm1').hide();

var email = $('#email').val();
var fname = $('#first_name').val();
var lname = $('#last_name').val();
var name = fname+" "+lname;
var mobile = $('#mobno').val();
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

$('#review_form').show();

});


$('#back').click(function(){
$('.frm1').hide();
$('#rform').show()

});

$('#cancel_reg').click(function(){
 swal({
              title: "Are you sure?",
              text: "You can use the form again,to signup if you want",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("You will now be redirected.,", {
                  icon: "success",
                  button:false
                }); setTimeout(function(){location.replace("url('signup') }}");},2000);
              } else {
                swal("Please continue with the signup process");
              }
            });


});


}); //ready fn ends

</script>




@endguest
@auth

<script>window.location =  "{{ url('dashboard') }}";</script>
@endauth
@endsection