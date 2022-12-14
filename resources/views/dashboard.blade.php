@extends('master')
@section('dashboard')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>




<body class="background">

    <!-- <nav class="header-wrap animated navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand logo" href="index.html"><img src="{{ asset('img/logo1.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.home') }}#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.home') }}#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.home') }}#contact">Contact</a>
                </li>

                @if (Route::has('login'))

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth

                @endif

                @if (Route::has('dashboard'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profilePage') }}">Profile Details</a>
                </li>

                <form method="POST" action="{{ route('logout') }}" style="display: flex; justify-content: center;">
                    @csrf

                    <button type="submit" class="btn btn-danger text-center">Logout</button>
                </form>
                @endif

            </ul>
        </div>
    </nav> -->

    <section class="registration">
        <!-- <div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a>
        </div> -->

        <!--== Page Content Wrapper Start ==-->
        <div class="main-content p-tb-100">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">

                                @include('sidebar')
                                <!--My Account Tab Menu End-->

                                <!--My Account Tab Content Start-->
                                <div class="col-lg-8 mt-5 mt-lg-0">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>

                                                <div class="row">
                                                    <div class="col-md-8 .reg-box mx-auto">


                                                        @if(Auth::guard('web')->user()->status == 1)


                                                        <h4 class="fw-bold text-center">Your account is approved.</h4>


                                                        <div class="backtopage">
                                                            <h4> You can share this Reference Number - {{
                                                                Auth::guard('web')->user()->shareableRefcode }} </h4>
                                                        </div>



                                                        @else

                                                        <div class="title">Registration Done!</div>
                                                        <div class="backtopage">
                                                            <h4> Hello! {{ Auth::guard('web')->user()->name }}</h4>
                                                        </div>
                                                        <h4 class="fw-bold text-center">Soon your request will be
                                                            approved.</h4>
                                                        @endif

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                        



                                    <!-- Single Tab Content Start -->
                                    <!-- <div class="tab-pane fade" id="case_report_list" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Case Report List</h3>

                                       
                                    </div>
                                </div> -->
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <!-- <div class="tab-pane fade" id="profile" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Profile</h3>
                                        
                                    </div>
                                </div> -->
                                    <!-- Single Tab Content End -->
                                </div>
                            </div>
                            <!-- My Account Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Page End -->
                </div>
            </div>
        </div>
        </div>
        <!--== Page Content Wrapper End ==-->


    </section>


</body>

<!-- <script type="text/javascript">
    $(document).ready(function () {
        
        $('#casePhoto').change(function (e) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showcasePhoto').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script> -->


@endsection