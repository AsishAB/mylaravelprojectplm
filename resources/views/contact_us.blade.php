@extends('commonview.app')
@section('content')
@include('contactus-css')
@include('contactadmin-css')
<div class="pt-4 text-center m-4">
  
  <div class="card">
  <div class="card-header text-success">
   <div>Need Help?</div> 
   <div>
    <img src="https://cdn4.iconfinder.com/data/icons/seo-and-business-3/64/sent_message_received_confirmed_email-512.png" height="100px" width="100px" alt="sndmsg">
  </div>
  </div>
  <div class="card-body">
    <h5 class="card-title text-info">We are a click away</h5>
    <p>Asish Bishoi<br>
    Jatni,Odisha,India,Pin:755885<br>
    Mob-9999099990<br>
    </p>
  <button type="button" id="contact_us" class="btn btn-info"  data-toggle="modal" data-target="#contactmodal" data-backdrop='static' data-keyboard='false'>Contact Us</button>
  </div>
</div>


<div class="modal body1 fade border-primary" id="contactmodal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  <div class="body1">
<header id="header1">
  <h3>Send Us a Message</h3>
</header>

<div id="form">
<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>
 <form id="contact_us_modal" class="waterform" autocomplete="off">
      @csrf
<div  id="name-form">
    <label for="name" class="label2">Full Name*</label>
  <input type="text" id="cu_full_name"  class="textbox1" name="cu_full_name" value="@if(auth()->check()){{Auth::user()->full_name}} @endif"/>
   <div class="error text-danger"></div>
   </div>

<div  id="email-form" >
  <label for="email" class="label2">E-mail*</label>
    <input type="email" id="cu_email" class="textbox1" name="cu_email" value="@if(auth()->check()){{Auth::user()->email}}@endif" />
    <div class="error text-danger"></div>
  </div>

  <div  id="message-form" >
      <label for="message" class="label2">Message(min 10 characters):</label>
    <textarea rows="2" id="cu_message" class="textbox1" name="cu_message"></textarea>
    <div class="error text-danger"></div>
    </div>
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_contact_modal">Cancel</button>
        <button type="submit" class="btn btn-info" id="submit_contact_us"><i class="fas fa-paper-plane"></i> Send Message</button>
      </div>
    </div>


  
</div>


    </div>
  </div>
</div>

<div class="card text-center mt-5">
  <div class="card-header text-danger">
    <strong>Need to Contact an Admin? </strong> 
  </div>
  
  @auth
  <div class="card-body text-center">
  <button type="button" id="contact_admin" class="btn btn-warning">Contact Admin</button>
  </div>

  <div class="collapse fade" id="sendtoadmin">
    <i class="fas fa-long-arrow-alt-down fa-3x" style="color: purple"></i>
 <section class="get-in-touch">
   <h3 class="title">Send a message to an Admin</h3>
   <form class="contact-form row" id="adminform" autocomplete="off">
    @csrf
    <input type="hidden" name="_token" id="_csrf" value="{{Session::token()}}">
    <input type="hidden" name="ad_userid" id="ad_userid" value="{{Auth::user()->id}}">
      <div class="form-field col-lg-6">
         <input id="ad_name" name="ad_name" class="input-text" type="text" value="{{Auth::user()->full_name}}" readonly>
         <label class="label" for="name">Name</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="ad_email" name="ad_email" class="input-text" type="email" value="{{Auth::user()->email}}" readonly>
         <label class="label" for="email">E-mail</label>
      </div>
      @if((auth()->user()->role) != 'user')
      <div class="form-field col-lg-6">
         <input id="ad_role" name="ad_role" class="input-text" type="text" value="{{Auth::user()->role}}" readonly>
         <label class="label" for="Role">Role</label>
      </div>
      @endif
       <div class="form-field col-lg-6 ">
         <input id="ad_mobno" name="ad_mobno" class="input-text" type="text" value="{{Auth::user()->mobno}}" readonly>
         <label class="label" for="mobno">Contact Number</label>
      </div>
     <div class="form-field col-lg-12">
         <textarea id="ad_msg" name="ad_msg" class="input-text" placeholder="Type your message here" ></textarea>
        <label class="label" for="mobno">Message</label>
      </div>
      <div class="error text-danger"></div>

      <div class="form-field col-lg-12 ">
         <button class="submit-btn" type="submit" id="ad_send"><i class="fas fa-share"></i> Send Message</button>
      </div>
       
   </form>
</section>

</div>

</div>
@endauth

  @guest
  <div class="card-body">
   <div class="alert alert-warning" role="alert">
      <strong>Only Authenticated/Registered Users can Contact an Administrator.</strong> Please <strong>login/register</strong> to continue
  </div>
  @endguest
  </div>
</div>



<script type="text/javascript">

