@extends('master')

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href=""><img class="img-responsive" src="assets/img/logos/logo.png" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contactUs">Contact</a></li>

                    @if (Route::has('login'))
                    
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">View</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>    
                    @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                    @endauth
                    
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li> -->
                    @endif
                </ul>
            </div>
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



    <!-- Services-->


    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="assets/img/services/bike.png" alt="bike">
                        <h4 class="my-3">Motorcycle</h4>
                    </div>

                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="assets/img/services/car.png" alt="car">
                        <h4 class="my-3">Car</h4>
                    </div>

                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="assets/img/services/truck.png" alt="truck">
                        <h4 class="my-3">Giant Vehicle</h4>
                    </div>

                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
                <div class="col-md-3 col-6">
                    <div class="single-service mb-5">
                        <img class="img-responsive" src="assets/img/services/cng.png" alt="cng">
                        <h4 class="my-3">Auto Rickshaw</h4>
                    </div>

                    <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> -->
                </div>
            </div>
        </div>
    </section>

    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Registration Process</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/services/login.jpg" alt="..." /></div>
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
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/services/reg.jpg" alt="..." /></div>
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
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/services/refcode.jpg" alt="..." /></div>
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
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/services/payment.jpg" alt="..." /></div>
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



    <section class="contactUs" id="contactUs">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-5">Contact us</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">
                    <form action="#">
                        <div class="user__details">
                            <div class="row">
                                <div class="input__box col-md-6">
                                    <span class="details">Full Name</span>
                                    <input type="text" name="fullName" required>
                                </div>
                                <div class="input__box col-md-6">
                                    <span class="details">Email Address</span>
                                    <input type="email" name="email" required>
                                </div>
                                <div class="input__box col-md-12">
                                    <span class="details">Subject</span>
                                    <input type="text" name="subject" required>
                                </div>
                                <div class="input__box col-md-12">
                                    <span class="details">Write Something</span>
                                    <textarea class="w-100" name="" id="" cols="15" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="button text-center">
                            <input type="submit" class="fire mb-2" value="Send Message">
                        </div>

                    </form>
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
                            <img src="assets/img/logos/logo.png" class="img-responsive" alt="">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo assumenda explicabo, vero aspernatur consequuntur odio.</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mb-3">

                        <ul class="nav flex-column mt-3">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Service</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">About</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Terms & Condition</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top text-white">
                    <p>© 2022 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                        <li class="ms-3"><a class="link" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                        <li class="ms-3"><a class="link" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <!-- footer end -->