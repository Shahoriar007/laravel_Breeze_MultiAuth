@extends('master')
@section('register')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<body class="background">
<section class="registration">
<div class="backtopage"><a href="{{ route('showUsers')}}"><i class="fas fa-chevron-left"></i>Back</a></div>
        <div class="title">Admin  Register New User</div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">


                    <form method="POST" action="{{ route('adminAddUserForm') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="user__details">

                        <div class="input__box col-md-6">
                                    
                                    <div class="avatar-upload">
                

                                        <div class="avatar-edit">
                                            
                                            <input class="form-control" type="file" id="photo" name="photo" accept=".png, .jpg, .jpeg" >
                                            <label for="photo"></label>

                                        </div>

                                        <div class="form-group">
                                            <!-- case image -->
                                            <img class="rounded-circle" height="200" width="200" id="showcasePhoto" src="{{ (!empty($usersProfile->photo))? url($usersProfile->photo):url('upload/no_image.jpg') }}" width="100" height="100">

                                        </div>
                                        <span class="details text-center">Upload your profile pic</span>
                                    </div>
                                </div>

                            <h5 class="v-info">Personal Information</h5>
                            <div class="row">

                                <div class="input__box col-md-6">
                                    <span class="details">Phone Number*</span>
                                    <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" placeholder="01353456789" >
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- email -->
                                <div class="input__box col-md-6">
                                    <span class="details" >Email</span>
                                    <input id="email" type="email" name="email" placeholder="not mandatory">
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Full Name*</span>
                                    <input id="name" type="text" name="name" placeholder="same as NID/License" >
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">NID Number</span>
                                    <input id="nid" type="text" name="nid">
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Gender</span>
                                    <select name="gender" id="gender">
                                        <option data-display="Select">Nothing</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="input__box  col-md-6" >
                                    <span class="details">Date of Birth*</span>
                                    <input id="birthDate" type="date" name="birthDate" placeholder="dd-mm-yyyy" >
                                </div>

                                <div class="input__box col-md-6">

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
                                    
                                </div>

                                <!-- Password -->
                                <div class="input__box col-md-6">
                                    <span class="details" >Password*</span>
                                    <input id="password" type="password" name="password" placeholder="Minimum 8 digit" minlength="8" onkeyup='check();'>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input__box col-md-6" >
                                    <span class="details" >Confirm Password*</span>
                                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="same as password" onkeyup='check();'>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input__box col-md-6">

                                    <span class="details">User Designation</span>

                                    <select name="designation" id="designation">
                                        <option data-display="Select"></option>

                                        @php
                                            $UserDesignation = \App\Models\UserDesignation::all();
                                        @endphp

                                        @foreach($UserDesignation as $userDegShow)
                                        <option value="{{ $userDegShow->userDgn }}">{{ $userDegShow->userDgn }}</option>
                                        @endforeach
                                       
                                    </select>
                                    
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


                            <h5 class="v-info">Vehicle Information</h5>
                            <div class="row">
                                <div class="input__box col-md-6">
                                    <span class="details">Select City*</span>
                                    <select name="city" id="city" >
                                        <option data-display="Select">Nothing</option>
                                        <option value="Barguna">Barguna</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Bhola">Bhola</option>
                                        <option value="Patuakhali">Patuakhali</option>
                                        
                                        <option value="Pirojpur">Pirojpur</option>
                                        <option value="Bandarban">Bandarban</option>
                                        <option value="Brahmanbaria">Brahmanbaria</option>
                                        <option value="Chandpur">Chandpur</option>

                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Cumilla">Cumilla</option>
                                        <option value="Cox's Bazar">Cox's Bazar</option>
                                        <option value="Feni">Feni</option>
                                        <option value="Khagrachhari">Khagrachhari</option>
                                        <option value="Lakshmipur">Lakshmipur</option>
                                        <option value="Noakhali">Noakhali</option>
                                        <option value="Rangamati">Rangamati</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Faridpur">Faridpur</option>
                                        <option value="Gazipur">Gazipur</option>
                                        <option value="Gopalganj">Gopalganj</option>
                                        <option value="Kishoreganj">Kishoreganj</option>
                                        <option value="Madaripur">Madaripur</option>

                                        <option value="Manikganj">Manikganj</option>
                                        <option value="Munshiganj">Munshiganj</option>
                                        <option value="Narayanganj">Narayanganj</option>
                                        <option value="Narsingdi">Narsingdi</option>
                                        <option value="Rajbari">Rajbari</option>
                                        <option value="Shariatpur">Shariatpur</option>
                                        <option value="Tangail">Tangail</option>
                                        <option value="Bagerhat">Bagerhat</option>
                                        <option value="Chuadanga">Chuadanga</option>
                                        <option value="Jashore">Jashore</option>

                                        <option value="Jhenaidah">Jhenaidah</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Kushtia">Kushtia</option>
                                        <option value="Magura">Magura</option>
                                        <option value="Meherpur">Meherpur</option>
                                        <option value="Narail">Narail</option>
                                        <option value="Satkhira">Satkhira</option>
                                        <option value="Jamalpur">Jamalpur</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Netrokona">Netrokona</option>

                                        <option value="Sherpur">Sherpur</option>
                                        <option value="Bogura">Bogura</option>
                                        <option value="Joypurhat">Joypurhat</option>
                                        <option value="Naogaon">Naogaon</option>
                                        <option value="Natore">Natore</option>
                                        <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                                        <option value="Pabna">Pabna</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Sirajganj">Sirajganj</option>
                                        <option value="Dinajpur">Dinajpur</option>

                                        <option value="Gaibandha">Gaibandha</option>
                                        <option value="Kurigram">Kurigram</option>
                                        <option value="Lalmonirhat">Lalmonirhat</option>
                                        <option value="Nilphamari">Nilphamari</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Thakurgaon">Thakurgaon</option>
                                        <option value="Habiganj">Habiganj</option>
                                        <option value="Moulvibazar">Moulvibazar</option>
                                        <option value="Sunamganj">Sunamganj</option>
                                        <option value="Sylhet">Sylhet</option>

                                        
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-6" >
                                    <span class="details">Select Vehicle*</span>
                                    <select name="vehicle" id="vehicle" >
                                        <option data-display="Select">Nothing</option>
                                        <option value="Car">Car</option>
                                        <option value="Bike">Bike</option>
                                        <option value="CNG">CNG</option>
                                        <option value="Pickup">Pickup</option>
                                        <option value="Truck">Truck</option>
                                        <option value="Bus">Bus</option>
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Driving License*</span>
                                    <input id="drivingLicense" type="text" name="drivingLicense" >
                                </div>

                            </div>

                            <h5 class="v-info">Vehicle Registration</h5>
                            <div class="row">
                                <div class="input__box col-md-4" >
                                    <span class="details" >City Name*</span>
                                    <select name="cityName" id="cityName" >
                                        <option data-display="Select">Nothing</option>
                                        <option value="1">DHK METRO</option>
                                        <option value="2">CTG METRO</option>
                                        <option value="3">SYL METRO</option>
                                        <option value="4">KHL METRO</option>
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-3">
                                    <span class="details">Vehicle Category*</span>

                                    <select name="category" id="category" >
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
                                    <input id="number" type="text" name="number" placeholder="00-0000" maxlength="7" >
                                </div>
                            </div>


                            <h5 class="v-info"> Reference Mobile Number</h5>
                            <div class="row text-center">
                            <div class="input__box col-md-12">
                                <span class="details">User's Reference Mobile Number</span>
                                <input id="refCode" type="text" name="refCode" placeholder="not mandatory" >
                            </div>


                            </div>

                            <h5 class="v-info"> Bkash TransactionID</h5>
                            
                            <div class="row text-center">
                            <div class="input__box col-md-12">
                                <span class="details">TransactionID*</span>
                                <p>Please Pay 100 tk to this Bkash Merchant no for registration and enter the Transaction id.
                                            <br> Bkash Merchant No: <span class="text-danger">01712322027</span></p>
                                <input id="transactionId" type="text" name="transactionId"   >

                            </div>


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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#photo').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showcasePhoto').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

<script type="text/javascript">

var tele = document.querySelector('#number');

    tele.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (tele.value.length === 2 )){
    tele.value += '-';
    }
    });
</script>

<script type="text/javascript">
        var check = function() {
            if (document.getElementById('password').value == document.getElementById('password_confirmation').value && document.getElementById('password').value != "") {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password matched';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Please insert the same password';
            }
            }
    </script>
    @endsection