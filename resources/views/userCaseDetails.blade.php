@extends('master')
@section('profile')


<body class="background">

    <div class="container">
        <div class="main-body">



            <br><br>

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


                                                    <div class="row gutters-sm">
                                                        <div class="col-md-4 mb-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex flex-column align-items-center text-center">


                                                                        @if($usersAllCasesDetails->casePhoto)
                                                                            <a href="{{ asset($usersAllCasesDetails->casePhoto) }}"><img src="{{ asset($usersAllCasesDetails->casePhoto) }}"
                                                                             width="150" alt=""></a>
                                                                        @else
                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                                            alt="Admin" class="rounded-circle"
                                                                            width="150">
                                                                        @endif

                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-8">
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0">Case Number</h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            {{ $usersAllCasesDetails->caseId }}
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0">Case Fine</h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            {{  $usersAllCasesDetails->caseCode }}
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0">Comments</h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            {{ $usersAllCasesDetails->fineAmmount }}
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0">Status</h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            <h4> 
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                    


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>




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





            @endsection