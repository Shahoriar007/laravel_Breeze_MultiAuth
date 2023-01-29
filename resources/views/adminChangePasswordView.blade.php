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
                                    <h2>Change Password</h2>
                                    <hr>
                                    <form method="POST" action="{{ route('checkchangePassword') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-pass">Current Password <span class="required-f">*</span></label>
                                                <input name="oldPassword" id="oldPassword" type="password" placeholder="minimum 8 character" minlength="8" required>
                                            </div>
                                           
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-pass">New Password <span class="required-f">*</span></label>
                                                <input name="password" id="password" type="password" placeholder="minimum 8 character" minlength="8" required>
                                            </div>

                                        </div>
                                        <button class="btn btn-primary" type="submit">Change Password</button>
                                    </form>
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