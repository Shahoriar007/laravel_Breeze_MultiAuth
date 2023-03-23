@extends('masterAdmin')
@section('adminDashboard')

<!-- content @s -->
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Site Statistics</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full yellow">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;">All Users</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount" style="color:#000"> {{$allUsers}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full green">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Completed Case</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$completedCase}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full red">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Pending Case</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$pendingCase}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full yellow">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Cancelled Case</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$cancelCase}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->
                                        
                                    </div>

                                    
                                </div>

                                <div class="nk-block">
                                    <div class="row g-gs">

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full green">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total Employee List</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$employeeCase}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full red">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total General Member</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$generalUser}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full yellow">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total CNG Member</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$totalCNG}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full green">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total Car Member</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$totalCar}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->
                                        
                                    </div>

                                    
                                </div>


                                <div class="nk-block">
                                    <div class="row g-gs">

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full red">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total Bike Members</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$totalBike}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full yellow">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total Truck Member</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$totalTruck}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full green">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total Bus Member</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$totalBus}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->

                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full red">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle" style="color: #000000; font-size: 16px; font-weight: 700;" style="color: #000000; font-size: 16px; font-weight: 700;">Total Request</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="All Users"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> {{$totalReq}} </span>
                                                       
                                                        <span class="change up text-danger"></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->

                                        </div><!-- .col -->
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->


    

            

@endsection
