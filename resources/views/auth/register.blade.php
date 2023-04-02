@extends('master')
@section('register')

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body class="background">
    <section class="registration">
        <div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a>
        </div>
        <div class="title">Registration Here</div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">


                    <form enctype="multipart/form-data">
                        @csrf

                        <div class="user__details">
                            <h5 class="v-info">Personal Information</h5>
                            <div class="row">

                                <div class="input__box col-md-6">
                                    <span class="details">Active Phone Number*</span>
                                    <input type="tel" id="phone" name="phone" pattern="[0-9]{11}"
                                        placeholder="01353456789">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- email -->
                                <div class="input__box col-md-6">
                                    <span class="details">Email</span>
                                    <input id="email" type="email" name="email" placeholder="not mandatory">

                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Full Name*</span>
                                    <input id="name" type="text" name="name" placeholder="same as NID/License">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- <div class="input__box col-md-6">
                                    <span class="details">NID Number</span>
                                    <input id="nid" type="text" name="nid">
                                </div> -->

                                <!-- <div class="input__box col-md-6">
                                    <span class="details">Gender</span>
                                    <select name="gender" id="gender">
                                        <option data-display="Select">Nothing</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div> -->

                                <!-- <div class="input__box  col-md-6" >
                                    <span class="details">Date of Birth*</span>
                                    <input id="birthDate" type="date" name="birthDate" placeholder="dd-mm-yyyy" required>
                                </div> -->

                                <!-- <div class="input__box col-md-6">

                                    <span class="details">Blood Group</span>

                                    <select name="bloodGroup" id="bloodGroup">
                                        <option data-display="Select">Nothing</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    
                                </div> -->

                                <!-- Password -->
                                <div class="input__box col-md-6">
                                    <span class="details">Password*</span>
                                    <input id="password" type="password" name="password" placeholder="Minimum 8 digit"
                                        minlength="8" onkeyup='check();'>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input__box col-md-6">
                                    <span class="details">Confirm Password</span>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        placeholder="same as password" onkeyup='check();'>
                                    <span id='message'></span>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- <div class="input__box col-md-6">
                                    <span class="details">Upload your profile pic</span>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input id="photo" type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                            <label for="photo"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9YhceWoUKbK2wMeimcB0NgVEqYlpd6ccl411nf7jlx4sV5e8y5b8CdsEjPFtmbHoKhb0&usqp=CAU');">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>


                            <!-- <h5 class="v-info">Vehicle Information</h5>
                            <div class="row">
                                <div class="input__box col-md-6">
                                    <span class="details">Select City*</span>
                                    <select name="city" id="city" required>
                                        <option data-display="Select">Nothing</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Khulna">Khulna</option>
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-6" >
                                    <span class="details">Select Vehicle*</span>
                                    <select name="vehicle" id="vehicle" required>
                                        <option data-display="Select">Nothing</option>
                                        <option value="Car">Car</option>
                                        <option value="Bike">Bike</option>
                                        <option value="CNG">CNG</option>
                                        <option value="Pickup">Pickup</option>
                                        <option value="Truck">Truck</option>
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Driving License*</span>
                                    <input id="drivingLicense" type="text" name="drivingLicense" required>
                                </div>

                            </div> -->

                            <!-- <h5 class="v-info">Vehicle Registration</h5>
                            <div class="row">
                                <div class="input__box col-md-4" >
                                    <span class="details" >City Name*</span>
                                    <select name="cityName" id="cityName" required>
                                        <option data-display="Select">Nothing</option>
                                        <option value="1">DHK METRO</option>
                                        <option value="2">CTG METRO</option>
                                        <option value="3">SYL METRO</option>
                                        <option value="4">KHL METRO</option>
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-3">
                                    <span class="details">Vehicle Category*</span>

                                    <select name="category" id="category" required>
                                        <option data-display="Select">Nothing</option>
                                        <option value="Ka">Ka</option>
                                        <option value="Kha">Kha</option>
                                        <option value="Ga">Ga</option>
                                        <option value="Gha">Gha</option>
                                        <option value="Ch">Ch</option>
                                        <option value="Cha">Cha</option>
                                        <option value="Ja">Ja</option>
                                        <option value="Jha">Jha</option>
                                        <option value="Ta">Ta</option>
                                        <option value="Tha">Tha</option>
                                        <option value="Da">Da</option>
                                        <option value="No">No</option>
                                        <option value="Po">Po</option>
                                        <option value="Vo">Vo</option>
                                        <option value="Mo">Mo</option>
                                        <option value="Da">Da</option>
                                        <option value="Th">Th</option>
                                        <option value="Ha">Ha</option>
                                        <option value="La">La</option>
                                        <option value="E">E</option>
                                        <option value="Za">Za</option>
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-5" >
                                    <span class="details">Vehicle Number*</span>
                                    <input id="number" type="text" name="number" placeholder="00-0000" required>
                                </div>
                            </div> -->


                            <h5 class="v-info"> Reference Mobile Number</h5>
                            <div class="row text-center">
                                <div class="input__box col-md-12">
                                    <span class="details">User Reference Mobile Number</span>
                                    <input id="refCode" type="text" name="refCode" placeholder="not mandatory">
                                </div>


                            </div>

                            <!-- <h5 class="v-info"> Bkash TransactionID</h5> -->

                            <div class="row text-center">
                                <!-- <div class="input__box col-md-12">
                                <span class="details">TransactionID*</span>
                                <p>Please Pay 100 tk to this Bkash Merchant no for registration and enter the Transaction id.
                                            <br> Bkash Merchant No: <span class="text-danger">01712322027</span></p>
                                <input id="transactionId" type="text" name="transactionId"   >

                            </div> -->


                            </div>

                        </div>


                        <div class="button text-center">
                            <!-- <input type="submit" class="fire mb-2" value="Next >"> -->
                            
                        </div>



                    </form>

                    <div>Already have an account? <a href="{{ route('login') }}"
                                    style="color: #fbc72a;">Login</a></div>

                    <input id="regButton" type="submit" class="fire mb-2" value="Next >">




                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
    $(document).ready(function() {

        // Bkash var
        var token_id = null;
        // Bkash var end


        document.getElementById("regButton").onclick = function() {

            console.log("working");

            // Bkash var
            var price = 10;
            var invoice = 'REG12345';
            var callBackURL = 'https://127.0.0.1:8000/register';
            var bkashURL;
            // Bkash var end

            // Reg value get
            var phone = document.getElementById("phone").value.trim();
            var email = document.getElementById("email").value.trim();
            var name = document.getElementById("name").value.trim();
            var password = document.getElementById("password").value.trim();
            var password_confirmation = document.getElementById("password_confirmation").value.trim();
            var refCode = document.getElementById("refCode").value.trim();

            // reg value store in session
            sessionStorage.setItem('phone', phone);
            sessionStorage.setItem('email', email);
            sessionStorage.setItem('name', name);
            sessionStorage.setItem('password', password);
            sessionStorage.setItem('password_confirmation', password_confirmation);
            sessionStorage.setItem('refCode', refCode);
            // reg value store in session end


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                type: 'POST',
                url: "{{ route('getTokenReg') }}",
                data: {
                    price: price,
                    callBackURL: callBackURL,
                    invoice: invoice
                },

                success: function(data) {

                    //console.log(data.value1.bkashURL);

                    token_id = data.value2;

                    console.log(token_id);
                    sessionStorage.setItem('token_id', data.value2);

                    window.location.href = data.value1.bkashURL;

                }

            });


            // // Reg data save
            // $.ajaxSetup({
            //     headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({

            // type: 'POST',
            // url: "{{ route('register') }}",
            // data: {phone: phone, email: email, name: name, password: password, password_confirmation: password_confirmation, refCode: refCode},

            // success: function(data) {

            // console.log("Done");

            // // Redirect to dashboard 
            // window.location.href = "http://127.0.0.1:8000/dashboard";



            // }

            // });




        };






    });

    // Bkash payment

    var urlParams = new URLSearchParams(window.location.search);

    var urlPaymentID = urlParams.get('paymentID');
    var status = urlParams.get('status');

    console.log(urlPaymentID, status);

    if (status == 'success') {

        var paymentID = urlPaymentID;
        token_id = sessionStorage.getItem('token_id');

        // sessionStorage.removeItem('token_id');

        console.log("Token is here:" + token_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: "{{ route('executePaymentReg') }}",
            data: {
                paymentID: paymentID,
                token_id: token_id
            },

            success: function(data) {

                console.log("Successfully Done");
                sessionStorage.removeItem('token_id');
                // payment done here


                // reg a user

                phone = sessionStorage.getItem('phone');
                email = sessionStorage.getItem('email');
                name = sessionStorage.getItem('name');
                password = sessionStorage.getItem('password');
                password_confirmation = sessionStorage.getItem('password_confirmation');
                refCode = sessionStorage.getItem('refCode');

                var transactionId = data.trxID;

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

            type: 'POST',
            url: "{{ route('register') }}",
            data: {phone: phone, email: email, name: name, password: password, password_confirmation: password_confirmation, refCode: refCode, transactionId: transactionId},

            success: function(data) {

            console.log("Done");

            // Redirect to dashboard 
            window.location.href = "https://127.0.0.1:8000/dashboard";



            }

            });





            }

        });

    }

    var check = function() {
        if (document.getElementById('password').value == document.getElementById('password_confirmation').value &&
            document.getElementById('password').value != "") {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Password matched';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Please insert the same password';
        }
    }
    </script>



    @endsection