@extends('master')
@section('login')

<body class="background">
    <section class="registration">
    <div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a></div>
        <div class="title">Recover Password</div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 .reg-box mx-auto">

                <form  action="">
                        @csrf

                        <div class="user__details">
                            <div class="row">

                            
                                <div class="input__box col-md-12">
                                <span class="details text-center">An OTP will be sent to your registered phone number.</span>
                                    <span class="details">OTP</span>
                                    <input id="login" type="text" name="login" placeholder="" >
                                    
                                </div>

                                <div class="input__box col-md-12">
                                    <span class="details">New Password</span>
                                    <input id="password" type="password" name="password" placeholder="********" >
                                    
                                </div>

                            </div>
                        </div>
                            
                            <button type="submit" class="btn btn-success">Save</button>
                            


                  
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
            
@endsection

