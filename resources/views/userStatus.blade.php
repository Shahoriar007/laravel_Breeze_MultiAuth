@extends('master')
@section('dashboard')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>




<body class="background">

   

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
                                                <h3>Present Status</h3>

                                                <div class="row">
                                                    <div class="col-md-8 .reg-box mx-auto">


                                                        @if(Auth::guard('web')->user()->status == 1)


                                                        <h4 class="fw-bold text-center">Your account is <span>Activated</span>.</h4>


                                                        @elseif(Auth::guard('web')->user()->status == 0)

                                                        <h4 class="fw-bold text-center">Your account is <span>Deactivated</span>.</h4>

                                                        @else

                                                        <h4 class="fw-bold text-center">Your account is <span>Blocked</span>.</h4>

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