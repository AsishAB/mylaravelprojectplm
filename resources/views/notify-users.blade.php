@extends('commonview.app')
@section('content')
@include('notifyusers-css')
<div class="container contact-form container2">
            <div class="contact-image">
                <img src="{{ asset('assets/img/rocket_contact.png') }}" alt="rocket_contact"/>
            </div>
             
            <form id="send_notf_admin">
            	<h3>Send Notification to : <strong>{{$user->full_name}}</strong></h3>
            @csrf
             <div class="row">
               	<input type="hidden" name="_token" id="_token" value="{{Session::token()}}">
   	  			<input type="hidden" name="userid" id="userid" value="{{$user->id}}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" value="{{$user->full_name}}" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" name="email" class="form-control" value="{{$user->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" id="role" name="role"  class="form-control" value="{{$user->role}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Set Priority</label>
                            <select id="priority" name="priority" class="form-control">
                                
                                <option value="low" selected>Low</option>
                                <option value="medium">Medium</option>
                                <option value="high" >High</option>
                                <option value="extreme">Extreme</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="btnSubmit" class="btnContact" id="send_notf">Send Notification</button>
                        </div>
                         <div class="form-group text-center">
                            <button type="button" name="btnSubmit" class="btnContact" style="color:white;background-color:orange;" id="cancel_nt">Cancel</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="notf" id="notf" class="form-control" placeholder="Notification*" style="width: 100%; height: 150px;"></textarea>
                            <div class="error text-danger"></div>
                        </div>
                    </div>
                </div>
            </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var noofsubmits = 0;
     $('#cancel_nt').click(function(e){
         swal({
            title:"Returning to Previous Page",
            text:"Please wait",
            icon:"success",
            button:false
         });
       setTimeout(function(){ location.replace( "{{ url('userslist') }}" )}, 100);

     });

    // jQuery.validator.addMethod("nowhitespace", function(value, element) {
    //               return this.optional(element) || /^\S+$/i.test(value);
    //           }, "Please delete any blank space in between or before the text");
     

        $('#send_notf_admin').validate({
              rules:{
                notf:{
                    required:true,
                    
                    minlength:5,
                }
              },
              messages:{
                   notf:{
                    required:"Please enter some value",
                    minlength:"Please enter a minimum of 5 characters",
                   }
              },
              errorPlacement: function (error, element) {
                element.each(function () {
                    $(this).next("div .error").html(error);
                });
            },
   
        }); //validate ends
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

     $('#send_notf').click(function(e){
        e.preventDefault();
           if($('#send_notf_admin').valid()){
            noofsubmits++;
            if(noofsubmits > 1){
             $('#send_notf').html("<i class='fas fa-ban></i> Please Wait..'")
            }
            if(noofsubmits == 1){
                $.ajax({
                     url:"{{ url('send-notf') }}",
                     method:'post',
                     cache: false,
                     processData:true,   //Required
                     contentType: 'application/x-www-form-urlencoded',
                     data:{
                       '_token' :    $("#_token").val(),
                       'userid' :    $('#userid').val(),
                       'notf'   :    $('#notf').val(),
                       'priority':   $('#priority').val(),
                     },
                     dataType: "json",
                     success:function s(response){
                        if(response.success== true){
                           toastr.success('Notification sent. Re-redirecting to previous page.');
                            setTimeout(function(){ location.replace("{{ url('userslist') }}")}, 1000);
                        }else{
                             toastr.warning('Error Sending Notification.. Please contact database management/dev team');
                             noofsubmits = 0;
                             setTimeout(function(){$('#send_notf_admin')[0].reset();}, 100);
                        }
                     },
                     error:function er(response){
                        swal({
                            title:"Some Error",
                            text:"Please try later, or contact database management",
                            icon:"warning",
                            button:true,
                        });
                        noofsubmits = 0;
                        setTimeout(function(){$('#send_notf_admin')[0].reset();}, 100);
                     },

                });//ajax ends
            }
            
            }

     });

 }); //ready fn ends



</script>

@endsection