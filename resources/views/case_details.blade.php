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
                                            <h3 class="nk-block-title page-title">Case Details / <strong class="text-primary small">{{ $caseDetails->userId }}</strong></h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li>User ID: <span class="text-base">{{ $caseDetails->userId }}</span></li>
                                                    <li>Case Submitted: <span class="text-base">{{ $caseDetails->created_at }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-content">
                                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#"><em class="icon ni ni-user-circle"></em><span>Personal</span></a>
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
                                                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                                                    </li>
                                                </ul><!-- .nav-tabs -->
                                                <div class="card-inner">
                                                    <div class="nk-block">
                                                        <div class="nk-block-head">
                                                            <h5 class="title">Case Information</h5>
                                                            <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="profile-ud-list">
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">



                                                                    <span class="profile-ud-label">Case ID</span>
                                                                    

                                                                    <span class="profile-ud-value">{{ $caseDetails->caseId }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Caase Code</span>
                                                                    <span class="profile-ud-value">{{ $caseDetails->caseCode }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Case Fine</span>
                                                                    <span class="profile-ud-value">{{ $caseDetails->fineAmmount }}</span>
                                                                </div>
                                                            </div>
                                        
                                                        </div><!-- .profile-ud-list -->
                                                    </div><!-- .nk-block -->
                                                    <div class="nk-divider divider md"></div>
                                                    <div class="nk-block">
                                                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                            <h5 class="title">Admin Note</h5>
                                                            <a href="#" class="link link-sm">+ Add Note</a>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="bq-note">
                                                            <div class="bq-note-item">
                                                                <div class="bq-note-text">
                                                                    <p>Aproin at metus et dolor tincidunt feugiat eu id quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sollicitudin non nunc vel pharetra. </p>
                                                                </div>
                                                                <div class="bq-note-meta">
                                                                    <span class="bq-note-added">Added on <span class="date">November 18, 2019</span> at <span class="time">5:34 PM</span></span>
                                                                    <span class="bq-note-sep sep">|</span>
                                                                    <span class="bq-note-by">By <span>Softnio</span></span>
                                                                    <a href="#" class="link link-sm link-danger">Delete Note</a>
                                                                </div>
                                                            </div><!-- .bq-note-item -->
                                                          
                                                        </div><!-- .bq-note -->
                                                    </div><!-- .nk-block -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-content -->
                                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                                                <div class="card-inner-group" data-simplebar>
                                                    <div class="card-inner">
                                                        <div class="user-card user-card-s2">
                                                            <div class="user-avatar lg bg-primary">
                                                                <span>AB</span>
                                                            </div>
                                                            <div class="user-info">
                                                                
                                                                <h5>Abu Bin Ishtiyak</h5>
                                                                <span class="sub-text">info@softnio.com</span>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    
                                                    <div class="card-inner">
                                                        <div class="overline-title-alt mb-2">In Account</div>
                                                        <div class="profile-balance">
                                                            <div class="profile-balance-group gx-4">
                                                                <div class="profile-balance-sub">
                                                                    <div class="profile-balance-amount">
                                                                        <div class="number">2,500.00 <small class="currency currency-usd">USD</small></div>
                                                                    </div>
                                                                    <div class="profile-balance-subtitle">Invested Amount</div>
                                                                </div>
                                                                <div class="profile-balance-sub">
                                                                    <span class="profile-balance-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                                    <div class="profile-balance-amount">
                                                                        <div class="number">1,643.76</div>
                                                                    </div>
                                                                    <div class="profile-balance-subtitle">Profit Earned</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    <div class="card-inner">
                                                        <div class="row text-center">
                                                            <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">23</span>
                                                                    <span class="sub-text">Total Order</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">20</span>
                                                                    <span class="sub-text">Complete</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">3</span>
                                                                    <span class="sub-text">Progress</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    <div class="card-inner">
                                                        <h6 class="overline-title-alt mb-2">Additional</h6>
                                                        <div class="row g-3">
                                                            <div class="col-6">
                                                                <span class="sub-text">User ID:</span>
                                                                <span>UD003054</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <span class="sub-text">Last Login:</span>
                                                                <span>15 Feb, 2019 01:02 PM</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <span class="sub-text">KYC Status:</span>
                                                                <span class="lead-text text-success">Approved</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <span class="sub-text">Register At:</span>
                                                                <span>Nov 24, 2019</span>
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


@endsection



<!-- case image -->
<!-- <img src="{{ (!empty($caseDetails->casePhoto))? url($caseDetails->casePhoto):url('upload/no_image.jpg') }}" width="140" height="150"> -->



