<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} || @yield('title')</title>
    <meta name="author" content="{{ config('app.name', 'Laravel') }}">
    <meta name="description" content="@yield('description')">
    <meta name="keywords " content="@yield('keywords')">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png?v=1') }}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png?v=1') }}" />
    <!-- Google Fonts -->
    <!-- Preloaded local web font (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/fonts/font.css') }}">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('master/vendor/bootstrap/css/bootstrap.min.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/vendor/bootstrap-icons/bootstrap-icons.css?v=1.10.9') }}">    
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('master/css/style.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/css/jquery.toast.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/css/select2.min.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/css/daterangepicker.css?v=1.10.9') }}">
    <!-- datatables CSS File -->
    <link rel="stylesheet" href="{{ asset('master/vendor/datatables/css/dataTables.bootstrap5.min.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/vendor/datatables/css/buttons.bootstrap5.min.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/vendor/datatables/css/fixedColumns.dataTables.min.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/css/fullcalendar.min.css?v=1.10.9') }}">
    <link rel="stylesheet" href="{{ asset('master/css/sweetalert.css?v=1.10.11') }}">
    @yield('style')
</head>

<body oncontextmenu="return true;" @guest style="background-image: url('{{ asset('master/img/login_bg.jpg') }}'); background-size: cover;" @endguest>
    <div id="app">
        <!-- ======= Header ======= -->
        @auth()
            <header id="header" class="header fixed-top d-flex align-items-center">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{ route('master.dashboard') }}" class="logo d-flex align-items-center">
                        <img src="{{ asset('assets/images/logo-final-new.png') }}" alt="{{ config('app.name', 'Tourister Map') }}">
                    </a>
                    <i class="bi bi-list toggle-sidebar-btn"></i>
                </div><!-- End Logo -->
                
                <nav class="header-nav ms-auto">
                    <ul class="d-flex align-items-center">                       
                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <img src="{{ asset('storage/users/'.Auth::user()->profile_image) }}" alt="Profile" class="rounded-circle">
                                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <span style="white-space: normal;">{{ config('app.name', 'Laravel') }}</span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('master.profile') }}">
                                        <i class="bi bi-person"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('master.change.password') }}">
                                        <i class="bi bi-key"></i>
                                        <span>Change Password</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Sign Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            <!-- ======= Sidebar ======= -->
            <aside id="sidebar" class="sidebar">
                <ul class="sidebar-nav" id="sidebar-nav">
                    <li class="nav-item" id="dashboard">
                        <a class="nav-link collapsed" href="{{ route('master.dashboard') }}">
                            <i class="bi bi-grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" id="products">
                        <a class="nav-link collapsed" href="{{ route('master.products.index') }}">
                            <i class="bi bi-layers"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="nav-item" id="projects">
                        <a class="nav-link collapsed" href="{{ route('master.projects.index') }}">
                            <i class="bi bi-intersect"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li class="nav-item" id="services">
                        <a class="nav-link collapsed" href="{{ route('master.services.index') }}">
                            <i class="bi bi-life-preserver"></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <li class="nav-item" id="blog">
                        <a class="nav-link collapsed" href="{{ route('master.blog.index') }}">
                            <i class="bi bi-file-earmark-text"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="nav-item" id="testimonials">
                        <a class="nav-link collapsed" href="{{ route('master.testimonials.index') }}">
                            <i class="bi bi-stars"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <li class="nav-item" id="visitor-details">
                        <a class="nav-link collapsed" href="{{ route('master.visitor.details') }}">
                            <i class="bi bi-person-lines-fill"></i>
                            <span>Visitor Details</span>
                        </a>
                    </li>
                    
                    <li class="nav-item" id="contact-us">
                        <a class="nav-link collapsed" href="{{ route('master.contact.us') }}">
                            <i class="bi bi-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li class="nav-heading">Account Settings</li>
                    <li class="nav-item" id="profile">
                        <a class="nav-link collapsed" href="{{ route('master.profile') }}">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                    </li> 
                    <li class="nav-item" id="change-password">
                        <a class="nav-link collapsed" href="{{ route('master.change.password') }}">
                            <i class="bi bi-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('logout') }}"
                            onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </aside>
        @endauth
        <main @auth() id="main" @endauth class="main">
            <div class="loader-container" id="loader">
                <div class="loader"></div>
            </div>
            @yield('content')
        </main>

        <!-- ======= Footer ======= -->
        @auth()
            <footer id="footer" class="footer">
                <div class="copyright">
                    &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All Rights Reserved
                </div>
            </footer>
        @endauth
        <!-- End Footer -->
        <a href="javascript:void(0);" class="back-to-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>
    </div>
    <!-- JS Files -->
    <script type="text/javascript" src="{{ asset('master/vendor/bootstrap/js/bootstrap.bundle.min.js?v=1.10.9') }}"></script>
    <!-- Template Main JS File -->
    <script type="text/javascript" src="{{ asset('master/js/jquery.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/js/jquery.toast.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/js/toastr.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/js/main.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/js/select2.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/js/sweetalert.min.js?v=1.10.9') }}"></script>
    <script>
        $(document).ready(function() {
            
            @if(Session::has('message_heading') && Session::has('message') && Session::has('error_icon'))
                $.toast({
                        heading: '{{ Session::get("message_heading") }}',
                        text: '{{ Session::get("message") }}',
                        position: 'top-right',
                        loaderBg: '#2e3192',
                        icon: '{{ Session::get("error_icon") }}', // success, warning, error, and info
                        hideAfter: 15000,
                        stack: 6
                    });
                @php
                Session::forget('message_heading');
                Session::forget('message');
                Session::forget('error_icon');
                @endphp
            @endif

            $('.select2').each(function () {
                $(this).select2({
                    dropdownParent: $(this).parent(),
                });
            });

            $("a.back-to-top").click(function(){
                $("html, body").animate({ scrollTop: 0 }, "fast");
            });

            $('#basic-addon2').on('click', function(){
                if($('#password').attr('type') == 'text'){
                    $(this).html('<i class="bi bi-eye-fill"></i>');
                    $('#password').attr('type', 'password');
                }
                else{
                    $(this).html('<i class="bi bi-eye-slash-fill"></i>');
                    $('#password').attr('type', 'text');
                }    
            });
        });
        
        let editorUploadUrl = "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}";
    </script> 
    <script type="text/javascript" src="{{ asset('master/js/moment.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/js/daterangepicker.min.js?v=1.10.9') }}"></script>
    <!-- datatables js File -->
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/jquery.dataTables.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/dataTables.bootstrap5.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/dataTables.buttons.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/buttons.bootstrap5.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/jszip.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/pdfmake.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/vfs_fonts.js?v=1.10.9') }}"></script>        
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/buttons.html5.min.js?v=1.10.9') }}"></script>  
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/buttons.print.min.js?v=1.10.9') }}"></script>  
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/buttons.colVis.min.js?v=1.10.9') }}"></script> 
    <script type="text/javascript" src="{{ asset('master/ckeditor/ckeditor.js?v=1.10.9') }}"></script>
    <script type="text/javascript" src="{{ asset('master/vendor/datatables/js/dataTables.fixedColumns.min.js?v=1.10.9') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: true,
                lengthMenu: [
                    [10, 50, 100, 200, -1],
                    [10, 50, 100, 200, 'All']
                ],
                buttons: [
                    'csv',
                    'excel',
                    /* {
                        extend: 'pdfHtml5',
                        title: "{{ isset(Auth::user()->name) ? Auth::user()->name : config('app.name', 'Tourister Map') }}"
                    },
                    'print' */
                ],
                fixedColumns: {
                    left: 1,
                    right: 1
                }
                //buttons: [ 'csv', 'excel', 'pdf', 'print'] //, 'colvis'
            });        
            table.buttons().container().appendTo('#example_wrapper .col-md-7.om-button:eq(0)');

            var table1 = $('#example-table').DataTable({
                info: false,
                paging: false,
                buttons: [
                    'csv',
                    'excel',
                ],
                fixedColumns: {
                    left: 1,
                    right: 1
                }
            });        
            table1.buttons().container().appendTo('#example-table_wrapper .col-md-7.om-button:eq(0)');
        
            $('.confirm-delete').on('click', function(event) {
                event.preventDefault();
                let urlToRedirect = event.currentTarget.getAttribute('href');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will also lose the related details and will not be able to recover them!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonColor: '#dd6b55',
                    cancelButtonColor: '#999',
                    confirmButtonText: 'Yes!',
                    cancelButtonText: 'No',
                    closeOnConfirm: true
                }, function(willDeleteData) {
                    if (willDeleteData) {
                        window.location.href = urlToRedirect;
                    }
                });
            });

           
        });
    </script>
    @yield('script')
</body>
</html>
