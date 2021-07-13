 @extends('commonview.app')
 @guest
   @section('content')
  @include('signup-css')
<div class="body1">
   <div class="progress mr-3 ml-3">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color:Tomato;"></div>
      </div>

    <div class="container container2 mt-5">
      <div class="row">
       <div class="col-md-8 offset-md-2">
        	<h1 class="text-white text-center display-2">Personal Details</h1>
          <div class="login-form">
            <form id="newuser2_step1" method="post" action="{{url('mp_details_show')}}" autocomplete="off">
              @csrf
              <div class="form-group">
                <label for="RefNo">Reference Number: </label>
                <input type="text" class="form-control" id="refno" name="refno" readonly value="{{$tuser->referenceno ?? $refno}}"><br>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" placeholder="Enter First Name" value="{{$tuser->temp_first_name ?? ''}}">
                <div class="error text-danger" ></div> 
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="emailHelp" placeholder="Enter Last Name" value="{{$tuser->temp_last_name ?? ''}}">
                <div class="error text-danger" ></div> 
              </div>

              <div class="form-group">
              <button type="submit" class="btn btn-primary  btn2" id="nextstep">Next Step <i class="fas fa-long-arrow-alt-right"></i></button><br><br>
              <a href="{{url('prevmpage?p=2')}}"><button type="button" class="btn btn-warning btn2"><i class="fas fa-long-arrow-alt-left"></i>  Previous </button></a><br><br>
               <button type="button" class="btn btn-danger btn2 mt-5" id="cancel_rgn"><i class="fas fa-times"></i>  Cancel Registration</button>
            </div>

            </form>
          </div>
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
           first_name: {
                    required: true,
                    nowhitespace :true
                },
           last_name:{
                    required: true,
                    nowhitespace :true
                },
            },
      messages:{

           first_name: {
            required:"The first_name field is required",
           },
          last_name: {
            required:"The first_name field is required",
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
 