$(document).ready(function(){


$('#contactmodal').ready(function(){

  var noofsubmits = 0;
    // Validation For no white spaces
        jQuery.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
        }, "Please delete any blank space before,in between or after the text");

    var validator = $("#contact_us_modal").validate({
    
    rules: {
      cu_full_name:{
        required:true,
        minlength:1,
                     },
            cu_email:{
             required:true,
             email:true,
             nowhitespace:true,
            },
           cu_message:{
            required:true,
            minlength:10,

           },
    },
    messages: {
      cu_full_name:{
        required:"Your name is required",
        minlength:"Please enter your initials, if not the entire name",
      },
      cu_email:{
        required:"The email field cannot be blank",
        email:"Please enter a valid email address lile example@example.com",
      },
      cu_message:{
        required: "Please write some message here.It cannot be blank",
        minlength:"Please enter a minimum of 10 characters",
      },

    },
    errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },

   });

$('#submit_contact_us').on('click',function(e){
      e.preventDefault();
         if($("#contact_us_modal").valid()){
          noofsubmits++;
          if(noofsubmits > 1){
            $('#submit_contact_us').html("<i class='fas fa-ban text-danger'></i> Please wait..");
          }
          
        if(noofsubmits == 1){
        $('#submit_contact_us').html("Sending..");

        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
           }); 
        $.ajax({
          method:"post",
          url:"{{ url('contact_us_msg') }}",
           cache: false,
                    processData:true,   //Required
                    contentType: 'application/x-www-form-urlencoded',
                    data:{
                    'cu_token'       :   $("#cu_csrf").val(),
                    'cu_full_name'     :   $("#cu_full_name").val(),
                    'cu_email'        :   $("#cu_email").val(),
                    'cu_message'       :   $("#cu_message").val(),
                    },
                    dataType:'JSON',
                    success:function contact_us(response){
                      noofsubmits = 0;
                        swal({
                            title: "Message Received",
                            text: "We will respond as soon as possible. Thank You!",
                            icon: "success",
                            button: "Okay",
                           }).then((value) => {
                            
                   setTimeout(function(){ location.reload();},100);
                  });
                        setTimeout(function(){location.reload();},2000);
                           $('#submit_contact_us').html("Send Message");
                       console.log("Success=> ",response);
                    },
                    error: function error_in_contact(response){
                        noofsubmits = 0;
                        swal({
                            title: "Something is wrong",
                            text: "Please send you message to asish@gmail.com (ONLY if it's urgent)",
                            icon: "error",
                            button: "Okay",
                        });
                       
                        $('#submit_contact_us').html("Send Message");
                        console.log("Error=> ",response);
                    },


          });//ajax ends here
       }//noofsubmits condition ends here
    }//.valid() ends heres  

  });//submit_contact_us ends here
});
});
  $('#contact_admin').click(function(){
     $('#sendtoadmin').collapse('toggle');
  });

 $('#sendtoadmin').ready(function(){
  var noofsubmits = 0;
   $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
           }); 
    var val = $('#adminform').validate({
       rules:{
           ad_msg:{
            required:true,
            minlength:10,
             }
      },
      messages:{  
           ad_msg:{
              required: "Please write some message here.It cannot be blank",
              minlength:"Please enter a minimum of 10 characters",
          }
      },
      errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
      },
  
    });
    $('#ad_send').click(function(e){
          e.preventDefault();
          if($('#adminform').valid()){
          noofsubmits++;
            if(noofsubmits > 1){
               $('#ad_send').html("<i class='fas fa-ban text-danger'></i> Please wait..");
           }
      
           if(noofsubmits == 1){
              $.ajax({
                  url:"{{ url('contact-admin') }} ",
                  method:'post',
                  cache: false,
                  processData:true,   //Required
                  contentType: 'application/x-www-form-urlencoded',
                  data:{
                      '_token':$('#_csrf').val(),
                      'ad_userid':$('#ad_userid').val(),
                      'ad_name':$('#ad_name').val(),
                      'ad_email':$('#ad_email').val(),
                      'ad_role':$('#ad_role').val(),
                      'ad_mobno':$('#ad_mobno').val(),
                      'ad_msg':$('#ad_msg').val(),
                   },
                  success:function es(response){
                        if(response.success == true){
                          swal({
                            title:"Message sent to Administrator",
                            text:"You will be redirected",
                            icon:"success",
                            button:true,
                          })
                          .then((value)=>{
                               setTimeout(function(){location.reload();},100);

                          });
                          setTimeout(function(){location.reload();},5000);
                        }else{
                            swal({
                            title:"Some error",
                            text:"Please try again,after the page reloads",
                            icon:"warning",
                            button:true,
                            })
                            .then((value)=>{
                              noofsubmits = 0;
                               setTimeout(function(){location.reload();},100);

                          });
                            noofsubmits = 0;
                          setTimeout(function(){location.reload();},5000);
                        }

                  },
                  error:function er(response){
                            swal({
                            title:"Some error",
                            text:"Please try later",
                            icon:"warning",
                            button:true,
                            })
                             .then((value)=>{
                               noofsubmits = 0;
                               setTimeout(function(){location.reload();},100);

                          });
                            noofsubmits = 0;
                          setTimeout(function(){location.reload();},5000);

                  }

              }); //ajax ends
           }
          }
    });

 });



 

</script>



@endsection

