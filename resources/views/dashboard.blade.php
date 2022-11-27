@extends('master')


<body class="background">
<section class="registration">
        <div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a></div>
        
        <div class="title">Registration Done!</div>

        <div class="backtopage"> <h4> Hello! {{ Auth::guard('web')->user()->name }}</h4></div>
        <div class="backtopage"> <h4> You can share this Ref Code - {{ Auth::guard('web')->user()->shareableRefcode }}  </h4></div>


        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">
                    

                    @if(Auth::guard('web')->user()->status == 1)
                    <h4 class="fw-bold text-center">Your account is approved. More function will come soon!</h4>
                    @else
                    <h4 class="fw-bold text-center">Soon your request will be approved.</h4>
                    @endif

                    <form method="POST" action="{{ route('logout') }}"   style="display: flex; justify-content: center;">
                            @csrf      
                            
                            <button type="submit" class="btn btn-danger text-center">Logout</button>
                    </form>
                    
                     
                </div>
            </div>
        </div>
    </section>
