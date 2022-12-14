@extends('master')
@section('register')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<body class="background">
<section class="registration">
<div class="backtopage"><a href="{{ route('main.home') }}"><i class="fas fa-chevron-left"></i>Go to homepage</a></div>
        <div class="title">Edit User Information</div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 .reg-box mx-auto">


                    <form method="POST" action="{{ route('userProfileUpdate', $usersProfile->id) }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $usersProfile->id }}">

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

                                <!-- email -->
                                <div class="input__box col-md-6">
                                    <span class="details" >Email</span>
                                    <input id="email" type="email" name="email" value="{{ $usersProfile->email }}">
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Full Name*</span>
                                    <input id="name" type="text" name="name" value="{{ $usersProfile->name }}">
                                    
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">NID Number</span>
                                    <input id="nid" type="text" name="nid" value="{{ $usersProfile->nid }}">
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Gender</span>
                                    <select name="gender" id="gender">
                                        <option data-display="{{ $usersProfile->gender }}"><?php echo "$usersProfile->gender" ?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <!-- <div class="input__box  col-md-6" >
                                    <span class="details">Date of Birth*</span>
                                    <input id="birthDate" type="date" name="birthDate" placeholder="dd-mm-yyyy" value="{{ $usersProfile->birthDate }}">
                                </div> -->

                                @if($usersProfile->birthDate == null)

                                    <div class="input__box  col-md-6" >
                                        <span class="details">Date of Birth</span>
                                        <input id="birthDate" type="text" name="birthDate" placeholder="{{ $usersProfile->birthDate }}" onfocus="(this.type='date')">
                                    </div>

                                @else

                                    <div class="input__box  col-md-6" >
                                        <span class="details">Date of Birth</span>
                                        <input id="birthDate" type="text" name="birthDate" placeholder="{{ $usersProfile->birthDate }}" onfocus="(this.type='date')">
                                        <input hidden id="birthDate" type="date" name="birthDate" placeholder="dd-mm-yyyy" value="{{ $usersProfile->birthDate }}">
                                    </div>
                                @endif

                                <div class="input__box col-md-6">

                                    <span class="details">Blood Group</span>

                                    <select name="bloodGroup" id="bloodGroup">
                                        <option data-display="{{ $usersProfile->bloodGroup }}"><?php echo "$usersProfile->bloodGroup" ?></option>
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
                                <!-- <div class="input__box col-md-6">
                                    <span class="details" >Password*</span>
                                    <input id="password" type="password" name="password" placeholder="********" required>
                                </div>
                                <div class="input__box col-md-6" >
                                    <span class="details" >Confirm Password*</span>
                                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="********" required>
                                </div> -->

                                
                                
                            </div>


                            <h5 class="v-info">Vehicle Information</h5>
                            <div class="row">
                                <div class="input__box col-md-6">
                                    <span class="details">Select City*</span>
                                    <select name="city" id="city" >
                                        <option data-display="{{ $usersProfile->city }}"><?php echo "$usersProfile->city" ?></option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Khulna">Khulna</option>
                                    </select>
                                    
                                </div>

                                <div class="input__box col-md-6" >
                                    <span class="details">Select Vehicle*</span>
                                    <select name="vehicle" id="vehicle">
                                        <option data-display="{{ $usersProfile->vehicle }}"><?php echo "$usersProfile->vehicle" ?></option>
                                        <option value="Car">Car</option>
                                        <option value="Bike">Bike</option>
                                        <option value="CNG">CNG</option>
                                        <option value="Pickup">Pickup</option>
                                        <option value="Truck">Truck</option>
                                    </select>
                                    <!-- <input id="vehicle" type="text" name="vehicle"  required> -->
                                </div>

                                <div class="input__box col-md-6">
                                    <span class="details">Driving License*</span>
                                    <input id="drivingLicense" type="text" name="drivingLicense" value="{{ $usersProfile->drivingLicense }}">
                                </div>

                            </div>

                            <h5 class="v-info">Vehicle Registration</h5>
                            <div class="row">
                                <div class="input__box col-md-4" >
                                    <span class="details" >City Name*</span>
                                    <select name="cityName" id="cityName" >
                                        <option data-display="{{ $usersProfile->cityName }}"><?php echo "$usersProfile->cityName" ?></option>
                                        <option value="DHK METRO">DHK METRO</option>
                                        <option value="CTG METRO">CTG METRO</option>
                                        <option value="SYL METRO">SYL METRO</option>
                                        <option value="KHL METRO">KHL METRO</option>
                                    </select>
                                    <!-- <input id="cityName" type="text" name="cityName" required> -->
                                </div>

                                <div class="input__box col-md-3">
                                    <span class="details">Vehicle Category*</span>

                                    <select name="category" id="category" >
                                        <option data-display="{{ $usersProfile->category }}"><?php echo "$usersProfile->category" ?></option>
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
                                    <input id="number" type="text" name="number" placeholder="00-0000" value="{{ $usersProfile->number }}">
                                </div>
                            </div>


                            <!-- <h5 class="v-info"> New Genareted Ref code</h5> -->
                            <div class="row text-center">
                            <!-- <div class="input__box col-md-12">
                                <span class="details">User Ref Code</span>
                                <input id="refCode" type="text" name="refCode" value="{{ $usersProfile->refCode }}" >
                            </div> -->


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
                            <input type="submit" class="fire mb-2" value="Update">
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
    if (event.key != 'Backspace' && (tele.value.length === 2 || tele.value.length === 7)){
    tele.value += '-';
    }
    });
</script>

    @endsection