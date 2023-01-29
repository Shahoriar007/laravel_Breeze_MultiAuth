@extends('master')
@section('home')

<body>


    <section class="news-ticker">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                        <!-- <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;CNN News</span></div> -->
                        <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
                        <a href="#">Welcome to Nirapod Chalok!</a> 
                        <span class="dot"></span> <a href="#"> </a>
                        <span class="dot"></span> <a href="#"></a>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="header-wrap animated navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand logo" href="index.html"><img src="{{ asset('userFrontend/img/logo1.png')}}" alt=""></a>
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

            </ul>
        </div>
    </nav>

   



    <section class="services py-5" id="services">
        <div class="container text-center">
            <div class="title">Terms and Condition</div>

            <div class="row">
                <h5>Lorem Ipsum :</h5>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                     labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                     laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                     voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                      <h5>Lorem Ipsum :</h5>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                     labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                     laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                     voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                      <h5>Lorem Ipsum :</h5>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                     labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                     laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                     voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                      <h5>Lorem Ipsum :</h5>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                     labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                     laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                     voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                      <h5>Lorem Ipsum :</h5>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                     labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                     laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                     voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            
        </div>
    </section>


  


    



    <!-- footer starts-->
    <div class="bg-dark" id="footer">
        <div class="container">
            <footer class="pt-5">
                <div class="row">
                    <div class="col-6 col-md-6 mb-3">
                        <div class="bottom-logo">
                            <img src="{{ asset('userFrontend/img/logo1.png')}}" class="img-responsive" alt="">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo assumenda explicabo, vero aspernatur consequuntur odio.</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 mb-3">

                        <ul class="nav flex-row mt-3 footer-list">
                            <li class="nav-item mb-2"><a href="{{ route('main.home') }}" class="nav-link p-0">Home</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('main.home') }}#services" class="nav-link p-0">Service</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('main.home') }}#about" class="nav-link p-0">About</a></li>
                            <li class="nav-item mb-2"><a href="{{route('termsCondition')}}" class="nav-link p-0">Terms & Condition</a></li>
                        </ul>
                    </div>

                    

                    <!-- <div class="col-md-4 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div> -->
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top text-white">
                    <p>© 2022 DSWF. All rights reserved.</p>
                    <!-- <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                        <li class="ms-3"><a class="link" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                        <li class="ms-3"><a class="link" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                    </ul> -->
                </div>
            </footer>
        </div>
    </div>

    <!-- footer end -->

@endsection
