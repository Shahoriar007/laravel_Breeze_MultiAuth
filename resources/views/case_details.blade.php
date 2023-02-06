@extends('masterAdmin')
@section('adminViewcasesDetais')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Case Details /</h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    @php
                                    $user = \App\Models\User::find($caseDetails->userId);
                                    @endphp
                                    <li>User Name: <span class="text-base">{{ $user->name }}</span></li>
                                    <li>Case Submitted: <span class="text-base">{{ $caseDetails->created_at }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ route('generatePdf',$caseDetails->id) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><span>Download</span><em
                                    class="icon ni ni-arrow-down"></em></a>
                           
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#"><em
                                                class="icon ni ni-user-circle"></em><span>Personal</span></a>
                                    </li>
                                    <!-- <li class="nav-item">
                                                        <a class="nav-link" href="#"><em class="icon ni ni-repeat"></em><span>Transactions</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><em class="icon ni ni-bell"></em><span>Notifications</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><em class="icon ni ni-activity"></em><span>Activities</span></a>
                                                    </li> -->
                                    <li class="nav-item nav-item-trigger d-xxl-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em
                                                class="icon ni ni-user-list-fill"></em></a>
                                    </li>
                                </ul><!-- .nav-tabs -->
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <div class="nk-block-head">
                                            <h5 class="title">Case Information</h5>

                                        </div><!-- .nk-block-head -->
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">



                                                    <span class="profile-ud-label">Case Number</span>


                                                    <span class="profile-ud-value">{{ $caseDetails->caseId }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Case Fine</span>
                                                    <span class="profile-ud-value">{{ $caseDetails->caseCode }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Comments</span>
                                                    <span class="profile-ud-value">{{ $caseDetails->fineAmmount }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Paid With</span>
                                                    <span class="profile-ud-value">{{ $caseDetails->paidWith }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Transaction Id</span>
                                                    <span class="profile-ud-value">{{ $caseDetails->trId }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Invoice </span>
                                                   <a href="{{ route('downloadInvoiceAdmin',$caseDetails->id) }}" class="btn btn-info">Download</a>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <form method="POST" action="{{ route('adminUpdateCaseStatus',$caseDetails->id) }}">
                                                    @csrf

                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Status</span>
                                                        
                                                        <select name="caseStatus" id="caseStatus" class="form-control">
                                                        <option data-display="Select"><?php echo "$caseDetails->caseStatus" ?></option>
                                                            <option value="pending">Pending</option>
                                                            <option value="paid">Paid</option>
                                                            <option value="approved">Approved</option>
                                                            <option value="working">Working</option>
                                                            <option value="done">Done</option>
                                                            <option value="cancel">Cancel</option>

                                                        </select>
                                                        
                                                        <button class="btn btn-info" type="submit">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Case Photo</span>
                                                    <a download="custom-filename.jpg" href="{{ asset("$caseDetails->casePhoto") }}">
                                                        <img src="{{ (!empty($caseDetails->casePhoto))? url($caseDetails->casePhoto):url('upload/no_image.jpg') }}" width="140" height="150">
                                                    </a>
                                                    </span>
                                                </div>
                                            </div>

                                        </div><!-- .profile-ud-list -->
                                    </div><!-- .nk-block -->
                                    <div class="nk-divider divider md"></div>
                                    <div class="nk-block">

                                        <div class="bq-note">
                                            <div class="bq-note-item">

                                                <!-- form start -->
                                                <!--================chat box start================-->
                                                <div class="myaccount-content">
                                                        <div class="panel">
                                                            <!--Heading-->
                                                            <div class="panel-heading">

                                                                <h3 class="panel-title">Chat</h3>
                                                            </div>

                                                            <!--Widget body-->
                                                            <div id="demo-chat-body" class="in">
                                                                <div class="nano has-scrollbar"  style="height:380px">
                                                                    <div class="nano-content pad-all" id="conversation" tabindex="0"
                                                                        style="right: -17px;">
                                                                        <ul class="list-unstyled media-block">

                                                                            @foreach($usersCaseChat as $chatInfo)

                                                                            <li class="mar-btm">

                                                                                @if( $chatInfo->caseMsgSender == "a" )
                                                                            
                                                                                <div class="media-right">
                                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                                            class="img-circle img-sm"
                                                                                            alt="Profile Picture">
                                                                                    </div>
                                                                                    <div
                                                                                        class="media-body pad-hor speech-right">
                                                                                    @else
                                                                                    <div class="media-left">
                                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                                        class="img-circle img-sm"
                                                                                        alt="Profile Picture">
                                                                                </div>
                                                                                <div class="media-body pad-hor">
                                                                                        @endif


                                                                                        <div class="speech">
                                                                                           
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
                                                                        <form class="col-lg-12 mb-3" method="POST" action="{{ route('adminCaseMsgPost',$caseDetails->id) }}">

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
                                                <!-- form end  -->
                                            </div><!-- .bq-note-item -->

                                            <!-- Button trigger modal -->


                                        </div><!-- .bq-note -->
                                    </div><!-- .nk-block -->
                                </div><!-- .card-inner -->
                            </div><!-- .card-content -->
                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl"
                                data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true"
                                data-toggle-body="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg bg-primary">
                                                <span>AB</span>
                                            </div>
                                            <div class="user-info">

                                                <h5>Name: {{ $user->name }}</h5>
                                                <span class="sub-text">Referance Number:
                                                    {{ $user->shareableRefcode }}</span>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->





                                </div><!-- .card-inner -->
                            </div><!-- .card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#conversation').animate({scrollTop:1000000},800);
            })
        </script>

@endsection









<!-- case image -->
<!-- <img src="{{ (!empty($caseDetails->casePhoto))? url($caseDetails->casePhoto):url('upload/no_image.jpg') }}" width="140" height="150"> -->