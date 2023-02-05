@extends('masterAdmin')
@section('adminUserView')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row">
                                    <h2>Tranning Branch</h2>
                                    <hr>
                                    <form method="POST" action="{{ route('addTranningBranch') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-pass">Name <span class="required-f">*</span></label>
                                                <input name="name" id="name" type="text" required>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-pass">Address <span class="required-f">*</span></label>
                                                <input name="address" id="address" type="text" required>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-pass">Phone <span class="required-f">*</span></label>
                                                <input name="phone" id="phone" type="text" required>
                                            </div>
                                           
                                

                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">

                                <h1>List</h1>

                                <div class="card-head">
                                    <h5 class="card-title">Tranning Branch List</h5>
                                </div>
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="pro-id">Id</th>
                                                <th class="pro-text">Name</th>
                                                <th class="pro-text">Address</th>
                                                <th class="pro-text">Phone</th>
                                                <th class="pro-text">Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @if(!empty($teanningBranch))
                                           
                                        @foreach($teanningBranch as $data )
                                       
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->address }}</td>
                                                <td>{{ $data->phone }}</td>
                                               
                                                <td>
                                                    <a href="{{ route('deleteTranningBranch', $data->id) }}" class="btn btn-danger">Delete</a>
                                                </td>
                                                
                                            </tr>

                                         @endforeach

                                        @endif
                                            

                                </div>
                            
                            </div>
                        </div>
                    </div><!-- card -->
                </div><!-- .nk-block -->
            </div><!-- .components-preview -->
        </div>
    </div>
</div>


@endsection