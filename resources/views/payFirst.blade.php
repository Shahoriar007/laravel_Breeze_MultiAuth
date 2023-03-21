<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pay First</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
 <style>
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 14.85cm; 
}
page[size="A4"][layout="landscape"] {
  width: 14.85cm;
  height: 21cm;  
}
h1{
    font-weight: 700;
    font-size: 30px;
}
h3{
    font-weight: 700;
}

h4{
    font-weight: 700;
}
p{
    line-height: 10px;
}
table, th, td {
  border: 1px solid;
  text-align: center;
}

table {
  width: 40%;
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
div.relative {
  position: relative;
} 

div.absolute {
  position: absolute;
  top: 19.85cm;
  left: 600px;
  width: 200px;
  background-color: green;
  border-radius: 20px;
  margin-left: 150px;
}

 </style>
<body>
    <page size="A4" style="padding: 100px;  class="relative">
        <div >
                
            <div style="float:left;width: 50%;">
            

                <h3> USER PART</h3>
                <div>
                    <img src="{{ asset('userFrontend/img/nirapodchalok.jpg')}}" alt="" style="height: 100px;float: left;margin-top: 50px;" >
                    <h2 style="font-weight: 700;
                    font-size: 25px; float: right;margin-top: 85px;">NIRAPOD CHALOK</h2>
                </div>
                <div style="margin-top: 180px;">
                    
                </div>
                    <div style="margin-top:40px; text-align: left;">
                        <h4>Invoice To:</h4>

                        @php
                            $userInfo = \App\Models\User::find($caseDetails->userId);
                           
                        @endphp

                        <p>{{ $userInfo->name }}</p>
                        <p>Driving Licence No: {{ $userInfo->drivingLicense }}</p>

                        <p>case No: {{$caseDetails->caseId}}</p>
                        <p>Fine Amount: {{$caseDetails->caseCode}}</p>
                        <p>Pay Amount: {{$dueAmmount}}</p>

                        <p>Active Mobile No:{{ $userInfo->phone }}</p>
                        <p>Refference Number: {{ $userInfo->shareableRefcode }} </p>
                    </div>
                <div style="margin-top: 100px;">
                    <p>Invoice Date:</p>

                    @php
                        date_default_timezone_set('Asia/Dhaka');
                        $date = date('d-m-y');
                    @endphp

                    <p>{{ $date }}</p>
                </div>
                
            </div> 
            <div style="float:right;width: 50%;">
                <h1 style="margin-left: 100px; text-transform: uppercase; "> STATUS: {{$caseDetails->caseStatus}}</h1>
                <!-- <h4 style="margin-left: 200px;">Due Date:01/01/2023</h4> -->
                <div>
                    <img src="{{ asset('userFrontend/img/bkash_payment_logo.png')}}" alt="" style="height: 70px; float: right;" >
                </div>
                
                
                <button id="pay-now-btn" class="button" style="margin-top:5px;  display: inline-block;color: white; font-weight: 900; background-color: darkgreen;padding: 10px; border-radius: 15px; float: right;">Pay With Bkash</button>

                    <div style="margin-top:180px; text-align: right;">
                        <h4>Pay To:</h4>
                        <p>Nirapodchalok.com</p>
                        <p>1 Indira Road,City Corporation Corner Market,</p>
                        <p>2nd floor,Farmgate Shere Bangla Nagar,Dhaka-1215</p>
                        <p>Email: Nirapodchalok@gmail.com</p>
                        <p>Cell: 01557-855233</p>
                        <p>Govt Approved Organization: DSWF</p>
                        <p>Case No: {{$caseDetails->caseId}} </p>
                        <p>Fine Amount: {{$caseDetails->caseCode}}</p>
                        <p>Pay Amount: {{$dueAmmount}}</p>
                    </div>
                    <h2 style="font-weight: 700; font-size: 20px;text-align: right;margin-top:30px;margin-bottom: 10px;">Payment Method Manual(send money)</h2>
                <!-- <p style="border:2px solid black;padding: 5px;">bakash payment (Auto Checkout)</p> -->

                <form method="POST" action="{{ route('postCaseAfterPay') }}">
                    @csrf

                <button style="float: right;" type="submit" >Save</button>

                <input style="float: right;" type="text" name="trId" id="trId" placeholder="Transection ID">

                <select style="float: right;" name="paidWith" id="paidWith">
                    <option value="Rocket">Rocket: 019105129218 </option>
                    <option value="Nagad">Nagad: 01910512921 </option>
                    <option value="Upay">Upay: 01910512921 </option>
                    <option value="Bkash">Bkash: 01910512921</option>
                </select>

                


                </form>
                

            </div> 
        </div>
        <div class="absolute">
            <p style="padding: 5px;font-weight: 700; color: white; padding-left: 10px;">50% Paying Organization</p>
        </div>
    </page>
    <page size="A4" style="padding: 100px;">
        <div >
                
            <div style="float:left;width: 50%;">
                <h3> OFFICE PART</h3>
                <div style="margin-top: 100px;">
                    
                </div>
                    <div style="margin-top:40px; text-align: left;">
                        <h4>Invoice To:</h4>
                        <p>{{ $userInfo->name }}</p>
                        <p>Driving Licence No: {{ $userInfo->drivingLicense }}</p>

                        <p>case No: {{$caseDetails->caseId}}</p>
                        <p>Fine Amount: {{$caseDetails->caseCode}}</p>
                        <p>Pay Amount: {{$dueAmmount}}</p>

                        <p>Active Mobile No:{{ $userInfo->phone }}</p>
                        <p>Liable Amount: {{$dueAmmount}} </p>
                    </div>
                <div style="margin-top: 100px;">
                    <p>Invoice Date:</p>
                    <p>{{ $date }}</p>
                </div>
                
            </div> 
            <div style="float:right;width: 50%;">
                <h1 style="font-size: 25px;">AFTER VERIFIED WILL BE PAID</h1>
                    <div style="margin-top:180px; ">
                        <table style="float: left;">
                            <tr>
                                <th>Description</th>
                            </tr>
                            <tr>
                              <td>Case No:{{$caseDetails->caseId}}</td>
                            </tr>
                          </table>
                        <table style="float: right;">
                            <tr>
        
                            </tr>
                            <tr>
                              <td>Fine Amount</td>
                              <td>Credit by Orgnation</td>
                              <td>Due Customer</td>
                            </tr>
                            <tr>
                              <td>{{$caseDetails->caseCode}}</td>
                              <td>{{$dueAmmount}}</td>
                              <td id = "price"> {{$dueAmmount}} </td>
                            </tr>
                          </table>
                    </div>
            </div> 
           
        </div>
    </page>
	
</body>
</html>

<script>
  $(document).ready(function() {

    
    var token_id = null;

    $('#pay-now-btn').click(function() {

      var price = document.getElementById("price").textContent.trim();
      console.log(price);
      var invoice = 'INV12345';
      var callBackURL = 'http://127.0.0.1:8000/admin/payfirst';
      var bkashURL;

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({

        type: 'POST',
        url: "{{ route('getToken') }}",
        data: {price: price, callBackURL: callBackURL, invoice: invoice},

        success: function(data) {

          //console.log(data.value1.bkashURL);

          token_id = data.value2;

          console.log(token_id);
          sessionStorage.setItem('token_id', data.value2);

         window.location.href = data.value1.bkashURL;

        }

      });

    });

    var urlParams = new URLSearchParams(window.location.search);

    var urlPaymentID = urlParams.get('paymentID');
    var status = urlParams.get('status');

    console.log(urlPaymentID,status);

    if (status == 'success') {

      var paymentID = urlPaymentID;
      token_id = sessionStorage.getItem('token_id');

      sessionStorage.removeItem('token_id');

      console.log("Token is here:" + token_id);
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({

      type: 'POST',
      url: "{{ route('executePayment') }}",
      data: {paymentID: paymentID, token_id: token_id},

      success: function(data) {

        console.log(data.trxID);

        var trId = data.trxID;

        // save case start

            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

        type: 'POST',
        url: "{{ route('postCaseAfterpayWithBkash') }}",
        data: {trId: trId, paidWith: "Bkash"},

        success: function(data) {

            console.log("done done");

            window.location.href = "http://127.0.0.1:8000/dashboard/allcases/" + data;

        }

        });

        // Save case end

      }

      });

    }
    else if(status === 'failure' || status === 'cancel' ){
        alert("Case submission failed! Try again.");

        window.location.href = "http://127.0.0.1:8000/dashboard/casereport";
    }

  });

</script>