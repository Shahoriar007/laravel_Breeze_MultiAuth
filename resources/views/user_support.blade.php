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

                                                                            @foreach($usersChat as $chatInfo)

                                                                            <li class="mar-btm">

                                                                                @if( $chatInfo->sender == "a" )
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
                                                                                            
                                                                                            <p>{{ $chatInfo->msgText }}
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
                                                                        <form class="col-lg-12 mb-3" method="POST" action="{{ route('userSupportMsgPost', Auth::guard('web')->user()->id) }}">

                                                                        @csrf
                                                                        
                                                                        <div class="col-lg-12 mb-3">
                                                                        <textarea oninput="auto_grow(this)" name="msgText"
                                                                                id="msgText" rows="1" class="form-control"
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