

 <header>
    <nav class="navbar navbar-expand sticky-top navbar-dark @if(auth()->check()) bg-dark @else bg-info @endif @can('manage-users') bg-danger text-white @endcan @can('manage-contact-msg' ) style='background-color:yellow;color:white' @endcan ">
        <a class="navbar-brand" href="@auth {{url('dashboard')}} @endauth  @guest {{url('/')}} @endguest">My Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact Us</a>
                </li>
            </ul>
     
            <ul class="navbar-nav">
              @guest
                <li class="nav-item">
     
                    <a class="nav-link" href="{{url('loginoptions')}}"><i class="fas fa-sign-in-alt"></i> Login options</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"href="{{url('signupoptions')}}"><i class="fas fa-user-plus"></i> Signup Options</a>
                </li>
                @endguest
                @auth
                 
            <li class="nav-item dropdown">
             <a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
               <i class="fas fa-bell fa-2x"></i>
               @if(auth()->user()->noofnotification > 0)
                <span class="notfs badge @if(auth()->user()->noofnotification > 10) badge-danger @elseif(auth()->user()->noofnotification > 5) badge-warning @else badge-success @endif" id="notfs1">
                  {{auth()->user()->noofnotification}}
                </span> 
               @endif
               </a>
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdownnotf">
               <a class="dropdown-item" href="{{url('viewnotf')}}" id="new_notf">
                @if(auth()->user()->noofnotification == 0) 
                  No new Notification 
                @else  
                  <span class="@if(auth()->user()->noofnotification > 10) text-danger @elseif(auth()->user()->noofnotification > 5) text-warning @else text-success @endif">  
                    You have {{auth()->user()->noofnotification}}  notification (s) </span>
                @endif
              
              </a>
                <div class="dropdown-divider" id="navbardivider"></div>
             </div>
           </li>
                   <a class="nav-link" href="#">
                </li>
                <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
               {{Auth::user()->first_name}}
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{url('dashboard')}}"><i class="fas fa-columns"></i> Dashboard</a>
               <a class="dropdown-item" href="{{url('profile')}}"><i class="far fa-id-badge"></i> Profile</a>
               <a class="dropdown-item" href="{{url('contactm')}}"><i class="fas fa-envelope-open-text"></i> Messages</a>
               <a class="dropdown-item" href="{{url('viewnotf')}}"><i class="far fa-bell"></i> <span class="notfs badge  @if((auth()->user()->noofnotification) > 7)badge-danger @else badge-success @endif" id="notfs2">@if((auth()->user()->noofnotification) != 0){{auth()->user()->noofnotification}}@endif</span>All Notifications</a>
               @can('manage-users')
               <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('userslist')}}"><i class="fas fa-users"></i> All Users</a>
                <a class="dropdown-item" href="{{url('contactbackend')}}"><i class="fas fa-reply-all"></i> Replies from Customer Support</a>
                <a class="dropdown-item" href="{{url('admin-email')}}"><i class="fas fa-comment-dots"></i> Admin Messages</a>
               @endcan
               @can('manage-contact-msg')
               <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('contactbackend')}}"><i class="fas fa-reply-all"></i> Messages from other users</a>
               @endcan
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
             </div>
           </li>
                @endauth
            </ul>
        </div>
     </nav>
</header>





