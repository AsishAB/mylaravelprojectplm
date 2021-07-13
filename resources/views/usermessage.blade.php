 @extends('commonview.app')
 @section('content')
   @auth
  
   @foreach($msgs as $key =>$messages)
   @if($messages->initial_msg)
   <div class="card m-4" id="old">
  <div class="card-header">
    Asked on:
  </div>
  <div class="card-body" >
   
    <p class="card-text">{{$messages->initial_msg}}</p>
    
  </div>


</div>
  @endif
@if($messages->cust_reply)
<div class="card m-4" id="old">
  <div class="card-header">
    Replied on:
  </div>
  <div class="card-body" >
   
    <p class="card-text">{{$messages->cust_reply}}</p>
    
  </div>
</div>
@endif
@if($messages->backend_reply)
<div class="card m-4" id="old">
  <div class="card-header">
    Message from Customer Support Team:
  </div>
  <div class="card-body" >
   
    <p class="card-text">{{$messages->backend_reply}}</p>
    
  </div>
</div>
@endif
@endforeach
<!-- Alert box -->

      <div class="alert alert-success pl-4 pr-4" role="alert" id="message_success">
        <strong id="message_success1"></strong>
      </div>
      <!-- Alert box ends -->

 <!-- Reply form -->
 @if($msg->status != "solved")
  <div class="card m-4 new_">
  <div class="card-header">
    Reply:
  </div>
  <div class="card-body" >
    <form id="reply_text" autocomplete="off">
      @csrf
    <div class="form-group">
<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
<input type="hidden" name="message_id" id="message_id" value="{{$messages->msg_id}}">
 <textarea class="form-control" rows="4" name="reply_message"  id="reply_message" placeholder="Type your Reply here"></textarea>
 <div class="error text-danger"></div>
</div> 
<div class="form-group">
<input type="file" name="optional_file" id="optional_file">
 
</div> 
<div class="form-group">
<button type="submit" class="btn btn-secondary" id="reply_click"><span class="text-white"><i class="fas fa-reply"></i></span> Reply</button>
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

  <!-- <div class="card m-4 new_">
  <div class="card-header">
    Reply:
  </div>
  <div class="card-body" >
    <form id="reply_text" autocomplete="off">
      @csrf
    <div class="form-group">
<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
<input type="hidden" name="message_id" id="message_id" value="{{$messages->msg_id}}">
 <textarea class="form-control" rows="4" name="reply_message"  id="reply_message" placeholder="Type your Reply here"></textarea>
 <div class="error text-danger"></div>
</div> 
<div class="form-group">
<input type="file" name="optional_file" id="optional_file">
 
</div> 
<div class="form-group">
<button type="submit" class="btn btn-secondary" id="reply_click"><span class="text-white"><i class="fas fa-reply"></i></span> Reply</button>
</div>
</form> 
 </div>
  
</div>

//Reply form ends
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script type="text/javascript">
  // var msgid= $_REQUEST($id);
//   let params = new URLSearchParams(window.location);
// params.get('id') # => "n1"
  
  $(document).ready(function(){
    $('#message_success').hide();
    var x=0;
    
      // $('.form1').attr('id','reply_text_'+x);
     $('#reply_text').validate({
            focusCleanup:true,
            rules:{
               reply_message:{
                required:true,
                minlength:5
               },
             },
               messages:{
                required:"Please type your reply",
                minlength:"Minimum length: 5 characters"

               },
               errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },
            

          });

     $('#reply_click').click(function(e){
          e.preventDefault();
          if($('#reply_text').valid()){
            var message = $('#reply_message').val();
            //Here changes
           
             x++;

           var html =  '<div class="card m-4" id="old_'+x;
           html+= '"><div class="card-header">Replied on:</div><div class="card-body" ><p class="card-text">';
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
              url: '/LaraTest/public/store-userreply',
               cache: false,
              processData:true,   //Required
              contentType: 'application/x-www-form-urlencoded',
              data:{
                '_token'              : $('#csrf').val(),
                'message_id':$('#message_id').val(),
                // 'msgid' :      id,
                'reply_message':message,
              },
             dataType:"JSON",
             success:function msg_received(response){
                 $('#message_success').show();
                 $('#message_success1').html("Message received. We will respond shortly");  
                     setTimeout(function(){ $('#message_success').hide();}, 8000);
                     $('#reply_text').reset();                                  
                    console.log(response);

             },
             error:function error_msg(response){
                     swal({
                            title: "Oops! Some error.",
                            text: "Unable to submit reply. Please try later",
                            icon: "error",
                            button: true,                                                                                
                        });
                console.log(response);
             }

            });

          
          }
        });
   });

          


</script>




@endauth
@endsection