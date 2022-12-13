@extends('master')
@section('registerTrn')

<body class="background">
<section class="registration">
<div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a></div>
       
        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">


                <form name="trform" method="POST" action="{{ route('tranlogin') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">

                            <h5 class="v-info"> Bkash TransactionID</h5>
                            
                            <div class="row text-center">
                                <div class="input__box col-md-12">
                                    <span class="details text-white">TransactionID*</span>
                                    <p class="text-white">Please Pay 100 tk to this Bkash Merchant no for registration and enter the Transaction id.
                                                <br> Bkash Merchant No: <span class="text-danger">01712322027</span></p>


                                                <span id="trid" class="text-danger"></span>
                                    <input id="transactionId" type="text" name="transactionId" required>
                                    
                                    
                                    

                                </div>
                            </div>


                        <div class="button text-center">
                            <input type="submit" class="fire mb-2" value="Register">
                            <div>Already have an account? <a href="{{ route('login') }}" style="color: #fbc72a;">Login</a></div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>

    @endsection

<!-- <script>
function validateForm() {
  let x = document.forms["trform"]["transactionId"].value;
  if (x == "") {
    document.getElementById("trid").innerHTML="Please input Bkash transaction id";
    return false;
  }
}
</script> -->

