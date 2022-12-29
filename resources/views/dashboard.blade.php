@extends('master')
@section('dashboard')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>




<body class="background">

    <nav class="header-wrap animated navbar navbar-expand-md navbar-dark bg-dark">
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
    </nav>

    <section class="registration">
        <div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a>
        </div>



        <!--== Page Content Wrapper Start ==-->
        <div class="main-content p-tb-100">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-4">

                                <h5 style="font-size: 14px; font-weight: bold; text-align: center;">পরিবরতন/যুক্ত করতে অপশনটিতে ক্লিক করুন</h5>

                                <div class="user-leftbar-details">
                                    <div>
                                        <img src="{{ asset('userFrontend/img/user-pik.jpg')}}" class="img-responsive" alt="user">
                                    </div>
                                    <div class="ml-2">
                                        <h5>Adv. Sharifuzzaman</h5>
                                        <p>Reference Number: <span>01910512921</span></p>
                                        <p>Position: <span>User or Admin</span></p>
                                    </div>
                                </div>

                                    <div class="myaccount-tab-menu nav" role="tablist">

                                        <a href="#dashboad" class="active" data-toggle="tab">
                                            Dashboard</a>

                                        <a href="#case_report" data-toggle="tab">Case Report</a>

                                        <!-- <a href="#case_report_list" data-toggle="tab">Case Report List</a> -->

                                        <a href="{{ route('profilePage') }}">Profile</a>


                                    </div>
                                </div>
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
                                        <div class="tab-pane fade" id="case_report" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Case Report</h3>



                                                @if(Auth::guard('web')->user()->status == 1)

                                                <div class="title">Submit Cases</div>
                                                <!-- forms start -->
                                                <form method="POST"
                                                    action="{{ route('caseSubmit', Auth::guard('web')->user()->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <!-- case image -->
                                                        <img id="showcasePhoto"
                                                            src="{{ (!empty($caseDetails->casePhoto))? url('upload/case_images/' . $caseDetails->casePhoto):url('upload/no_image.jpg') }}"
                                                            width="100" height="100">

                                                    </div>

                                                    <div class="form-group">

                                                        <label for="exampleInputEmail1">Case Number</label>

                                                        <input class="form-control" type="text" id="caseId"
                                                            name="caseId">
                                                        @error('caseId')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Case Fine</label>

                                                        <input class="form-control" type="text" id="caseCode"
                                                            name="caseCode">
                                                        @error('caseCode')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Comments(*if any) </label>

                                                        <input class="form-control" type="text" id="fineAmmount"
                                                            name="fineAmmount">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Case Photo</label>

                                                        <input class="form-control" type="file" id="casePhoto"
                                                            name="casePhoto">
                                                        @error('casePhoto')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>



                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                                <!-- forms end -->
                                            </div>

                                            @endif

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