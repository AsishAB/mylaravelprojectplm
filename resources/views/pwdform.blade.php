@extends('commonview.app')
@section('content')
@include('editform-css')
@section('content')
@include('welcome-css')


    <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('assets/img/users-17.png') }}" alt="AB" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#password">Password</a></li>
                    
                </ul>
            </div>
        </nav>

        <div class="body2">
 <div class="agile-login">
    <h1>User, Me</h1>
    <div class="wrapper">
      
      <div class="w3ls-form">
      	<form id='editemail' class="collapse" id="password_reset_form" autocomplete="off">
          @csrf
          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <input type="hidden" name="id" id='id' value="">
          <label>Current Password:</label>
          <input type="password" class="pwdfield" id="rp_current_password" name="rp_current_password">
          <div class="error text-danger"></div>
          <label>New Password:</label>
          <input type="password" class="pwdfield" name="rp_new_password" id="rp_new_password">
          <div class="error text-danger"></div>
          <label>Confirm Password:</label>
          <input type="password" class="pwdfield" name="rp_confirm_password" id="rp_confirm_password">
          <div class="error text-danger"></div>
          <button type="submit" class="buttons" id='change_password'>Change Password</button>
          <button type="button" class="cancelb">Cancel</button>
        </form>
        <div class="alert alert-danger alert-dismissible shadow fade show m-4" role="alert" id="alert_errors"><strong id="alert_messages"></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                     </button>
       </div> 
    </div>
</div>
</div>
</div>

@endsection