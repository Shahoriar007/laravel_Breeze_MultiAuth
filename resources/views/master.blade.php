<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirapod Chalok Chai</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('userFrontend/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('userFrontend/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('userFrontend/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="img/favicon/site.webmanifest">


    <link rel="stylesheet" href="{{ asset('userFrontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('userFrontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('userFrontend/css/style.css')}}">
</head>



@yield('home')
@yield('login')
@yield('register')
@yield('registerTrn')

@yield('registeredit')
@yield('dashboard')
@yield('profile')



    <script src="{{ asset('userFrontend/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{ asset('userFrontend/js/popper.min.js')}}"></script>
    <script src="{{ asset('userFrontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('userFrontend/js/jquery.nice-select.js')}}"></script>
    <script src="https://kit.fontawesome.com/30c7cd8c6d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('userFrontend/js/main.js')}}"></script>

    <script>
        (document).ready(function() {
            $('select').niceSelect();
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



</body>

</html>