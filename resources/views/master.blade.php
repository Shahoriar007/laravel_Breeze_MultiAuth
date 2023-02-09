<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirapod Chalok</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('userFrontend/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('userFrontend/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('userFrontend/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="img/favicon/site.webmanifest">


    <link rel="stylesheet" href="{{ asset('userFrontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('userFrontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('userFrontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('userFrontend/css/asd.css')}}">

    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="{{ asset('userFrontend/assets/css/asd.css')}}">
    
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>



@yield('home')
@yield('login')
@yield('register')
@yield('registerTrn')

@yield('registeredit')
@yield('dashboard')
@yield('profile')




<!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "591382494615499");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
<!-- Messenger Chat plugin Code -->

    <script src="{{ asset('userFrontend/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{ asset('userFrontend/js/popper.min.js')}}"></script>
    <script src="{{ asset('userFrontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('userFrontend/js/jquery.nice-select.js')}}"></script>
    <script src="https://kit.fontawesome.com/30c7cd8c6d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('userFrontend/js/main.js')}}"></script>

    <!---=====jquery====-->
    <script src="{{ asset('userFrontend/assets/js/jquery-3.6.0.min.js')}}"></script>
    <!--=====popper js=====-->
  
    <script src="{{ asset('userFrontend/assets/js/bootstrap.min.js')}}"></script>

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