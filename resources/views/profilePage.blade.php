@extends('master')
@section('profile')


<body class="background">

    <nav class="header-wrap animated navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand logo" href="index.html"><img src="{{ asset('img/logo1.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

            @if (Route::has('login'))
                
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">View</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth

            @endif

            @if (Route::has('dashboard'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profilePage') }}">Profile</a>
                </li>

                <form method="POST" action="{{ route('logout') }}"   style="display: flex; justify-content: center;">
                            @csrf      
                            
                            <button type="submit" class="btn btn-danger text-center">Logout</button>
                    </form>
            @endif

            </ul>
        </div>
    </nav>

<section class="registration">
        <div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a></div>
        
        <div class="title">Registration Done!</div>

        <div class="backtopage"> 
            @if(Auth::user()->photo)
            <img src="{{ asset(Auth::user()->photo) }}" width="193" height="130" alt="">
            @endif

            

            <h4> Name: {{ Auth::guard('web')->user()->name }}</h4>
            <h4> Phone: {{ Auth::guard('web')->user()->phone }}</h4>
            <h4> Email: {{ Auth::guard('web')->user()->email }}</h4>
            <h4> Gender: {{ Auth::guard('web')->user()->gender }}</h4>
            <h4> Birthdate: {{ Auth::guard('web')->user()->birthDate }}</h4>
            <h4> BloodGroup: {{ Auth::guard('web')->user()->name }}</h4>

           
            
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">
                    

                    @if(Auth::guard('web')->user()->status == 1)
                    <h4 class="fw-bold text-center">Your account is approved.</h4>
                    <div class="backtopage"> <h4> You can share this Ref Code - {{ Auth::guard('web')->user()->shareableRefcode }}  </h4></div>
                    @else
                    <h4 class="fw-bold text-center">Soon your request will be approved.</h4>
                    @endif

                    
                    

                    <a class="btn btn-primary text-center" href="{{ route('userProfileEdit', Auth::guard('web')->user()->id) }}">Edit</a>
                     
                </div>
            </div>
        </div>
    </section>

        
    </body>

    @endsection
