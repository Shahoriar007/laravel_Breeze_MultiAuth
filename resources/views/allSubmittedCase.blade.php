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

                                    <div class="col-lg-8">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Case Number</th>
                                                <th scope="col">Case Fine</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date & Time</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($usersAllCases as $caseList)
                                            <tr>
                                                <td>{{ $caseList->id }}</td>
                                                <td>{{ $caseList->caseId }}</td>
                                                <td>{{ $caseList->caseCode }}</td>
                                                <td>{{ $caseList->caseStatus }}</td>
                                                <td>{{ $caseList->created_at }}</td>

                                                <td>
                                                    <a href="{{ route('allCasesDetails',$caseList->id) }}">
                                                        <button type="button" class="btn btn-primary">Details</button>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
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