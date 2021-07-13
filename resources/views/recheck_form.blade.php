@extends('commonview.app')
@section('content')
@guest

 <div class="text-center pt-3">
<p style="color:red">For safety,Do Not hit the back button or refresh the page</p>
<p style="color:red">Use the buttons given in the form below</p>
</div>

<form class="form-group" id="new_user_form" method="post"  autocomplete="off">
 <div class="row  m-5 p-5 bg-warning text-white">
     <div class="col">
<div class="form-group">
  @csrf
  <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
 <label for="fname">First Name:</label>
  <input type="text" class="form-control" id="first_name" name="first_name" value="{{$first_name}}" readonly >
</div>
<div class="form-group">
 <label for="lname">Last Name:</label>
  <input type="text" class="form-control" name="last_name" id="last_name" value="{{$last_name}}" readonly>
</div>
<div class="form-group">
 <label for="email">Email/Username:</label>
  <input type="text" class="form-control" name="email" id="email" value="{{$email}}" readonly>
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name="password" id="password" value="{{$password}}" readonly>
</div>

  <div class="form-group">
 <label for="mobno">Mobile Number:</label>
  <input type="text" class="form-control" name="mobno" id="mobno" value="{{$mobno}}" readonly>
</div>
<div class="form-group">
 <label for="dob">Date of Birth(in YYYY-MM-DD):</label>
  <input type="text" class="form-control" name="dob" id="dob" value="{{$dob}}" readonly>
</div>

<div class="form-group">
  <label for="gender">Gender:</label>
   <input type="text" class="form-control" name="gender" id="gender" value="{{$gender}}" readonly>

 </div>
  <div class="form-group">
  <label for="address">Address:</label>
  <textarea class="form-control" rows="5" name="address" id="address" readonly>{{$address}}</textarea>
</div>

<div class="form-group">
<label for="country">Country:</label>
 <input name="state" class="form-control" id="countrylist" value="{{$country}}" readonly>
</div>

<div class="form-group">
<label for="state">State:</label>
 <input name="state" class="form-control" id="statelist" value="{{$state}}" readonly>
</div>

<div class="form-group">
<label for="country">City:</label>
 <input name="country" class="form-control" id="citylist" value="{{$city}}" readonly>
</div>

<div class="form-group">
<label for="pincode">Pincode:</label>
 <input type="text" class="form-control" name="pincode"  value="{{$pincode}}" id="pincode" readonly>
</div>

 <div class="form-group">
 <label for="dt">Date and Time of Submission:</label>
  <input type="text" class="form-control" name="dt" id="dt" value=@php date_default_timezone_set("Asia/Kolkata"); echo date("Y-m-d,H:i:s ") @endphp readonly>
</div>
<div class="form-group">
  <label class="form-check-label">Do you want to verify your email now? </label>
 <select name="emver" id="emver" class="form-control rounded-pill border-0 shadow-sm px-4">
         <option value="yes">Yes.Send me Instructions to verify email</option>
         <option value="no" selected>No.I will do it later,after logging into my account</option>
       </select>
 <!-- <div class="error text-danger"></div> -->
 </div>
<div class="form-group text-center">
<!-- <a href="{{url('recheck_form')}}"/><button type="submit" class="btn btn-primary mb-2 text-center" onclick="store_using_ajax()">Submit</button> -->
<button type="submit" class="btn btn-primary mb-2 text-center" id="submit_form">Submit</button>
</div>
<div class="form-group text-center ">
<button type="button" class="btn btn-danger"><a href="new_user">Cancel</a></button>
<button type="button" class="btn btn-warning "><a href="">Edit</a></button>
</div>

</div>

</div>

</form>

 
 


<script type="text/javascript">
   $(document).ready(function(){
     $('#submit_form').click(function (e){

       e.preventDefault(); //Prevents the form from submitting

       /*Ajax Request Header setup*/
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });  

     $.ajax({
       method:'POST',
       url: "{{ url('submit-form') }}" ,
       cache: false,
       processData:true,   //Required
         contentType: 'application/x-www-form-urlencoded',  //Required
       // data: $('#new_user_form').serialize(),
        data: {
          '_token'             :    $("#csrf").val(),
         'first_name'         :    $('#first_name').val(),
          'last_name'         :    $('#last_name').val(),
          'email'             :    $('#email').val(),
          'password'           :    $('#password').val(),
          'mobno'              :    $('#mobno').val(),
          'dob'                 :     $('#dob').val(),
          'gender'              :     $('#gender').val(),
          'address'              :       $('#address').val(),
          'country'              :       $('#countrylist').val(),
           'state'              :       $('#statelist').val(),
            'city'              :       $('#citylist').val(),
            'pincode'              :       $('#pincode').val(),
          'dt'                  :        $('#dt').val(),
      },
      dataType: 'JSON',
     success:function(){
            swal({
         title: "New User Registered !",
         text: "Welcome! You will now be directed to Login Page",
         icon: "success",
         button: false,
         
       });
            setTimeout(function(){ window.location = "{{ url('login') }}"; }, 5000);
       },
       error: function(){
       swal({
             title: "Error in submitting form",
             text: "Please try again later! ",
             icon: "warning",
            button: "Okay",
            });
         }
  });

   });
     });

 </script>


  
@endguest
@auth
<script type="text/javascript">window.location="{{ url('dashboard') }}"</script>

@endguest
@endsection


