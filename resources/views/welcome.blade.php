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

            </ul>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="masthead-subheading">Welcome To Nirapod Chalok</div>
                    <div class="masthead-heading text-uppercase">Join us today for a safe ride</div>
                </div>
            </div>
        </div>
    </header>



    <section class="services py-5" id="services">
        <div class="container text-center">
            <div class="title">Services</div>
            <div class="row ">
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="{{ asset('userFrontend/img/services/bike.png')}}" alt="bike">
                        <h4 class="my-3">Motorcycle</h4>
                    </div>
                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="{{ asset('userFrontend/img/services/car.png')}}" alt="car">
                        <h4 class="my-3">Car</h4>
                    </div>

                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="{{ asset('userFrontend/img/services/truck.png')}}" alt="truck">
                        <h4 class="my-3">Giant Vehicle</h4>
                    </div>

                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="{{ asset('userFrontend/img/services/cng.png')}}" alt="cng">
                        <h4 class="my-3">Auto Rickshaw</h4>
                    </div>

                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
            </div>
        </div>
    </section>


    <section class="reg-process py-5" id="about">
        <div class="container text-center">
            <div class="title">REGISTRATION PROCESS</div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('userFrontend/img/services/login.jpg')}}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>login</h4>
                            <div class="timeline-body">
                                <p class="text-muted">Simply type nirapodchalok.com on any browser from any device to access our super user friendly website. </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('userFrontend/img/services/reg.jpg')}}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Registration</h4>

                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Click Register and fill up the forms with your personal and vehicle information correctly </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('userFrontend/img/services/refcode.jpg')}}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Referral code</h4>

                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Provide the unique Referral code of a member of Nirapodchalok and win bonus </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('userFrontend/img/services/payment.jpg')}}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Pay Your registration Fee</h4>

                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Pay your registration fee using the Bkash merchant number 01712322027 </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be a Part
                            <br /> Of
                            <br /> Us!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>


    <section class="contactUs py-5" id="contact">
        <div class="container text-center">
            <div class="title">Contact us</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-info text-center">
                        <p class="m-0">1 Indira Road, Trikonomity Market, 2nd floor, Farmgate, Shere Bangla Nagar, Dhaka-1215.</p>
                        <p class="m-0">01712-322 027</p>
                        <p class="m-0"><span class="text-danger">Hotline:</span>01557-855 233</p>
                        <p class="m-0">nirapodchalok@gmail.com</p>
                    </div>
                </div>
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
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Home</a></li>
                            <li class="nav-item mb-2"><a href="#services" class="nav-link p-0">Service</a></li>
                            <li class="nav-item mb-2"><a href="#about" class="nav-link p-0">About</a></li>
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
