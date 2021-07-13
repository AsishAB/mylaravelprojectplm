
@extends('commonview.app')
@section('content')
<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Full Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Country</th>
      <th scope="col">States</th>
      <th scope="col">City</th>
     <th scope="col">Pincode</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td id="uid"></td>
      <td id="pwd">It won't be shown. But you can change it by clicking previous button</td>
      <td id="fn"></td>
      <td id="ln"></td>
      <td id="fum"></td>
      <td id="mob"></td>
      <td id="db"></td>
      <td id="addr"></td>
      <td id="cou"></td>
      <td id="st"></td>
      <td id="ct"></td>
      <td id="pin"></td>
      
    </tr>
    
  </tbody>
</table>
@endsection

     <strong>Email</strong>          :<span id="uid"></span>
     <strong>Password</strong>       :<span  id="pwd">It won't be shown. But you can change it by clicking previous                         button</span>
     <strong>First Name</strong>     :<span id="fn"></span>
     <strong>Last Name</strong>      :<span id="ln"></span>
     <strong>Full Name</strong>      :<span id="fum"></span>
     <strong>Mobile</strong>         :<span id="mob"></span>
     <strong>Address</strong>        :<span id="db"></span>
     <strong>Country</strong>        :<span id="addr"></span>
     <strong>States</strong>         :<span id="cou"></span>
     <strong>City</strong>           :<span id="st"></span>
     <strong>Pincode</strong>        :<span id="pin"></span>