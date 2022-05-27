<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}/images/favicon.png">
    <link rel="stylesheet" href="{{asset('/')}}/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="{{asset('/')}}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Summernote -->
    <link href="{{asset('/')}}summernote/summernote.css" rel="stylesheet">
    <link href="{{asset('/')}}/css/style.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{asset('/')}}/images/logo.png" alt="">
                <img class="logo-compact" src="{{asset('/')}}/images/logo-text.png" alt="">
                <img class="brand-title" src="{{asset('/')}}/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('includes.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        @include('includes.menu')
        <!--**********************************
            Sidebar start
        ***********************************-->
        
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('body')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p> 
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('/')}}/vendor/global/global.min.js"></script>
    <script src="{{asset('/')}}/js/quixnav-init.js"></script>
    <script src="{{asset('/')}}/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="{{asset('/')}}/vendor/raphael/raphael.min.js"></script>
    <script src="{{asset('/')}}/vendor/morris/morris.min.js"></script>


    <script src="{{asset('/')}}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{asset('/')}}/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{asset('/')}}/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="{{asset('/')}}/vendor/flot/jquery.flot.js"></script>
    <script src="{{asset('/')}}/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('/')}}/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Datatable -->
    <script src="{{asset('/')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}/js/plugins-init/datatables.init.js"></script>

    <!-- Counter Up -->
    <script src="{{asset('/')}}/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{asset('/')}}/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{asset('/')}}/vendor/jquery.counterup/jquery.counterup.min.js"></script>

    <!-- Summernote -->
    <script src="{{asset('/')}}/vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="{{asset('/')}}/js/plugins-init/summernote-init.js"></script>


    <script src="{{asset('/')}}/js/dashboard/dashboard-1.js"></script>

</body>

</html>