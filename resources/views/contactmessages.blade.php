@extends('commonview.app')
@section('content')
@auth
<div class="container m-5">
<table id="table_id" class="table table-striped table-bordered mydatatable m-5" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Asked On</th>
            <th>Answered On</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
            @foreach($msg as $key => $message)
      <tr>
                  <th><a href="user-message/{{$message->msg_id}}">#{{$message->msg_id}}</a></th>
                  <th>{{$message->initial_msg}}</th>
                  <th>{{$message->msg_asked_on}}</th>
                  <th></th>
                  <th>{{$message->status}}</th>
              </tr>

            @endforeach
        
    </tbody>
    <tfoot>
    	<tr>
            <th>ID</th>
            <th>Message</th>
            <th>Asked On</th>
            <th>Answered On</th>
            <th>Status</th>
        </tr>

    </tfoot>
</table>
</div>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/kt-2.5.3/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/kt-2.5.3/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.js"></script>

<script type="text/javascript">


	$('#table_id').DataTable({

  });



	
</script>


@endauth
@endsection