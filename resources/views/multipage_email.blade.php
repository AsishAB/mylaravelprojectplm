 @extends('commonview.app')
 @guest
   @section('content')
  @include('signup-css')

  <!-- Modal showing reference number-->
  <div class="modal fade" role="dialog" id="refmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reference Number: {{$tuser->referenceno ?? $ref}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Please Note this reference Number. You can continue where you left off, in case you are disconnected</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="body1">
  <div class="progress mr-3 ml-3">
          <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 16.67%"></div>
        </div>
	<div class="container container2 mt-5">
    
    	<div class="row">
        <div class="col-md-8 offset-md-2">
        	<h1 class="text-white text-center display-2">Step 1</h1>
          <div class="login-form">
            <form id="newuser2_step1" action="{{url('mp_password_show')}}" method="post" autocomplete="off">
            	@csrf
              <div class="form-group">
              	 <label for="RefNo">Reference Number: </label>
              	<input type="text" class="form-control" id="refno" name="refno" value="{{$tuser->referenceno ?? $ref}}" readonly><br>
              </div>
              <div class="form-group">
              	<!-- Alert Message -->
              	  <div class="alert alert-danger " role="alert" id="alerts">
					   <strong id="emailtaken"></strong>
				 </div>

                <label for="exampleInputEmail1">Email address</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$tuser->temp_email ?? ''}}">
                  <div class="error text-danger"></div> 
            </div>

              <div class="form-group">
              <button type="submit" class="btn btn2 btn-primary" id="mstep1">Get Started <i class="fas fa-long-arrow-alt-right"></i></button><br><br>
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
	$('#refmodal').modal('show');

	$('#alerts').hide();
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
                swal("Your details are safe. Please remember the reference number, in case you want to continue with the signup process later. You will be redirected....", {
                  icon: "success",
                  button:false
                }); setTimeout(function(){location.replace("{{ url('newsignup') }}");},10000);
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
           email: {
                    required: true,
                    email: true,
                    nowhitespace :true
                },
            },
      messages:{
           email: {
            required:"The Email field is required",
			email: "Please enter the email in the format example@example.com",
           },
         },
      errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },
        });

$('#mstep1').click(function (e){
	
	e.preventDefault();
	$.ajax({
         url:"{{ url('check-email') }}",
         type:'get',
         data:{
             'email':$('#email').val(),
            },
            dataType:'JSON',
            success: function e(response){
                 if(response.success==false){
                 	
                 	var em= $('#email').val();
                 	em+= " is taken. Please try a different one";
                 	em+= " or <a href='{{url('login')}}'>Login Now</a>  ";
                 	 $(".frm").hide();
               $('#emailpage').show();
               	$('#alerts').show();
              $('#emailtaken').html(em);
              $('#email').val("");
             }else{
             	if(x.form()){
             	$('#alerts').hide();
             	$('#newuser2_step1').submit();

                 }
             }

            },
            error:function e1(response){
                console.log('error=>' ,response);

            }
          });//ajax ends
	});
	
});
</script>

 @endsection
 @endguest
 @auth
  <script type="text/javascript">window.location="{{ url('dashboard') }} ";</script>
 @endauth
 