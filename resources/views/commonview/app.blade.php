<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="icon" type='image/png' href="{{ asset('assets/img/my-logo.png') }}">
   <!-- Bootstrap CSS -->
   
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <!-- CSRF META TAG -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


   <!-- Font awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
   <!-- Data Table -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.css"/>
  <!-- Toastr -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>

 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

 
</head>

<body>



@include('commonview.navbar');

@yield('content')



@include('commonview.footer');



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script> 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

@auth
<script>
     
//     // Enable pusher logging - don't include this in production
//     Pusher.logToConsole = true;
// var count = 0;
// var i =0;
//     var pusher = new Pusher('be850f6784915a1d43b8', {
//       cluster: 'ap2'
//     });

//     var channel = pusher.subscribe('new-notf');
//     channel.bind('pusher:subscription_succeeded', function(members) {
//     console.log('successfully subscribed!');
// });
//     channel.bind("user-notified", function(data) {
//       // alert(JSON.stringify(data));
       
//            count++;
//            console.log(count, "=" ,data);
//               $('#notfs1').html(data);





        //       if(count > 0){
        //         $('#new_notf').html("");
        //         // var msg =  '<a class="dropdown-item" href="{{url("viewnotf")}}">';
        //         // msg+= "You have a ";
        //         // msg+= "new message(s)</a>";
        //    $('#notfs1').html(count);
        //    for( i; i<count; i++){
        //     console.log("i = ", i);
        //      var msg =  '<a class="dropdown-item" href="{{url("viewnotf")}}">';
        //         msg+= "You have a ";
        //         msg+= "new message(s)</a>";
        //         msg+= '<div class="dropdown-divider" id="navbardivider"></div>';
        //     $('#dropdownnotf').append(msg);
        //     // $('#navbardivider').show();
        //    }
        //  }
      
  
        // });
  </script>
 @endauth
 @yield('scripts')

</body>
</html>