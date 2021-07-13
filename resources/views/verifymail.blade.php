@extends('commonview.app')
@section('content')
<div class="alert alert-primary m-5" role="alert">
  {{$data}} You will now be redirected..
</div>
<script type="text/javascript">
	 setTimeout(function(){ location.replace("{{ url('login') }}");},1000);
;


</script>
@endsection