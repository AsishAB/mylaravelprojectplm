@extends('commonview.app')
@section('content')

<div class="container mr-2 mt-5 ml-5 mb-5 table-responsive-md">
<table class="table table-striped mydatatable table-hover" id="backendusers">
  <thead>
    <tr style="background-color:orange;color:white">
      <th scope="col">Sl No.</th>
      <th scope="col">User ID</th>
      <th scope="col">User Full Name</th>
       <th scope="col">User Email Address</th>
        <th scope="col">User Role</th>
      <th scope="col">User Account Creation Date</th>
      <th scope="col">User Account Updation Date</th>
      <th scope="col">User Email verified (Yes/No) ?</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($users as $user)
    <tr >
      <th scope="row" @if($user->role == 'admin') style='background-color:red;color:white;' @endif
        @if($user->role == 'support') style='background-color:mediumseagreen;color:white;'@endif
      	>
      	{{++$p}}

       @if($user->role == 'admin')<i class="fas fa-angle-right"></i>   @endif
       @if($user->role == 'support')<i class="fas fa-angle-right"></i>    @endif
      </th>

      <td>{{$user->id}}</td>
      <td>{{$user->full_name}}</td>
      <td>{{$user->email}}</td>

      <td  @if($user->role == 'admin') style='background-color:red;color:white;' @endif
        @if($user->role == 'support') style='background-color:mediumseagreen;color:white;'@endif>
        {{$user->role}}
    </td>
    
      <td >{{date('d M Y, h:i A',strtotime($user->created_at))}}</td>
       <td >@if($user->updated_at != '') {{date('d M Y, h:i A',strtotime($user->updated_at))}} @endif</td>
       <td @if($user->email_verified != 1) class="bg-danger text-white" @endif>@if($user->email_verified == 1)Yes @else No @endif</td>
       <td ><a href="#"><i class="fas fa-edit"></i> Edit</a> <br> <a href="#"><i class="fas fa-eraser"></i> Delete</a><br> <a href="sendnotf/{{$user->id}}" target="_blank"><i class="fas fa-bell"></i> Nofify</a></td>
    </tr>
    @endforeach
  </tbody>

  <!-- Table Footer -->
  <tfoot>
     <tr style="background-color:orange;color:white">
      <th scope="col">Sl No.</th>
      <th scope="col">User ID</th>
      <th scope="col">User Full Name</th>
       <th scope="col">User Email Address</th>
        <th scope="col">User Role</th>
        <th scope="col">User Account Creation Date</th>
        <th scope="col">User Account Updation Date</th>
      <th scope="col">User Email verified (Yes/No) ?</th>
      <th scope="col">Action</th>
    </tr>

  </tfoot>
</table>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/kt-2.5.3/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/kt-2.5.3/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.js"></script>

<script type="text/javascript">
$('#backendusers').DataTable({
 });
</script>
@endsection