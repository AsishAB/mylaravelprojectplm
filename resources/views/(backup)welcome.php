
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stylish Portfolio - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="{{ asset('image/x-icon') }}" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav class="navbar navbar-expand sticky-top navbar-info @if(auth()->check())  @can('manage-users')bg-danger text-white @endcan @can('manage-contact-msg' )style='background-color:yellow;color:white' @endcan bg-dark @else bg-info @endif">
            <a class="navbar-brand" href="@auth {{url('dashboard')}} @endauth  @guest {{url('/')}} @endguest">My Project</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
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
                   <i class="fas fa-bell fa-2x"></i><span class="notfs badge badge-success" id="notfs1"></span></a>
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdownnotf">
                   <a class="dropdown-item" href="{{url('viewnotf')}}" id="new_notf">@if(auth()->user()->noofnotification) == 0)No new Notification @endif</a>
                    <div class="dropdown-divider" id="navbardivider" style="display: none;"></div>
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
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Stylish Portfolio</h1>
                <h3 class="mb-5"><em>A Free Bootstrap Theme by Start Bootstrap</em></h3>
                <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>Stylish Portfolio is the perfect theme for your next project!</h2>
                        <p class="lead mb-5">
                            This theme features a flexible, UX friendly sidebar menu and stock photos from our friends at
                            <a href="https://unsplash.com/">Unsplash</a>
                            !
                        </p>
                        <a class="btn btn-dark btn-xl" href="#services">What We Offer</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Services</h3>
                    <h2 class="mb-5">What We Offer</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Responsive</strong></h4>
                        <p class="text-faded mb-0">Looks great on any screen size!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>Redesigned</strong></h4>
                        <p class="text-faded mb-0">Freshly redesigned for Bootstrap 5.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>Favorited</strong></h4>
                        <p class="text-faded mb-0">
                            Millions of users
                            <i class="fas fa-heart"></i>
                            Start Bootstrap!
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>Question</strong></h4>
                        <p class="text-faded mb-0">I mustache you a question...</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5">
                    Welcome to
                    <em>your</em>
                    next website!
                </h2>
                <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/theme/stylish-portfolio/">Download Now!</a>
            </div>
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Portfolio</h3>
                    <h2 class="mb-5">Recent Projects</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Stationary</div>
                                    <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('assets/img/portfolio-1.jpg') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Ice Cream</div>
                                    <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('assets/img/portfolio-2.jpg') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Strawberries</div>
                                    <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('assets/img/portfolio-3.jpg') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Workspace</div>
                                    <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('assets/img/portfolio-4.jpg') }}" alt="..." />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">The buttons below are impossible to resist...</h2>
                <a class="btn btn-xl btn-light me-4" href="#!">Click Me!</a>
                <a class="btn btn-xl btn-dark" href="#!">Look at Me!</a>
            </div>
        </section>
        <!-- Map-->
        <div class="map" id="contact">
            <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
            <br />
            <small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a></small>
        </div>
        <!-- Footer-->
           <!-- Footer -->
  <footer class="footer-bottom font-small  sticky-bottom border text-white lighten-3 pt-4" style="background-color: #6351ce;">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">
  
      <!-- Grid row -->
      <div class="row">
  
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
  
          <!-- Content -->
          <h5 class="font-weight-bold text-uppercase mb-4">PMC WORLD</h5>
          <p>Here you can use rows and columns to organize your footer content.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident voluptate
            esse
            quasi, veritatis totam voluptas nostrum.</p>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
  
          
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
  
          <!-- Contact details -->
          <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>
  
          <ul class="list-unstyled">
            <li>
              <p>
                <i class="fas fa-home mr-3"></i> Jatni, Odisha, India</p>
            </li>
            <li>
              <p>
                <i class="fas fa-envelope mr-3"></i> example@example.com</p>
            </li>
            <li>
              <p>
                <i class="fas fa-phone mr-3"></i>9999099990</p>
            </li>
            
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 text-center mx-auto my-4">
  
          <!-- Social buttons -->
          <h5 class="font-weight-bold text-uppercase mb-4">Social Tags</h5>
  
          <!-- Facebook -->
          <a type="button" class="btn-floating btn-fb" href="#" target="_blank">
            <i class="fab fa-facebook-square fa-2x"></i>
          </a>
          <!-- Twitter -->
          <a type="button" class="btn-floating btn-tw" href="#" target="_blank">
            <i class="fab fa-twitter-square fa-2x"></i>
          </a>
          <!-- Google +-->
          <a type="button" class="btn-floating" href="https://github.com/" target="_blank"> 
            <i class="fab fa-github-square fa-2x"></i>
          </a>
          <!-- Dribbble -->
          <a type="button" class="btn-floating" href="#" target="_blank"> 
            <i class="fab fa-linkedin fa-2x"></i>
          </a>
  
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© {{ now()->year }} Copyright:
      <a href="#" class="text-white"> A B</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer ends-->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
       
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
