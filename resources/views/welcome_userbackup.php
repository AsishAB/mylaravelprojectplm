@extends('commonview.app')

@section('content')
@auth
<div class="alert alert-success text-center m-5" role="alert">

 Welcome<strong> {{Auth::user()->first_name}}!</strong> You are Logged In.
 
</div>
<div class="alert alert-info text-center m-5" role="alert">

 Here are your details. You can <strong>EDIT</strong> your data from here.<br>
 If you wish to <strong>DELETE</strong> your account, click on the <strong><a href="#delete_user">Delete </a></strong> Button
</div>

<form class="form-group" id="new_user_form" method="post" action="edit_user" autocomplete="off">
  @csrf
 <div class="row  m-5 p-5 bg-success text-white">
     <div class="col">
<div class="form-group">
  
  <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
  <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}" readonly>

 <label for="fname">First Name:</label>
 
  <input type="text" class="form-control" id="first_name" name="first_name" value="{{Auth::user()->first_name}}" readonly >
</div>
<div class="form-group">
 <label for="lname">Last Name:</label>
  <input type="text" class="form-control" name="last_name" id="last_name" value="{{Auth::user()->last_name}}" readonly>
</div>
<div class="form-group">
 <label for="fname">Full Name:</label>
  <!-- <input type="text" class="form-control" name="last_name" id="last_name" value="{{Auth::user()->last_name}}"> -->
<input type="text" class="form-control" name="full_name" id="full_name" value="{{Auth::user()->full_name}}" readonly>
<!-- <div class="error text-white bg-danger"></div> -->
</div>
<div class="form-group">
 <label for="email">Email/Username:</label>
 <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" readonly>
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="text" class="form-control" name="password1" id="password1" value="{{'**** For security, your password is hidden****'}}" readonly>
  <input type="hidden" class="form-control" name="password2" id="password2" value="{{Auth::user()->password}}" readonly>
</div>

  <div class="form-group">
 <label for="mobno">Mobile Number:</label>
 <input type="text" class="form-control" name="mobno" id="mobno" value="{{Auth::user()->mobno}}" readonly>
</div>
<div class="form-group">
 <label for="dob">Date of Birth(in YYYY-MM-DD):</label>
  <input type="text" class="form-control" name="dob" id="dob" value="{{Auth::user()->DOB}}" readonly>
</div>

<!-- <div class="form-group">
  <label for="gender">Gender:</label>
 <input type="text" class="form-control" name="gender" id="gender" value="{{Auth::user()->gender}}" readonly>

 </div> -->
 <div class="form-group ">
  <label for="gender">Gender:</label>
  <br>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <input class="form-check-input text-white" type="radio" name="gender" disabled id="Female"  value="Female" {{Auth::user()->gender=="Female" ? 'checked' : '' }} >
  <label class="form-check-label" for="Female">
    Female
  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <input class="form-check-input text-white" type="radio" name="gender" disabled id="Male"  value="Male" {{Auth::user()->gender=="Male" ? 'checked' : '' }} >
  <label class="form-check-label" for="Male">
    Male
  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
  <input class="form-check-input text-white" type="radio" name="gender"disabled id="Other"   value="Other" {{Auth::user()->gender=="Other" ? 'checked' : '' }}>
  <label class="form-check-label" for="Other">
    Other
  </label>
  <input type="text" class="form-control" name="gender" id="gender" value="{{Auth::user()->gender}}" readonly>
   </div>

  <div class="form-group">
  <label for="address">Address:</label>
 <textarea class="form-control" rows="5" name="address" id="address" readonly>{{Auth::user()->address}}</textarea>
</div>

<div class="form-group">
<label for="country">Country:</label>
 <input name="country" class="form-control" id="countrylist" value="{{Auth::user()->country}}" readonly>
</div>

<div class="form-group">
<label for="state">State:</label>
 <input name="state" class="form-control" id="statelist" value="{{Auth::user()->state}}" readonly>
</div>

<div class="form-group">
<label for="city">City:</label>
 <input name="city" class="form-control" id="citylist" value="{{Auth::user()->city}}" readonly>
</div>

<div class="form-group">
<label for="pincode">Pin Code:</label>
 <input name="pincode" class="form-control" id="pincode" value="{{Auth::user()->pincode}}" readonly>
</div>

<div class="form-group">
<label for="full_address">Complete Address:</label>
 <input name="full_address" class="form-control" id="full_address" value="{{Auth::user()->full_address}}" readonly>
