 @extends('commonview.app')
 @guest
   @section('content')
  @include('signup-css')

<div class="body1">
    <div class="progress ml-3 mr-3">
          <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><i class="far fa-circle fa-3x"></i>
          </div>
    </div>
    <div class="container container2 mt-5">
      
      <div class="row">
       <div class="col-md-8 offset-md-2">

        	<div class="text-white text-center display-4"> <i class="fas fa-tasks fa-4x"></i></div>
        	<div class="text-danger text-center">
        	<strong>To change your details, don't use the Back button of your browser.</strong><br>
        	<strong>Please use the <a href="#">Previous</a> button instead.</strong>
        </div>

          <div class="login-form">
          	<div class="text-center mb-4" style="font-size: 50px;">
          		Review your details before final submit
		       
		    </div>

		    <div class="text-center mt-4">
          	<form autocomplete="off" id="multipage_form_submit"> 
          		@csrf
            
            <div class="form-group row">
            	<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
			    <label for="refno" class="col-form-label">Reference Number : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="refno" name="refno" value="{{$tuser->referenceno}}">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">First Name : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="first_name" name="first_name" value="{{$tuser->temp_first_name}}">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Last Name : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="last_name" name="last_name" value="{{$tuser->temp_last_name}}">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Email/UserName : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="email" name="email" value="{{$tuser->temp_email}}">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Password : </label>
			    <div class="col-lg-2">
			      <input type="password" readonly  id="password" name="password" value="{$tuser->temp_password}">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Mobile Number : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="mobno" name="mobno" value="{{$tuser->temp_mobno}}">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Date of Birth (YYYY-MM-DD) : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="dob" name="dob" value="{{$tuser->temp_DOB}}">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Gender : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="gender" name="gender" value="{{$tuser->temp_gender}}">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Address : </label>
			    <div class="col-lg-2">
			      <textarea  readonly  id="address" name="address">{{$tuser->temp_address}}</textarea>
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="refno" class="col-form-label">Country : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="country" name="country" value="{{$tuser->temp_country}}">
			    </div>
			  </div>

			   <div class="form-group row">
			    <label for="refno" class="col-form-label">State : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="state" name="state" value="{{$tuser->temp_state}}">
			    </div>
			  </div>

			   <div class="form-group row">
			    <label for="refno" class="col-form-label">City : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="city" name="city" value="{{$tuser->temp_city}}">
			    </div>
			  </div>

			   <div class="form-group row">
			    <label for="refno" class="col-form-label">Pin Code : </label>
			    <div class="col-lg-2">
			      <input type="text" readonly  id="pincode" name="pincode" value="{{$tuser->temp_pincode}}">
			    </div>
			  </div>

			   <div class="form-group">
			  <label class="form-check-label">Do you want to verify your email now? </label>
					 <select name="emver" id="emver" class="form-control rounded-pill border-0 shadow-sm px-4">
		         <option class="mb-2 rounded-pill shadow-sm" value="yes">Yes.Send me Instructions to verify email</option>
		         <option class="mb-2 rounded-pill shadow-sm" value="no" selected>No.I will do it later,after logging into my account</option>
		       </select>
 	          </div>

			  <div class="text-center form-group row">
              <button type="submit" class="btn btn-primary  btn2 mt-5" id="submit_now"><i class="fas fa-user-check"></i> Sign Up <i class="fas fa-user-check"></i></button><br>

              <a href="{{url('prevmpage?p=5')}}" class="btn btn-warning btn2 mt-5"><i class="fas fa-long-arrow-alt-left"></i> Previous </a><br><br>

              <button type="button" class="btn btn-danger btn2 mt-5" id="cancel_rgn"><i class="fas fa-times"></i>  Cancel Registration</button>
			</div>
           
			</div>
			</form>
          </div>
      </div>

  </div>
</div>

</div>

<script type="text/javascript">
	$(document).ready(function(e){
     $('#cancel_rgn').click(function(e){
       swal({
              title: "Are you sure?",
              text: "Please note your reference no. Your details will be safe, as long as you can provide us with your reference no.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Your details are safe. Please remember the reference number, in case you want to continue with the signup process. You will be redirected....", {
                  icon: "success",
                  button:false
                }); setTimeout(function(){location.replace("{{ url('newsignup' ) }}");},10000);
              } else {
                swal("Please continue with the signup process");
               }
            });

     });
	$.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

     $('#submit_now').on('click',function(e){
   		e.preventDefault();
   $('#submit_now').html("Please Wait..");
   
    $.ajax({
    method:"post",
    url:"{[ url('submit-form') }}",
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
          'gender'              :   $('#gender').val(),
          'address'              :    $('#address').val(),
          'country'              :    $('#country').val(),
           'state'              :     $('#state').val(),
            'city'              :      $('#city').val(),
            'pincode'              :  $('#pincode').val(),
            'emver'             : $('#emver').val(),
          'dt'                  :      $('#dt').val(),
          'form_type'          :3,
      },  
      dataType: 'JSON',
     success:function(){
      $('#submit_now').html('<i class="fas fa-user-check"></i> Sign Up <i class="fas fa-user-check"></i>');
            swal({
         title: "New User Registered . Welcome !",
         text: " You will now be directed to Login Page. Please verify your email too.",
         icon: "success",
         button: true,
      }).then((value) => {
         setTimeout(function(){ window.location="{[ url('login') }}";},100);
                  });
      setTimeout(function(){ window.location="{[ url('login') }}";},8000);
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
 
 
	});

});
</script>

@endsection

@endguest