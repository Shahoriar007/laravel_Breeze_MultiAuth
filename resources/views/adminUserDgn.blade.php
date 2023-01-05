@extends('masterAdmin')
@section('adminDashboard')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">


                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <a href="{{route('admin.dashboard')}}" class="btn btn-light">< Back</a>                        
                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">User Designation</h5>
                                </div>

                                <form class="gy-3"  method="POST" action="{{ route('adminAddUserDgnForm') }}">
                                    @csrf

                                    <div class="row g-3 align-center">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input class="form-control" type="text" id="userDgn" name="userDgn"  placeholder="Text" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div><!-- card -->
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">All Msg</h5>
                                </div>
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="pro-id">Index</th>
                                                <th class="pro-text">Massage</th>
                                                <th class="pro-text">Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @php
                                            $index = 1;
                                        @endphp
                                           
                                        @foreach($UserDesignation as $userDgnData )
                                       
                                            <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $userDgnData->userDgn }}</td>
                                               
                                                <td>
                                                    <a href="{{ route('adminDeleteUserDgn',$userDgnData->id) }}" class="btn btn-danger">Delete</a>
                                                </td>
                                                <!-- <td>
                                                    <button  class="btn btn-success">Enable</button>
                                                </td> -->
                                            </tr>

                                            @php
                                                $index = $index + 1;
                                            @endphp
                                        @endforeach
                                            

                                </div>
                            </div>

                        </div>

                    </div><!-- .nk-block -->

                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

@endsection