@extends('commonview.app')
@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <div id="page-top">
       
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <div><img src="{{ asset('assets/img/my-logo.png') }}" alt="logo" height="250px" width="250px"></div>
                <h1 class="mb-0">Welcome to my Personal Project</h1>
                <h3 class="mb-5"><em>Developed by Asish Bishoi</em></h3>
                
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>I started this project as  a way to learn and enhance my 
                            <a href="javascript:void(0)"> PHP, Laravel and MySQL </a> &nbsp; skills</h2>
                        <p class="lead mb-5">
                            Since, I focussed much on backend technology, most of the complex designs 
                            are downloaded from various free and open source design sources, available on the internet.
                            
                        </p>
                        <a class="btn btn-dark" href="https://github.com/AsishAB" target="_blank"><i class="fab fa-github "></i> GitHub Link</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Features</h3>
                    <h2 class="mb-5">What I have included</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fas fa-sign-in-alt"></i></span>
                        <h4><strong>User Registration/Login System</strong></h4>
                        <p class="text-faded mb-0">Register and Login to access dashboard</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="far fa-envelope"></i></span>
                        <h4><strong>Contact Us Section</strong></h4>
                        <p class="text-faded mb-0">Get an email confirmation for contact</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fas fa-tools"></i></span>
                        <h4><strong>Admin Panel</strong></h4>
                        <p class="text-faded mb-0">
                           Manage Registered Users
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fas fa-bell"></i></span>
                        <h4><strong>Pusher Notification System</strong></h4>
                        <p class="text-faded mb-0">Notifications using Webhooks</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center ">
                <h4 class="mx-auto mb-5">
                    I will also do such a project using other languages such as
                    <em>Python</em>
                    , as and when I learn them, and even include more features if possible.
                </h4>
               
            </div>
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Portfolio</h3>
                    <h2 class="mb-5">Professional Projects</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="javascript:void(0)">
                            <div class="caption">
                                <div class="caption-content">
                                    <h2 class="h2">ONLINE APPLICATIONS FOR VARIOUS ELECTIONS FOR THE STATE OF ODISHA</h2>
                                    <p class="mb-0">Web Application For Nominations To Various Election Types Like Gram Panchayat, Panchayat Samiti, Municipal Corporation, NAC & Municipalty, etc. The Election Rules,
                                        Nomination Filing Rules, Election Dates Are Set By The Administrator. Applications include online payment system and online/offline withdrawl system.
                                        
                                        </p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('assets/img/portfolio-1.jpg') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="javascript:void(0)">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">AUTOMATION OF PROMOTION & DISCIPLINARY WINGS OF THE OPSC, ODISHA</div>
                                    <p class="mb-0">Development Of Open Source E-governance Web Based Solution For The 
                                        Odisha Public Service Commission (OPSC) To Automate Its Promotion And Disciplinary Wings.
                                    </p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('assets/img/portfolio-2.jpg') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="javascript:void(0)">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">WATER RESOURCES, GOVT OF ODISHA</div>
                                    <p class="mb-0">Automation Of Water Resources Department – CMS, New Connection (Industrial Water Allocation), Mbc (Water Metering, Billing And Collection), Water
                                        Resource Projects, Dashboard And Planning.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('assets/img/portfolio-3.jpg') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="javascript:void(0)">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">SINGLE PAGE WEB APPLICATION, AND USER INTERFACE FOR VARIOUS WEBSITES</div>
                                    <p class="mb-0">Single Page Web Applications For Various Websites With Content Management By The Administrator.</p>
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
                <h2 class="mb-4">HOBBIES AND INTERESTS </h2>
                <ul class="list-group" >
                    <li class="list-group-item bg-primary  text-white" style="border-style: none;">Playing Video Games </li>
                    <li class="list-group-item bg-primary  text-white" style="border-style: none;">Listening to music</li>
                    <li class="list-group-item bg-primary text-white" style="border-style: none;" >Watching Movies</li>
                    <li class="list-group-item bg-primary text-white" style="border-style: none;" >Going through online news</li>
                    
                  </ul>
                </div>
                
            </div>
        </section>
        <br>
        <section class="content-section text-white" style="background-color: rgb(255, 173, 71);">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Special Thanks to</h2>
                <ul class="list-group" style="font-size: 17px;">
                    <li class="list-group-item" style="background-color: rgb(255, 173, 71); color:white;border-style: none;">
                        <a href="https://colorlib.com/" class="text-white" target="_blank">Colorib</a>
                     </li>
                    <li class="list-group-item" style="background-color: rgb(255, 173, 71); color:white;border-style: none;">
                        <a href="https://startbootstrap.com/" class="text-white" target="_blank">Start BootStrap</a>
                    </li>
                    <li class="list-group-item" style="background-color: rgb(255, 173, 71); color:white;border-style: none;">
                        <a href="https://fontawesome.com/v5.15/icons" class="text-white" target="_blank"> Font Awesome Icons</a>
                    </li>
                    <li class="list-group-item" style="background-color: rgb(255, 173, 71); color:white;border-style: none;">
                        <a href="https://www.flaticon.com/" class="text-white" target="_blank">Flaticon</a> 
                    </li>
                    <li class="list-group-item" style="background-color: rgb(255, 173, 71); color:white;border-style: none;">
                        <a href="https://www.freelogodesign.org/" class="text-white" target="_blank">Free Logo Design</a> 
                    </li>
                    <li class="list-group-item" style="background-color: rgb(255, 173, 71); color:white;border-style: none;">
                        <a href="https://freefrontend.com/" class="text-white" target="_blank">Free Front End</a> 
                    </li>
                    <li class="list-group-item" style="background-color: rgb(255, 173, 71); color:white;border-style: none;">
                        <a href="https://stripo.email/" class="text-white" target="_blank">Stripo</a> 
                    </li>
                    
                    
                  </ul>
                </div>
                
            </div>
        </section>
        
       
        <script src="{{ asset('js/scripts.js') }}"></script>
 @endsection