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
                                                                        <a
                                                                            href="{{ asset($usersAllCasesDetails->casePhoto) }}"><img
                                                                                src="{{ asset($usersAllCasesDetails->casePhoto) }}"
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
                                                                        {{ $usersAllCasesDetails->caseStatus }}
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0">Invoice</h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                        <a href="{{ route('downloadInvoiceUser',$usersAllCasesDetails->id) }}" class="btn btn-info">Download</a>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="myaccount-content">
                                                    <!--================chat box start================-->
                                                    <div class="myaccount-content">
                                                        <div class="panel">
                                                            <!--Heading-->
                                                            <div class="panel-heading">

                                                                <h3 class="panel-title">Chat</h3>
                                                            </div>

                                                            <!--Widget body-->
                                                            <div id="demo-chat-body" class="in">
                                                                <div class="nano has-scrollbar" style="height:380px">
                                                                    <div class="nano-content pad-all" id="conversation" tabindex="0"
                                                                        style="right: -17px;">
                                                                        <ul class="list-unstyled media-block">

                                                                            @foreach($usersCaseChat as $chatInfo)

                                                                            <li class="mar-btm" >

                                                                                @if( $chatInfo->caseMsgSender == "a" )
                                                                                <div class="media-left">
                                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                                        class="img-circle img-sm"
                                                                                        alt="Profile Picture">
                                                                                </div>
                                                                                <div class="media-body pad-hor">
                                                                                    @else
                                                                                    <div class="media-right">
                                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                                            class="img-circle img-sm"
                                                                                            alt="Profile Picture">
                                                                                    </div>
                                                                                    <div
                                                                                        class="media-body pad-hor speech-right">
                                                                                        @endif


                                                                                        <div class="speech">
                                                                                            <a
                                                                                                class="media-heading">{{ Auth::guard('web')->user()->name }}</a>
                                                                                            <p>{{ $chatInfo->caseMsgText }}
                                                                                            </p>
                                                                                            <p class="speech-time">
                                                                                                <i
                                                                                                    class="fa fa-clock-o fa-fw"></i>
                                                                                                {{ $chatInfo->created_at }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                            </li>


                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    <div class="nano-pane">
                                                                        <div class="nano-slider"
                                                                            style="height: 141px; transform: translate(0px, 0px);">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--Widget footer-->
                                                                <div class="panel-footer">
                                                                    <div class="row">
                                                                        <form class="col-lg-12 mb-3" method="POST" action="{{ route('userCaseMsgPost', $usersAllCasesDetails->id) }}">

                                                                        @csrf
                                                                        
                                                                        <div class="col-lg-12 mb-3">
                                                                        <textarea oninput="auto_grow(this)" name="caseMsgText"
                                                                                id="caseMsgText" rows="1" class="form-control"
                                                                                placeholder="message"></textarea>
                                                                        </div>

                                                                        <div class="col-lg-4 mx-auto mb-3">
                                                                            <button class="btn btn-primary btn-block"
                                                                                type="submit">Send</button>
                                                                        </div>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--================chat box start================-->
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



            <script>
            function auto_grow(element) {
                element.style.height = "5px";
                element.style.height = (element.scrollHeight) + "px";
            }
            </script>

            <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#conversation').animate({scrollTop:1000000},800);
                })
            </script>



            @endsection