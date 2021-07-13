@extends('commonview.app')
@section('content')
<div class="container mr-2 mt-5 ml-5 mb-5 table-responsive-md">
<table class="table table-striped mydatatable table-hover" id="backendtable">
  <thead>
    <tr style="background-color: red;color:white">
      <th scope="col">Sl No.</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email Address</th>
       <th scope="col">Account exists (Yes/No)</th>
        <th scope="col">Message</th>
      <th scope="col">Asked On (Initial Date and Time)</th>
      <th scope="col">Answered On</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($messages as $message)
    <tr @if($message->status == 'solved') style='background-color:green;color:white;' @endif>
      <th scope="row"><a href="backendreply/{{$message->ticketid}}">{{$message->ticketid}}</a></th>
      <td>{{$message->name}}</td>
      <td>{{$message->email}}</td>
      <td>@if($message->account_exists == 1) <span class="text-success">Yes</span> @else <span class="text-danger"> No </span> @endif</td>
      <td>{{$message->message}}</td>
      <td >{{ date('d M Y, h:i A',strtotime($message->asked_on)) }}</td>
       <td >@if($message->answered_on != '') {{ date('d M Y, h:i A',strtotime($message->answered_on)) }} @endif</td>
        <td >{{$message->status}}</td>
    </tr>
    @endforeach
  </tbody>

  <!-- Table Footer -->
  <tfoot>
    	<tr style="background-color: red;color:white">
      <th scope="col">Sl No.</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email Address</th>
       <th scope="col">Account exists (Yes/No)</th>
        <th scope="col">Message</th>
      <th scope="col">Asked On (Initial Date)</th>
      <th scope="col">Answered On</th>
      <th scope="col">Status</th>
        </tr>

  </tfoot>
</table>
</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/kt-2.5.3/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/kt-2.5.3/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.js"></script>

<script type="text/javascript">
$('#backendtable').DataTable({
 });
</script>


@endsection
