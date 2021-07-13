s @extends('commonview.app')
 @guest
   @section('content')
  @include('signup-css')
<div class="body1">
  <div class="progress mr-3 ml-3">
          <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 66.68%"></div>
      </div>
    <div class="container container2 mt-5">
      
      <div class="row">
       <div class="col-md-8 offset-md-2">
        	<h1 class="text-white text-center display-2">Step 4</h1>
          <div class="login-form">
            <form id="newuser2_step1" method="post" action="{{url('mp_location_show')}}" autocomplete="off" >
              @csrf
              <div class="form-group">
                <label for="RefNo">Reference Number: </label>
                <input type="text" class="form-control" id="refno" name="refno" readonly value="{{$tuser->referenceno ?? $refno}}" value="{{$tuser->referenceno ??  $refno}}"><br>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Mobile Number:</label>
                <input type="text" class="form-control" id="mobno" name="mobno" placeholder="Valid Mobile Number" value="{{$tuser->temp_mobno ??  ''}}">
                <div class="error text-danger"></div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Date of Birth (YYYY-MM-DD):</label>
                <input type="text" class="form-control" id="dob" name="dob"  placeholder="Date of Birth in YYYY-MM-DD format" value="{{$tuser->temp_DOB ?? ''}}">
                <div class="error text-danger"></div>
              </div>

            
			<div class="form-group ">
				 <label for="gender">Gender:</label>
                 <br>
				 &nbsp;&nbsp;&nbsp;&nbsp;
				 <input class="form-check-input" type="radio" name="gender" id="Female" value="Female"  {{($tuser->temp_gender == "Female") ? 'checked' : ''}}>
				 <label class="form-check-label" for="Female">
				   Female
				 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				 <input class="form-check-input" type="radio" name="gender" id="Male" value="Male"  {{($tuser->temp_gender == "Male") ? 'checked' : ''}}>
				 <label class="form-check-label" for="Male">
				   Male
				 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				 <input class="form-check-input " type="radio" name="gender" id="Other" value="Other"  {{($tuser->temp_gender == "Other") ? 'checked' : ''}}>
				 <label class="form-check-label" for="Other">
				   Other
				 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
				<div class="error text-danger"></div>
			</div>
             <div class="form-group">
              <button type="submit" class="btn btn-primary  btn2" id="nextstep">Next Step <i class="fas fa-long-arrow-alt-right"></i></button><br><br>
              <a href="{{url('prevmpage?p=3')}}"><button type="button" class="btn btn-warning btn2"><i class="fas fa-long-arrow-alt-left"></i>  Previous </button></a><br><br>
               <button type="button" class="btn btn-danger btn2 mt-5" id="cancel_rgn"><i class="fas fa-times"></i>  Cancel Registration</button>
            </div>

            </form>
          </div>
        </div>
      </div>
       
    </div>

   
  </div>

<!-- jQuery validation Plugin -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>


<script type="text/javascript">
$(document).ready(function (){
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
                  button:true
                }); setTimeout(function(){location.replace("{{ url('newsignup' ) }}");},10000);
              } else {
                swal("Please continue with the signup process");
              }
            });

     });
   jQuery.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
        }, "No white space. Please clear any blank space between, before and after the text");

        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
        var x= $('#newuser2_step1').validate({
      focusCleanup:true,
      rules: {
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
        });
        $('#nextstep').click(function(e){
          e.preventDefault();
          if(x.form()){
           $('#newuser2_step1').submit();

          }
 
        });
      });
</script>

 @endsection
 @endguest
 @auth
  <script type="text/javascript">window.location="{{ url('dashboard') }}";</script>
 @endauth
 