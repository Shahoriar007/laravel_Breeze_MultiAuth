@extends('masterAdmin')
@section('adminUserDetaisView')


  <!-- content @s -->
  <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            
                        <a href="{{ route('showUsers') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                                        
                        
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-inner card-inner-lg">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">

                                                            <h4 class="nk-block-title">Personal Information</h4>
                                                            <div class="nk-block-des">
                                                                <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block">
                                                    <div class="nk-data data-list">
                                                        <div class="data-head">
                                                            <h6 class="overline-title">Basics</h6>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col">
                                                                <span class="data-label">Full Name</span>
                                                                <span class="data-value">{{ $userDetails->name }}</span>
                            
                                                                <span class="data-value text-success">-----({{ $userDetails->designation }})</span> 
                                                            </div>
                                                             
                                                        </div><!-- data-item -->
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col">
                                                                <span class="data-label">Email</span>
                                                                <span class="data-value">{{ $userDetails->email }}</span>
                                                            </div>
                                                             
                                                        </div><!-- data-item -->
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Phone Number</span>
                                                                <span class="data-value text-soft">{{ $userDetails->phone }}</span>
                                                            </div>
                                                            <!-- <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div> -->
                                                        </div><!-- data-item -->
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col">
                                                                <span class="data-label">Gender</span>
                                                                <span class="data-value ">{{ $userDetails->gender }}</span>
                                                            </div>
                                                             
                                                        </div><!-- data-item -->
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col">
                                                                <span class="data-label">Date of Birth</span>
                                                                <span class="data-value">{{ $userDetails->birthDate }}</span>
                                                            </div>
                                                             
                                                        </div><!-- data-item -->
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col">
                                                                <span class="data-label">Blood Group</span>
                                                                <span class="data-value">{{ $userDetails->bloodGroup }}</span>
                                                            </div>
                                                             
                                                        </div><!-- data-item -->
                                                        
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit" data-tab-target="#address">
                                                            <div class="data-col">
                                                                <span class="data-label">Address(City)</span>
                                                                <span class="data-value">{{ $userDetails->city }}</span>
                                                            </div>
                                                             
                                                        </div><!-- data-item -->
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col">
                                                                <span class="data-label">Nid No</span>
                                                                <span class="data-value">{{ $userDetails->nid }}</span>
                                                            </div>
                                                             
                                                        </div><!-- data-item -->
                                                    </div><!-- data-list -->
                                                    <div class="nk-data data-list">
                                                        <div class="data-head">
                                                            <h6 class="overline-title">Vehical Information</h6>
                                                        </div>
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Vehicle</span>
                                                                <span class="data-value"> {{ $userDetails->vehicle }}</span>
                                                            </div>
                                                           
                                                        </div><!-- data-item -->
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Driving license:</span>
                                                                <span class="data-value">{{ $userDetails->drivingLicense }}</span>
                                                            </div>
                                                            
                                                        </div><!-- data-item -->
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">City Name</span>
                                                                <span class="data-value">{{ $userDetails->cityName }}</span>
                                                            </div>
  
                                                        </div><!-- data-item -->
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Category</span>
                                                                <span class="data-value">{{ $userDetails->category }}</span>
                                                            </div>
  
                                                        </div><!-- data-item -->

                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Number</span>
                                                                <span class="data-value">{{ $userDetails->number }}</span>
                                                            </div>
  
                                                        </div><!-- data-item -->
                                                    </div><!-- data-list -->

                                                    <div class="data-head">
                                                            <h6 class="overline-title">Others</h6>
                                                        </div>
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Submitted Referance Code</span>
                                                                <span class="data-value"> {{ $userDetails->refCode }}</span>
                                                            </div>
                                                           
                                                        </div><!-- data-item -->
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Shareable Referance Code</span>
                                                                <span class="data-value"> {{ $userDetails->shareableRefcode }}</span>
                                                            </div>
                                                           
                                                        </div><!-- data-item -->
                                                        <div class="data-item">
                                                            <div class="data-col">
                                                                <span class="data-label">Transaction Id</span>
                                                                <span class="data-value"> {{ $userDetails->transactionId }}</span>
                                                            </div>
                                                           
                                                        </div><!-- data-item -->
                                                    
                                                </div><!-- .nk-block -->
                                            </div>
                                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                                <div class="card-inner-group" data-simplebar>
                                                    <div class="card-inner">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary">
                                                                <span>{{ $userDetails->id }}</span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="lead-text">{{ $userDetails->name }}</span>
                                                                <span class="sub-text">{{ $userDetails->phone }}</span>
                                                            </div>
                                                            <div class="user-action">
                                                                <div class="dropdown">
                                                                    <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <!-- <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li> -->
                                                                            <li><a href="{{ route('userProfileEditviewbyadmin', $userDetails->id ) }}"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .user-card -->
                                                    </div><!-- .card-inner -->
                                                    <div class="card-inner">
                                                        <div class="user-account-info py-0">
                                                            <!-- <h6 class="overline-title-alt">Nio Wallet Account</h6>
                                                            <div class="user-balance">12.395769 <small class="currency currency-btc">BTC</small></div>
                                                            <div class="user-balance-sub">Locked <span>0.344939 <span class="currency currency-btc">BTC</span></span></div> -->
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    <div class="card-inner p-0">
                                                        <ul class="link-list-menu">
                                                            <li><a class="active" href=""><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                            <li><a href="{{ route('adminGeneralMsg',$userDetails->id) }}"><em class="icon ni ni-bell-fill"></em><span>Send General Massage</span></a></li>
                                                            <!-- <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                                                            <li><a href="html/user-profile-setting.html"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                                            <li><a href="html/user-profile-social.html"><em class="icon ni ni-grid-add-fill-c"></em><span>Connected with Social</span></a></li> -->
                                                        </ul>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .card-inner-group -->
                                            </div><!-- card-aside -->
                                        </div><!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
           

@endsection

<!-- User image -->
<!-- <img src="{{ (!empty($userDetails->photo))? url($userDetails->photo):url('upload/no_image.jpg') }}" width="140" height="150"> -->

