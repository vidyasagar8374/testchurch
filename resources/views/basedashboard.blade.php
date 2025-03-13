<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>@yield('title')</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />
        <!-- Favicons -->
        <link href="img/infant_logo.png" rel="icon" />
        <link href="img/infant_logo.png" rel="apple-touch-icon" />
        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
        <!-- Vendor CSS Files -->

        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    

    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('admindashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('/img/infant_logo.png') }}" width="50" height="50" alt="" class="rounded-circle">
                    <span class="d-none d-lg-block">Infant</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div>
            <!-- End Logo -->

            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="POST" action="#">
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <!-- End Search Bar -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle" href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <!-- End Search Icon-->

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">4</span>
                        </a>
                        <!-- End Notification Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                                You have 4 new notifications
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Lorem Ipsum</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>30 min. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-x-circle text-danger"></i>
                                <div>
                                    <h4>Atque rerum nesciunt</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>1 hr. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>Sit rerum fuga</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>2 hrs. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-info-circle text-primary"></i>
                                <div>
                                    <h4>Dicta reprehenderit</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li class="dropdown-footer">
                                <a href="#">Show all notifications</a>
                            </li>
                        </ul>
                        <!-- End Notification Dropdown Items -->
                    </li>
                    <!-- End Notification Nav -->

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text"></i>
                            <span class="badge bg-success badge-number">3</span>
                        </a>
                        <!-- End Messages Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                            <li class="dropdown-header">
                                You have 3 new messages
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle" />
                                    <div>
                                        <h4>Maria Hudson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>4 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle" />
                                    <div>
                                        <h4>Anna Nelson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>6 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle" />
                                    <div>
                                        <h4>David Muldon</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>8 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">Show all messages</a>
                            </li>
                        </ul>
                        <!-- End Messages Dropdown Items -->
                    </li>
                    <!-- End Messages Nav -->

                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
                            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                        </a>
                        <!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Kevin Anderson</h6>
                                <span>Web Designer</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Need Help?</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>
                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li>
                    <!-- End Profile Nav -->
                </ul>
            </nav>
            <!-- End Icons Navigation -->
        </header>
        <!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admindashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <!-- End Components Nav -->
                <li class="nav-heading">Pages</li>
                @if(auth()->check() && auth()->user()->usertype == 'user')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('getRegisteredList') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Registerd Mass</span>
                    </a>
                </li>
                <!-- End Contact Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('massrequest') }}">
                    <i class="bi bi-pencil-square"></i>
                        <span>Mass Request</span>
                    </a>
                </li>
                <!-- End Contact Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('donationindex') }}">
                    <i class="bi bi-piggy-bank"></i>
                        <span>Donation</span>
                    </a>
                </li>
                <!-- End Contact Page Nav -->
                 <!-- family -->
                 @if(auth()->check() && auth()->user()->is_member == 1)
                 <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('familylist') }}">
                    <i class="bi bi-people-fill"></i>
                        <span>Family</span>
                    </a>
                </li>
                @endif
                <!-- family -->

                @endif @if(auth()->check() && auth()->user()->usertype == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('userlist') }}">
                    <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('massrequest') }}">
                    <i class="bi bi-pencil-square"></i>
                        <span>Mass Request</span>
                    </a>
                </li>
                <!-- End request mass -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('massrequests') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Requested Mass</span>
                    </a>
                </li>


                    <!-- mass data without Ajax -->
                        <!-- <li class="nav-item">
                            <a class="nav-link collapsed" href="{{ route('massrequestlistdatalist') }}">
                                <i class="bi bi-envelope"></i>
                                <span>Request MassData</span>
                            </a>
                        </li> -->
                <!-- mass data without Ajax -->
                <!-- End Contact Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('getRegisteredList') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Registerd Mass</span>
                    </a>
                </li>
                <!-- End Contact Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('donationindex') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Donation</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('familylist') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Family</span>
                    </a>
                </li>
                <!-- End Contact Page Nav -->
                <!-- accordian  -->
                <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                <span class="ps-3">Social</span>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                            <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{ route('admin.getbanners') }}">
                                        <i class="bi bi-question-circle"></i>
                                        <span>Banners</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{ route('admin.getyoutube') }}">
                                        <i class="bi bi-question-circle"></i>
                                        <span>Youtube</span>
                                    </a>
                                </li>
                                <!-- End F.A.Q Page Nav -->
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{ route('postindex') }}">
                                        <i class="bi bi-person"></i>
                                        <span>post</span>
                                    </a>
                                </li>
                                <!-- End Profile Page Nav -->
                                 <!-- End F.A.Q Page Nav -->
                                 <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{ route('admin.parishpristlist') }}">
                                        <i class="bi bi-person"></i>
                                        <span>Prists</span>
                                    </a>
                                </li>
                                <!-- End Profile Page Nav -->
                                <!-- enquiry -->
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{ route('enquiry') }}">
                                        <i class="bi bi-person"></i>
                                        <span>Enquiry</span>
                                    </a>
                                </li>
                                <!--end of enquiry -->
                            </div>
                        </div>
                    </div>
                    <!-- accordian mass feed -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <span class="ps-3">Mass Feed</span>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{ route('massrequestListindex') }}">
                                        <i class="bi bi-envelope"></i>
                                        <span>Request List</span>
                                    </a>
                                </li>
                                <!-- End Contact Page Nav -->

                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{ route('scheduleindex') }}">
                                        <i class="bi bi-envelope"></i>
                                        <span>Schedule List</span>
                                    </a>
                                </li>
                                <!-- End Contact Page Nav -->
                            </div>
                        </div>
                    </div>

                    <!-- Pages -->
                   
                </div>
                <!-- accordian  -->
                <!-- request mass -->
             
        
                <!-- End Contact Page Nav -->
                @endif
            </ul>
        </aside>
        <!-- End Sidebar-->

        @yield('content')

        <!-- ======= Footer ======= -->
        <!-- <footer id="footer" class="footer fixed-bottom">
            <div class="copyright">
                &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer> -->
        <!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->

        <script src=" {{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
       
        <script src=" {{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
        <script src=" {{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
        <script src=" {{ asset('assets/vendor/quill/quill.min.js') }}"></script>
        <script src=" {{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src=" {{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src=" {{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
