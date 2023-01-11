@extends('master')
@section('profile')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<style>
label.textcolor {
    color: black;
}
</style>

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

                                                    <!--Content start  -->

                                                    <h3>Case Report</h3>



                                                    @if(Auth::guard('web')->user()->status == 1)

                                                    <div class="title">Submit Cases</div>
                                                    <!-- forms start -->
                                                    <form method="POST"
                                                        action="{{ route('caseSubmit', Auth::guard('web')->user()->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <!-- case image -->
                                                            <img id="showcasePhoto"
                                                                src="{{ (!empty($caseDetails->casePhoto))? url('upload/case_images/' . $caseDetails->casePhoto):url('upload/no_image.jpg') }}"
                                                                width="100" height="100">

                                                        </div>

                                                        <div class="form-group">

                                                            <label class="textcolor" for="exampleInputEmail1">Case Number</label>

                                                            <input class="form-control" type="text" id="caseId"
                                                                name="caseId">
                                                            @error('caseId')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="textcolor" for="exampleInputEmail1">Case Fine</label>

                                                            <input class="form-control" type="text" id="caseCode"
                                                                name="caseCode">
                                                            @error('caseCode')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="textcolor" for="exampleInputEmail1">Comments(*if any) </label>

                                                            <input class="form-control" type="text" id="fineAmmount"
                                                                name="fineAmmount">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="textcolor" for="exampleInputEmail1">Case Photo</label>

                                                            <input class="form-control" type="file" id="casePhoto"
                                                                name="casePhoto">
                                                            @error('casePhoto')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>



                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                    <!-- forms end -->
                                                </div>

                                                @endif


                                                <!--Content end  -->

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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#casePhoto').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showcasePhoto').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>




    @endsection