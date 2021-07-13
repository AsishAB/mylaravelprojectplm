@extends('commonview.app')
@section('content')

  <div class="container mr-2 mt-5 ml-5 mb-5 table-responsive-md">
<table class="table table-striped mydatatable table-hover" id="adminmsg">
  <thead>
    <tr style="background-color:pink;color:white">
      <th scope="col">Id.</th>
      <th scope="col">Ticket Id</th>
      <th scope="col">User Full Name</th>
       <th scope="col">User Email Address</th>
        <th scope="col">User Role</th>
      <th scope="col">User Mobile Number</th>
      <th scope="col">Message</th>
      <th scope="col">Asked On</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($adminmsg as $adminmsg)
    <tr >
      <th scope="row">
      	{{$adminmsg->id}}
      </th>

      <td class="@if($adminmsg->ad_status != 0) bg-success text-white @endif">{{$adminmsg->ad_ticketid}}</td>
      <td>{{$adminmsg->ad_name}}</td>
      <td>{{$adminmsg->ad_email}}</td>

      <td>
        {{$adminmsg->ad_role}}
    </td>
       <td >{{$adminmsg->ad_mobno}}</td>
       <td >{{$adminmsg->ad_msg}}</td>
       <td >{{date('d M Y, h:i A',strtotime($adminmsg->ad_askedon))}}</td>
       <td class="@if($adminmsg->ad_status != 0) bg-success text-white @endif">@if($adminmsg->ad_status == 0)Not Solved @else Solved @endif</td>
       <td ><form>
        <input type="hidden" name="ad_ticketid" class="ad_ticketid" value="{{$adminmsg->ad_ticketid}}">
       	<a href="javascript:void(0)"  class="marked" id="marksolved" style="color:green;"><i class="fas fa-check" ></i> Mark as solved? </a><br><br>
          <a href="javascript:void(0)" class="marked" id="marknotsolved" style="color:red;"><i class="fas fa-times"></i> Mark as NOT solved? </a>
             </form>
          <br>
       	<a href="{{ url('sendnotf') }}/{{$adminmsg->ad_userid}}" target="_blank" style="color:blue;"><i class="fas fa-bell"></i> Nofify</a></td>
    </tr>
    @endforeach
  </tbody>

  <!-- Table Footer -->
  <tfoot>
     <tr style="background-color:pink;color:white">
      <th scope="col">Id.</th>
      <th scope="col">Ticket Id</th>
      <th scope="col">User Full Name</th>
       <th scope="col">User Email Address</th>
        <th scope="col">User Role</th>
      <th scope="col">User Mobile Number</th>
      <th scope="col">Message</th>
      <th scope="col">Asked On</th>
      <th scope="col">Status</th>
      <th scope="col">Notify</th>
    </tr>

  </tfoot>
</table>
</div>
 
<script type="text/javascript">
$('#adminmsg').DataTable({
 });


var y = 2;

$('#marksolved').click(function(){
     y = 1;
});
$('#marknotsolved').click(function(){
     y = 0;
});

$('.marked').click(function(e){
    swal({
  title: "Are you sure?",
  text: "This ticket will be marked as solved",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
       $.ajax({
          url:"{{ url('cngstatus') }},
          method:'get',
          data:{
               'ad_ticketid':$('.ad_ticketid').val(),
               'y':y,
          },
          success:function es(response){
          	if(response.success == true){
          		if(response.y == 1){
          	toastr.success(response.msg);
          	setTimeout(function (){location.reload()},1000);
                }else if(response.y == 0){
				toastr.warning(response.msg);
          	    setTimeout(function (){location.reload()},1000);
                 }
            }
          },
          error:function er(response){
          	toastr.danger("Please try later");
          	setTimeout(function (){location.reload()},10);
          }
       });




  } else {
   return false;
  }
});

});
</script>


@endsection