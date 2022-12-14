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
                    <a class="nav-link" href="{{ route('main.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.home') }}#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.home') }}#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.home') }}#contact">Contact</a>
                </li>

            @if (Route::has('login'))
                
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Case Report</a>
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
                    <a class="nav-link" href="{{ route('profilePage') }}">Profile Details</a>
                </li>

                <form method="POST" action="{{ route('logout') }}"   style="display: flex; justify-content: center;">
                            @csrf      
                            
                            <button type="submit" class="btn btn-danger text-center">Logout</button>
                    </form>
            @endif

            </ul>
        </div>
    </nav>



    <div class="container">
    <div class="main-body">
    
    <br><br>
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    

                    @if(Auth::user()->photo)
                    <img src="{{ asset(Auth::user()->photo) }}" class="rounded-circle" width="150" alt="">
                    @else
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    @endif

                    <div class="mt-3">
                      <h4>{{ Auth::guard('web')->user()->name }}</h4>
                      
                      <a class="btn btn-primary text-center" href="{{ route('userProfileEdit', Auth::guard('web')->user()->id) }}">Edit</a>
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->phone }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <h4> {{ Auth::guard('web')->user()->gender }}</h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->birthDate }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Blood Group</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->bloodGroup }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->city }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nid No</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->nid }}
                    </div>
                  </div>
                  <hr>
                  
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Submitted Referance Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->refCode }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Shareable Reference Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->shareableRefcode }}
                    </div>
                  </div>
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Transaction Id</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->transactionId }}
                    </div>
                  </div> -->
                 
                  <hr>
                  
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Vehicle</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->vehicle }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Driving license</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->drivingLicense }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->cityName }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Category</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <h4> {{ Auth::guard('web')->user()->category }}</h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->number }}
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>


          </div>

        </div>
    </div>



@endsection


            
