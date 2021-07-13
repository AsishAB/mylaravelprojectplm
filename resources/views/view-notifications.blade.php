@extends('commonview.app')
@section('content')

@auth

 @if($p != 0)
<div class="m-5 text-center">
  <form class="notfactionform">
    @csrf
 
    <input type="hidden" name="userid" id="userid" value="{{Auth::user()->id}}">
    
<a href="javascript:void(0)" class="m-5 text-center text-danger notfaction" id="clearnotf"><i class="fas fa-broom"></i> Clear All Notifications</a> 
<a href="javascript:void(0)" class="m-5 text-center text-danger notfaction" id="markasread"><i class="fas fa-highlighter"></i> Mark all Notifications as Read</a>

</form>
</div>
@endif
 @if($p == 0)
<div class="alert alert-success m-5 text-center">
  <div class="text-success"><i class="fas fa-smile fa-2x"></i></div>
   <strong class="text-success">No New Notification</strong>
</div>
@endif
@foreach($notf as $notf)

@if($notf->notf_status == 1)
 <div class="alert alert-secondary m-5">
  <small class="float float-right text-primary">Notification already read</small>
    <div><i class="fas fa-book-reader fa-2x text-success"></i></div>
     <strong class="text-success mt-2">{{$notf->notf_message}}</strong>
</div>
@else

@if($notf->priority == 'low')
  <div class="alert alert-primary m-5 ">
  	<div><i class="fas fa-exclamation fa-2x text-success"></i></div>
  	 {{$notf->notf_message}}
  </div>
@elseif($notf->priority == 'medium')
<div class="alert alert-warning m-5">
  	<div><i class="fas fa-exclamation-triangle fa-2x text-warning"></i></div>
  	 {{$notf->notf_message}}
 </div>
 @elseif($notf->priority == 'high')
 <div class="alert alert-danger m-5">
  	<div><i class="fas fa-exclamation-circle fa-2x text-danger"></i></div>
  	 <strong>{{$notf->notf_message}}</strong>
 </div>	
 
 @else
 <div class="card text-center m-5">
  <div class="card-body">
  	<img src="{{ asset('assets/img/images.png') }}"  height="100px" width="300px" alt="Critical Alert" class="text-center">
    <h5 class="card-title mt-5"><strong style="color:orange;">{{$notf->notf_message}}</strong></h5>
  </div>
</div>	
 @endif

 @endif



@endforeach

 @if($p != 0)
<div class="m-5 text-center">
  <form class="notfactionform">
    @csrf
 
    <input type="hidden" name="userid" id="userid" value="{{Auth::user()->id}}">
    
<a href="javascript:void(0)" class="m-5 text-center text-danger notfaction" id="clearnotf"><i class="fas fa-broom"></i> Clear All Notifications</a> 
<a href="javascript:void(0)" class="m-5 text-center text-danger notfaction" id="markasread"><i class="fas fa-highlighter"></i> Mark all Notifications as Read</a>

</form>
</div>
@endif
@endauth

<script type="text/javascript">
  var notfaction = 0;
 

  $('#clearnotf').click(function(){
    notfaction = 1;
 
  });

  $('#markasread').click(function(){
      notfaction = 2;
  
  });

 
$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

  $('.notfaction').click(function(){
    // if(notfaction > 3){
    //             swal({
    //             title:"You clicked the actions too many times",
    //             text:"Please reload the page and try again",
    //             icon:"warning",
    //             button:true,

    //             }) 
    //         .then((value)=>{
    //            setTimeout(function (){location.reload()},100);
    //          });
    //          setTimeout(function (){location.reload()},1000);
    // }
    if(notfaction < 3){
      $.ajax({
          url:"{{ url('notf-action') }}",
          method:'get',
          cache: false,
          processData:true,   //Required
          contentType: 'application/x-www-form-urlencoded', 
          data:{
            
            'userid':$('#userid').val(),
            'notfaction':notfaction,
          },
          success:function es(response){
            if(response.success == true){
               swal({
                title:response.message,
                text:"Reloading Page. Please wait, or click Okay..",
                icon:"success",
                button:true,

               }) 
             .then((value)=>{
              
               setTimeout(function (){location.reload()},100);
             });
              setTimeout(function (){location.reload()},10000);
            }else{
              swal({
                title:response.message,
                text:"Reloading Page. Please wait, or click Okay..",
                icon:"success",
                button:true,

               }) 
              .then((value)=>{
               setTimeout(function (){location.reload()},100);
             });
              setTimeout(function (){location.reload()},10000);
            }
          },
          error:function er(response){
              swal({
                title:"Some error",
                text:"Click Okay, or reload the page and try again",
                icon:"warning",
                button:true,

               }) 
              .then((value)=>{
               setTimeout(function (){location.reload()},100);
             });
              setTimeout(function (){location.reload()},1000);
          }

      });
   }

  });

</script>




@guest
<script type="text/javascript">setTimeout(function (){location.replace("{{ url('login') }}" )});</script>
@endguest
@endsection