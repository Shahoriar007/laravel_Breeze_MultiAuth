@extends('master')
@section('dashboard')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


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
        
        


        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">
                    

                    @if(Auth::guard('web')->user()->status == 1)

                        <h4 class="fw-bold text-center">Your account is approved.</h4>
                        <div class="backtopage"> <h4> You can share this Ref Code - {{ Auth::guard('web')->user()->shareableRefcode }}  </h4></div>

                        <div class="title">Submit Cases</div>
                        <!-- forms start -->
                        <form method="POST" action="{{ route('caseSubmit', Auth::guard('web')->user()->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Case ID</label>

                                <input class="form-control" type="text" id="caseId" name="caseId" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Case Code</label>

                                <input class="form-control" type="text" id="caseCode" name="caseCode" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Fine Ammount</label>

                                <input class="form-control" type="text" id="fineAmmount" name="fineAmmount" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Case Photo</label>

                                <input class="form-control" type="file" id="casePhoto" name="casePhoto" >
                            </div>

                            <div class="form-group">
                                <!-- case image -->
                                <img  id="showcasePhoto" src="{{ (!empty($caseDetails->casePhoto))? url('upload/case_images/' . $caseDetails->casePhoto):url('upload/no_image.jpg') }}" width="100" height="100">

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- forms end -->

                    @else

                        <div class="title">Registration Done!</div>
                        <div class="backtopage"> <h4> Hello! {{ Auth::guard('web')->user()->name }}</h4></div>
                        <h4 class="fw-bold text-center">Soon your request will be approved.</h4>
                    @endif
                     
                </div>
                
            </div>

            
        </div>
    </section>

        
    </body>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#casePhoto').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showcasePhoto').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
        break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
        break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
        break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
</script>

    @endsection