</div>

 <div class="form-group">
 <label for="dt">Account creation date and time:</label>
   <input type="text" class="form-control" name="dt" id="dt" value="{{Auth::user()->created_at}}" readonly>
</div>

<div class="form-group text-center ">
<a href="edit_user"><button type="submit" class="btn btn-warning" id="edit_user_button">Edit</button></a>
<button type="button" id="delete_user" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
</div>

</div>

</div>

</form>
<div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
      
        <h5 class="modal-title text-danger text-center"  id="exampleModalLabel" >Are you sure you want to delete this user?</h5>
       
      </div>
      <div class="modal-body " method="post" autocomplete="off">
        <strong class="text-info text-center ">Please Confirm your Details</strong>
        <form id="delete_user_form">
          @csrf
          <div class="form-group">
             <input type="hidden" name="_token" id="d_csrf" value="{{Session::token()}}">
            <input type="hidden" class="form-control" id="d_id" name="d_id" value="{{Auth::user()->id}}">
            <input type="hidden" class="form-control" id="d_email" name="d_email" value="{{Auth::user()->email}}">
             <!-- <input type="text" class="form-control" id="d_id" name="d_id" value="{{Auth::user()->id}}" readonly> -->
            <label for="d_full_name" class="col-form-label">Full Name:</label>
            <input type="text" class="form-control" id="d_full_name" name="d_full_name">
          </div>
          <div class="form-group">
            <label for="d_password" class="col-form-label">Confirm Your Password:</label>
            <input type="password" class="form-control" name="d_password" id="d_password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="final_delete">Delete User</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
      
         $('#deleteModal').ready(function(){
          // alert("HELLO");
         
          $('#final_delete').on('click', function(e) {
           
            e.preventDefault();
             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       // var get_data = $("#delete_user_form").serialize(); 
            $.ajax({
               method:"post",
               url:"delete_user",
               cache: false,
               processData:true,   //Required
               contentType: 'application/x-www-form-urlencoded',
               // data:get_data,
               data:

               {
                      'd_token'            :    $("#csrf").val(),
                       'd_id'              :    $('#d_id').val(),
                     'd_email'             :    $('#d_email').val(),
                     'd_full_name'         :    $('#d_full_name').val(),
                     'd_password'          :    $('#d_password').val(),

                },

                dataType :"JSON",
                success:function (response){
                   // console.log('delete----->',response);
                  if(response.success===true){
                                  swal({
                        title: "User deleted Successfully",
                        text: "You will now be logged out.Sorry to see you go!!",
                         icon: "warning",
                        button: false,
                         });

                        setTimeout(function(){ window.location = "login";},2000);

                       }else if(response.success===false){
                         if(response.action===0){
                                      swal({
                                // title: "Error!",
                                 title: "Name or Password cannot be blank",
                                 text: "Please input correct details are try again",
                                icon: "warning",
                                button: true,
                                           });

                                 } else if(response.action===1){
                                      swal({
                                // title: "Error!",
                                 title: "Either Name or Password is not correct",
                                 text: "Please input correct details are try again",
                                icon: "warning",
                                button: true,
                                           });

                                 }else if(response.action===2){
                                      swal({
                                // title: "Error!",
                                 title: "Unauthenticated User! Please re-login to continue",
                                icon: "warning",
                                button: false,
                                       });
                         setTimeout(function(){ window.location = "login";},100);



                                }
                  // console.log('delete----->',response);
                 // setTimeout(function(){ window.location = "login";},2000);
                }
              },
                error:function (response){
                  // console.log(textStatus.responseText);
                  swal({
                   title: "Oops! Some Error",
                   text: "Please use the Contact Us form to Contact us to Delete your Account",
                   icon: "warning",
                   button: true,
                  dangerMode: true,

                  });
                  
                   

                },
            }); //ajax ends here

          }); //$("#final_delete").click ends

          
            
         
  });
  
 //$('#delete_user').click(function(e) ends

 // });
 //  });



   




</script> 

 





@endauth


<!-- Unauthenticated users are kicked out -->

  @guest
 <!-- <a href="{{url('logout')}}"/> <button type="button" class="btn btn-danger btn-lg btn-block">Unauthorised user! Please login or signup before you can enter this page</button>   -->

 <script type="text/javascript">window.location="login"</script>

@endguest


  
@endsection


