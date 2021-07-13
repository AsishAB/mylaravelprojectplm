@extends('commonview.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<div class="container-fluid m-5 p-5">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4">Signup Page</h3>
                           
                            <form id="new_user" autocomplete="off">
                            	@csrf
                            	<input type="hidden" name="_token" id="_csrf" value="{{Session::token()}}">
                            	<div id="emailpage" class="animate__animated animate__bounce tab">
                                <div class="form-group mb-3" id="form1">
                                	 <p class="text-muted mb-4">Let's start with your Login Info</p>
                                    <input id="temp_email" type="text" placeholder="Email address" class="form-control rounded-pill border-0 shadow-sm px-4">
                               
                                 </div>
                                <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" id="nextBtn" onclick="nextPrev(1)">Get started</button>
                                
                                <button type="button" class="btn btn-warning btn-block text-uppercase mb-2 rounded-pill shadow-sm" id="prevBtn" onclick="nextPrev(-1)">Back</button>
                                </div>

                                 <div id="passwordpage" class="animate__animated animate__bounce tab">
                                <div class="form-group mb-3" >
                                	<p class="text-muted mb-4">Please use a strong Password</p>
                                    <input id="temp_password" type="password" placeholder="Password" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3" id="form3">
                                    <input id="temp_cpassword" type="password" placeholder="Confirm Password" class="form-control rounded-pill border-0 shadow-sm px-4 ">
                                </div>
                                <!-- <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" id="btn2">Next</button> -->
                                 </div>
                                       

                                 <div id="otherdetails" class="animate__animated animate__bounce tab">
                                <div class="form-group mb-3" >
                                	<p class="text-muted mb-4">Other details</p>
                                    <input id="temp_mobno" type="text" placeholder="Mobile Number" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3" id="form1">
                                    <input id="temp_dob" type="text" placeholder="Date of Birth" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3" id="form1">
                                    <div class="form-group">
								 <label for="gender">Gender:</label>
								 <br>
								 &nbsp;&nbsp;&nbsp;&nbsp;
								 <input class="form-check-input" type="radio" name="temp_gender" id="Female" value="Female" {{old('gender')=="Female" ? 'checked': ""}}>
								 <label class="form-check-label" for="Female">
								   Female
								 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								 <input class="form-check-input" type="radio" name="temp_gender" id="Male" value="Male"  {{old('gender')=="Male" ? 'checked': ""}}>
								 <label class="form-check-label" for="Male">
								   Male
								 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								 <input class="form-check-input " type="radio" name="temp_gender" id="Other" value="Other"  {{old('gender')=="Other"?'checked':""}}>
								 <label class="form-check-label" for="Other">
								   Other
								 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
								
								</div>
                                </div>
                               <!--  <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" id="btn3">Next</button> -->
                                </div>

                                  
                                  <div id="optionaldetails" class="animate__animated animate__bounce tab">
                                 <div class="form-group mb-3" >
                                 	<p class="text-muted mb-4">Optional details</p>
                                    <textarea id="temp_addr" type="temp_addr" placeholder="Address Line 1" class="form-control rounded-pill border-0 shadow-sm px-4"></textarea> 
                                </div>
                                <div class="form-group mb-3">
									
									<select name="country" class="form-control rounded-pill border-0 shadow-sm px-4" id="countrylist">
									      <option disabled selected>Select Country</option>
									      
									     </select>
									   
									   </div>
									   <div class="form-group mb-3" id="statelistdiv">
									   
									   <select name="state" id="statelist" class="form-control rounded-pill border-0 shadow-sm px-4  demoInputBox">
									      <option disabled selected>Select State</option>
									    
									    </select>
									
									</div>
									<div class="form-group mb-3" id="statelistdiv">
									   
									   <select name="state" id="statelist" class="form-control rounded-pill border-0 shadow-sm px-4  demoInputBox">
									      <option disabled selected>Select City</option>
									    
									    </select>
									
									</div>

                                <div class="form-group mb-3">
                                    <input id="temp_pincode" type="text" placeholder="Pin Code" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                              <!--   <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" id="btn4">Next</button> -->
                                </div>
                                
                                <div id="signupnow" class="animate__animated animate__bounce tab">
                                	<p class="text-muted mb-4">All Set</p>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-4 rounded-pill shadow-sm" id="btn5">Sign Up</button>
                           	 	 </div>
                                <!-- <div class="text-center d-flex justify-content-between mt-4"><p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted"> 
                                        <u>Boostrapious</u></a></p></div> -->
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
 x[n].style.display;
  //... and fix the Previous/Next buttons:
  if (n == 0) {
  	$('#prevBtn').hide();
    // document.getElementById("prevBtn").style.display = "none";
  } else {
  	$('#prevBtn').show();
    // document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
  	$('#btn5').show();
    // document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
  	$('#nextBtn').html("Next");
    // document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

@endsection