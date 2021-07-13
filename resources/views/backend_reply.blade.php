
@extends('commonview.app')
@section('content')

@foreach($msg as $msg)



<div class="card m-4 text-center" id="old">
  <div class="card-header bg-danger text-white ">
    <strong>Message Id</strong>
  </div>
  <div class="card-body" >
   
    <p class="card-text display-4">{{$msg->msg_id}}</p>
    <p class="card-text text-muted">Asked On:- {{date('d M Y, h:i A',strtotime($msg->msg_asked_on))}}</p>
   </div>
</div>

<div class="card m-4" id="old" style="background-color: blue;color:white;">
  <div class="card-header">
    <strong>Initial Message: </strong>
  </div>
  <div class="card-body" >
   
    <p class="card-text">{{$msg->initial_msg}}</p>
   </div>
</div>


@if($msg->cust_reply)
<div class="card m-4" id="old">
  <div class="card-header">
    Replied on:
  </div>
  <div class="card-body" >
    <p class="card-text">{{$msg->cust_reply}}</p>
  </div>
</div>
@endif

@if($msg->backend_reply)
<div class="card m-4" id="old">
  <div class="card-header">
     Message from Customer Support Team:
  </div>
  <div class="card-body" >
   
    <p class="card-text">{{$msg->backend_reply}}</p>
    
  </div>
</div>
@endif


@if($msg->status != "solved")
 <div class="card m-4 new_" id="reply_box">
  <div class="card-header">
    Reply:
  </div>
  <div class="card-body" >
    <form id="backend_reply" autocomplete="off">
      @csrf
    <div class="form-group">
<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
<input type="hidden" name="backend_message_id" id="backend_message_id" value="{{$msgid}}">
 <textarea class="form-control" rows="4" name="backend_message"  id="backend_message" placeholder="Type your Reply here"></textarea>
 <div class="error text-danger"></div>
</div> 
 
<div class="form-group">
<button type="submit" class="btn btn-primary" id="reply_click"><span class="text-white"><i class="fas fa-reply"></i></span> Reply</button>
</div>
</form> 
 </div>
</div>


<div class="card m-4 text-center" >
  <div class="card-header" style="background-color: orange;color:white">
    <p id="markassolved">Mark as <strong>Solved</strong> for Ticket No. - {{$msg->msg_id}} <i class="fas fa-question fa-2x text-success"></i>
    </p>
  </div>
  <div class="card-body">
  	<form id='ticket_status'>
  		@csrf
  		<input type="hidden" name="ticketid" id='ticketid' value="{{$msgid}}">
  		<button type="submit" class="btn btn-danger text-white" id="solved_backend"><i class="fas fa-exclamation"></i> Solved</button>
  	</form>
   
  </div>
</div>
@else
<div class="card m-4 text-center" >
  <div class="card-header" style="background-color: green;color:white">
    <p id="solved">Ticket No. - {{$msg->msg_id}} <strong> is solved </strong><i class="fas fa-check fa-2x "></i>
    </p>
  </div>
  <div class="card-body">
  	<p>No more reply possible</p>   
  </div>
</div>
@endif
@endforeach

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script> --}}

<script type="text/javascript">
	$(document).ready(function(){
    $('#message_success').hide();
    var x=0;
    var noofsubmits= 0;
    
    $('#solved_backend').click(function(e){
      	e.preventDefault();
      	swal({
                title: "Are you sure?",
  				text: "Once deleted, you will not be able to recover this imaginary file!",
  				icon: "warning",
  				buttons: true,
  				dangerMode: true,
					}).then((willDelete) => {
						 if (willDelete) {
			         
			         noofsubmits++;
			         if(noofsubmits > 1){
			         	$('#solved_backend').html('Please wait..');
			         }
			         
		         if(noofsubmits == 1){
		         	$.ajax({
		                 method:'post',
		                 url:"{{url('ticket-solved') }}",
		                 cache: false,
		              processData:true,   //Required
		              contentType: 'application/x-www-form-urlencoded',
		              data:{
		                  '_token':$('#csrf').val(),
		                  'ticketid':$('#ticketid').val(),
		              },
		              success: function e(response){
		              	if(response.success == true){
		              	 toastr.success('Ticket marked as solved. No more reply possible');
		                    $('#markassolved').html("Ticked Resolved");
		                    $('#reply_box').hide();
		                    $('#solved_backend').html('<i class="fas fa-check-circle text-white"></i>');
		                    noofsubmits = 2;
		                }else{
		                	toastr.success('Some error. Please try later, or reload the page and try again');
		                	noofsubmits=0;
		                }
		              },
		              error:function er(response){
						 swal({
		                        title:"Some Error",
		                        text:"Please try later",
		                        icon:'warning',
		                        button:true,
		                     });
						 noofsubmits = 0;
						 $('#ticket_status')[0].reset();
              },
 
         	});
         }
     }else{
     	return false;
     }
       });

    });
      // $('.form1').attr('id','reply_text_'+x);
     $('#backend_reply').validate({
            
            rules:{
               backend_message:{
                required:true,
                minlength:5
               },
             },
               messages:{
               	backend_message:{
                	required:"Please type your reply",
                	minlength:"Minimum length: 5 characters",
                 },

               },
               errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },
            

          });


      

     $('#reply_click').click(function(e){
          e.preventDefault();
          if($('#backend_reply').valid()){
            var message = $('#backend_reply').val();
            //Here changes
           
             x++;

           var html =  '<div class="card m-4" id="old_'+x;
           html+= '"><div class="card-header"> Message from Customer Support Team:</div><div class="card-body" ><p class="card-text">';
           html+= message;
           html+= '</p></div</div>';  
            // $('#old').after('<div class="card m-4" id="old_"+x><div class="card-header">Replied on:</div><div class="card-body" ><p class="card-text">message</p></div</div>');
            $('#old').after(html);
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          
          $.ajax({
              
              method:'post',
              url:"{{url('backend-reply') }}",
              cache: false,
              processData:true,   //Required
              contentType: 'application/x-www-form-urlencoded',
              data:{
                  '_token':$('#csrf').val(),
                  'backend_message_id':$('#backend_message_id').val(),
                  'backend_message':$('#backend_message').val(),
              },
              success:function s(response){
              	if(response.success==true){
                  toastr.success('Message Sent');
                  $('#backend_reply')[0].reset();
                  location.reload();
              	}else{
              		 toastr.info('Error in sending message,Please try later');
              		 $('#backend_reply')[0].reset();
              	}

              },
              error:function er(response){
                     swal({
                        title:"Some Error",
                        text:"Please try later",
                        icon:'warning',
                        button:true,
                     });
                  $('#backend_reply')[0].reset();
              }

          });

        }
    });
 });
</script>
@endsection