@extends('master')
@section('login')

<body class="background">
    <section class="registration">
    <div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a></div>
        <div class="title">Sign Here</div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 .reg-box mx-auto">

                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="user__details">
                            <div class="row">

                                <div class="input__box col-md-12">
                                    <span class="details">Phone Number</span>
                                    <input id="login" type="text" name="login" placeholder="01353456789" >
                                    @error('login')
                                    <span class="text-danger">{{ $message }}(Please input phone number) </span>
                                    @enderror
                                </div>

                                <div class="input__box col-md-12">
                                    <span class="details">Password</span>
                                    <input id="password" type="password" name="password" placeholder="********" >
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="button text-center">
                            <input type="submit" class="fire mb-2">
                            <div>Doesn't have account? <a href="{{ route('register') }}" style="color: #fbc72a;">Registration</a>
                            </div>

                            <div>Forget password? <a href="{{ route('userPasswordRecover') }}" style="color: #fbc72a;">Recover</a>
                            </div>
                        </div>

                  
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
            
@endsection

