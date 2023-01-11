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
                            <a href="{{ route('userDetails',$id) }}" class="btn btn-light">< Back</a>                        
                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">General Msg</h5>
                                </div>

                                <form class="gy-3"  method="POST" action="{{ route('adminGeneralMsgPost',$id) }}">
                                    @csrf

                                    <div class="row g-3 align-center">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input class="form-control" type="text" id="msgText" name="msgText"  placeholder="Text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-primary">Send</button>
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
                                                <th class="pro-text">Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @php
                                            $indexid = 1;
                                        @endphp
                                           
                                        @foreach($generalMsg as $warningMsg )
                                            <tr>
                                                <td>{{ $indexid }}</td>
                                                <td>{{ $warningMsg->msgText }}</td>
                                                <td>{{ $warningMsg->created_at }}</td>
                                               
                                                <td>
                                                    <a href="{{ url('admin/generalMsg/delete')}}/{{$warningMsg->id}}/{{$id}}" class="btn btn-danger">Delete</a>
                                                </td>
                                                <!-- <td>
                                                    <button  class="btn btn-success">Enable</button>
                                                </td> -->
                                            </tr>

                                            @php
                                                $indexid = $indexid + 1;
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