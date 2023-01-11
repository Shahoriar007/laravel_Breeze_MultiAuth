<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('adminFrontend/images/favicon.png')}}">
    <!-- Page Title  -->
    <title></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('adminFrontend/assets/css/dashlite.css?ver=3.1.1')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('adminFrontend/assets/css/theme.css?ver=3.1.1')}}">

        
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <!-- datatable -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
 

</head>

@include('admin.adminNavbar')

    @yield('adminDashboard')
    @yield('adminCaseView')
    @yield('adminUserView')
    

    @yield('adminViewcasesDetais')
    @yield('adminUserDetaisView')

@include('admin.adminFooter')


    <!-- JavaScript -->
    <script src="{{ asset('adminFrontend/assets/js/bundle.js?ver=3.1.1')}}"></script>
    <script src="{{ asset('adminFrontend/assets/js/scripts.js?ver=3.1.1')}}"></script>

    
    <script
  src="https://code.jquery.com/jquery-3.6.2.min.js"
  integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
  crossorigin="anonymous"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            });
        });
    </script>

<script type="text/javascript">
        $(function(){
            $(document).on('click','#active',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                title: 'Are you sure?',
                text: "You want to activate this user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, active!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                    'Activated!',
                    'success'
                    )
                }
                })
            });
        });
    </script>

<script type="text/javascript">
        $(function(){
            $(document).on('click','#deactive',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                title: 'Are you sure?',
                text: "You want to deactivate this user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, deactivate!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                    'Deactivated!',
                    'success'
                    )
                }
                })
            });
        });
    </script>

    

    



</html>