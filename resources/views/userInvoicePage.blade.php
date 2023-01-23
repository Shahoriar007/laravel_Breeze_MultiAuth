<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
}

 </style>
<body>
    <page size="A4" style="padding: 100px;  class="relative">
        <div >
                
            <div style="float:left;width: 50%;">
                <h3> USER PART</h3>
                <div>
                    
                    <h2 style="font-weight: 700;
                    font-size: 25px; float: right;margin-top: 85px;">NIRAPOD CHALOK</h2>
                </div>
                <div style="margin-top: 180px;">
                    <h3 style="font-size: large;">Invoice ID # {{$caseDetails->id}}</h3>
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
                   
                </div>
                <h2 style="margin-top:5px;  display: inline-block;color: white; font-weight: 900; background-color: darkgreen;padding: 10px; border-radius: 15px; float: right;">Pay Fast with bkash</h2>
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
                    <h2 style="font-weight: 700; font-size: 20px;text-align: right;margin-top:30px;margin-bottom: 10px;">Payment Method</h2>
                <p style="border:2px solid black;padding: 5px;">bakash payment (Auto Checkout)</p>
            </div> 
        </div>
        <div class="absolute">
            <p style="padding: 5px;font-weight: 700; color: white;">50% Paying Organization</p>
        </div>
    </page>
    <page size="A4" style="padding: 100px;">
        <div >
                
            <div style="float:left;width: 50%;">
                <h3> OFFICE PART</h3>
                <div style="margin-top: 100px;">
                    <h3 style="font-size: large;">Invoice ID # {{$caseDetails->id}}</h3>
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
                              <td>{{$caseDetails->caseCode}}/-</td>
                              <td>{{$dueAmmount}}/-</td>
                              <td>{{$dueAmmount}}/-</td>
                            </tr>
                          </table>
                    </div>
            </div> 
            <a href="{{ route('downloadInvoicePDFUser',$caseDetails->id) }}" class="button" style="border-radius: 10px;margin-left: 120px;margin-top:200px;">Download</a>
            <a href="{{ route('downloadInvoicePDFUser',$caseDetails->id) }}" class="button" style="border-radius: 10px;margin-left: 20px;margin-top:200px;">Print</a>
        </div>
    </page>
	
</body>
</html>