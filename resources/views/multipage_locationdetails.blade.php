 @extends('commonview.app')
 @guest
   @section('content')
  @include('signup-css')
<div class="body1">
  <div class="progress mr-3 ml-3">
          <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 83.35%"></div>
      </div>
    <div class="container container2 mt-5">
     
      <div class="row">
       <div class="col-md-8 offset-md-2">
        	<h1 class="text-white text-center display-2">Step 5</h1>
          <div class="login-form">
            <div class="text-center mt-4">
            <p class="display-4">(Optional-You can provide these details later)</p>
            </div>
            <form id="newuser2_step1" method="post" action="mp_review" autocomplete="off">
              @csrf
              <div class="form-group">
                <label for="RefNo">Reference Number: </label>
                <input type="text" class="form-control" id="refno" name="refno" readonly value="{{$tuser->referenceno ??  $refno}}"><br>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Address Line:</label>
                <textarea class="form-control" id="address" name="address" placeholder="Address Line">{{$tuser->temp_address ?? ''}}</textarea>
              </div>

              <div class="form-group">
                  <label for="country">Country:</label>
                  <select name="country" class="form-control" id="countrylist">
                        <option disabled selected>Select Country</option>
                        
                        @foreach($countryname as $key => $country)
                         <option id="countryname" value="{{$country->countryname}}" {{$tuser->temp_country==$country->countryname ?'selected' :''}}>{{$country->countryname}}</option>
                         
                          @endforeach
                       </select>
                    </div>

                    <div class="form-group " id="statelistdiv">
                     <label>State:</label><br /> 
                     <select name="state" id="statelist" class="form-control demoInputBox">
                        <option readonly disabled>Select State</option>
                      
                      </select>
                  
                  </div>

                   <div class="form-group" id="citylistdiv">
                       <label>City:</label><br /> 
                       <select name="city" id="citylist" class="form-control demoInputBox">
                           <option readonly disabled>Select City</option>
                         </select>
                    </div>

                  <div class="form-group" >
                   <label for="pincode">Pin Code:</label>
                   <input type="text" class="form-control" name="pincode"  id="pincode" placeholder="Enter Pin Code" value="{{$tuser->temp_pincode ?? ''}}">
                   </div>

                <div class="form-group" >
                <button type="submit" class="btn btn-primary btn2"> Proceed to Confirm your Details <i class="fas fa-long-arrow-alt-right"></i></button><br><br>
                <a href="{{url('prevmpage?p=4')}}"><button type="button" class="btn btn-warning btn2"><i class="fas fa-long-arrow-alt-left"></i>  Previous </button></a><br><br>
                 <button type="button" class="btn btn-danger btn2 mt-5" id="cancel_rgn"><i class="fas fa-times"></i>  Cancel Registration</button>
              </div>

            </form>
          </div>
        </div>
      </div>
      
    </div>

   
  </div>

<script type="text/javascript">

 $(document).ready(function(){
  $('#cancel_rgn').click(function(e){
       swal({
              title: "Are you sure?",
              text: "Please note your reference no. Your details will be safe, as long as you can provide us with your reference no.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Your details are safe. Please remember the reference number, in case you want to continue with the signup process. You will be redirected....", {
                  icon: "success",
                  button:false
                }); setTimeout(function(){location.replace("{{ url('newsignup') }}");},10000);
              } else {
                swal("Please continue with the signup process");
              }
            });

     });
   $(function(){
     viewStateList();
     viewCityList();
    });
 
function viewStateList(){
 var countryname = $('#countrylist').val();
 
     console.log("State Name for Country",countryname);

       if(!countryname){
         return;
       }
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }

           });  
                $.ajax({
                       type:'GET',
                       url: "{{ url('get-states?countryname=') }}"+countryname,
                       success:function(response){
                         // console.log(response);
                         if(response){
                            // $('#statelistdiv').show();
                           $("#statelist").empty();
                           // If no State exists for a country
                           if(response.length==0){
                               $('#statelist').append('<option value="Unnamed State in '+countryname+'">Unnamed State in '+countryname+'</option>');
                             }
                            
                            // $("#statelist").append('<option>Select State</option>');
                            $.each(response,function(key,value){
                             console.log("States-> ",value);
                               $("#statelist").append('<option value="'+value+'">'+value+'</option>');
                               });
                         }
                     },
  
                }); //ajax ends
 
} //viewStateList ends

function viewCityList(){
var statename = $('#statelist').val();
  console.log("City Name for state",statename);
       if(!statename){
         return;
       }
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
           });  
       $.ajax({
                 type:'GET',
                 url: "{{ url('get-cities?statename=') }}"+statename,

                 success:function(response){
                   // console.log(response);

                   if(response){                  
                     // $('#citylistdiv').show();
                     $("#citylist").empty();
                      // $("#citylist").append('<option>Select City</option>');
                      if(response.length==0){
                       $('#citylist').append('<option value="Unnamed City in '+statename+'">Unnamed City in '+statename+'</option>');
                     }
                    
                      $.each(response,function(key,value){
                       console.log("Cities-> ",value);
                       
                         $("#citylist").append('<option value="'+value+'">'+value+'</option>');
                       
                         
                             // $('#pincode').show();
                     });
                   }
                     // $('#pincode').show();
                 },

   

          }); //ajax ends


} //viewCityList ends

$('#countrylist').change(viewStateList);
   

$('#statelist').change(viewCityList);

});

</script>

 @endsection
 @endguest
 @auth
  <script type="text/javascript">window.location="{{ url('dashboard') }}";</script>
 @endauth
 