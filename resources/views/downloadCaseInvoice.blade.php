<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


/* page[size="A4"] {  
  width: 21cm;
  height: 14.85cm; 
}
page[size="A4"][layout="landscape"] {
  width: 14.85cm;
  height: 21cm;  
} */


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
    line-height: 2px;
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
  top: 15.85cm;
  /* left: 550px;
  width: 250px; */
  background-color: green;
  border-radius: 25px;
  text-align: center;
}

 </style>
<body>
    <page size="A4"class="relative">
        <div style="margin: 50px; margin-top: 0 !important;" >
                
            <div style="float:left;width: 50%;">
                <h3> USER PART</h3>
                <div>
                    <img src="nirapodchalok.jpg" alt="" style="height: 100px;float: left;margin-top: 50px;" >
                    <h2 style="font-weight: 700;
                    font-size: 25px; float: right;margin-top: 85px;">NIRAPOD CHALOK</h2>
                </div>
                <div style="margin-top: 180px;">
                    <h3 style="font-size: large;">Invoice ID # 0125</h3>
                </div>
                    <div style="margin-top:40px; text-align: left;">
                        <h4>Invoice To:</h4>
                        <p>Sheikh Lalon Ahmed</p>
                        <p>Driving Licence No: 12151601</p>
                        <p>case No: 252545262</p>
                        <p>Fine Amount: 3000</p>
                        <p>Pay Amount: 1500</p>
                        <p>Active Mobile No:01910512921</p>
                        <p>Refference Number: ncu 0125 </p>
                    </div>
                <div style="margin-top: 60px;">
                    <p>Invoice Date:</p>
                    <p>11/11/2022</p>
                </div>
                
            </div> 
            <div style="float:right;width: 50%;">
                <h1 style="margin-left: 100px;"> STATUS: UNPAID</h1>
                <h4 style="margin-left: 150px;">Due Date:01/01/2023</h4>
                <div>
                    <img src="bkash_payment_logo.png" alt="" style="height: 50px; float: right;" >
                </div>
                <h2 style="margin-top:5px;  display: inline-block;color: white; background-color: darkgreen;padding: 5px; border-radius: 20px; float: right;font-weight: 700;">Pay Fast with bkash</h2>
                    <div style="margin-top:150px; text-align: right;">
                        <h4>Pay To:</h4>
                        <p>Nirapodchalok.com</p>
                        <p>1 Indira Road,City Corporation Corner Market,</p>
                        <p>2nd floor,Farmgate Shere Bangla Nagar,Dhaka-1215</p>
                        <p>Email: Nirapodchalok@gmail.com</p>
                        <p>Cell: 01557-855233</p>
                        <p>Govt Approved Organization: DSWF</p>
                        <p>Case No: 252545262 </p>
                        <p>Fine Amount: 3000</p>
                        <p>Pay Amount: 1500</p>
                    </div>
                    <h2 style="font-weight: 700; font-size: 20px;text-align: right;margin-top:30px;margin-bottom: 10px;">Payment Method</h2>
                <p style="border:2px solid black;padding: 10px;">bakash payment (Auto Checkout)</p>
            </div> 
        </div>
        <div class="absolute">
            <p style="padding: 7px;font-weight: 700; color: white;">50% Paying Organization</p>
        </div>
    </page>
    <page size="A4" >
        <div style="margin: 50px; margin-top: 0 !important;" >
            <div style="float:left;width: 50%;margin-top:30px;">
                <h3> OFFICE PART</h3>
                <div style="margin-top: 100px;">
                    <h3 style="font-size: large;">Invoice ID # 0125</h3>
                </div>
                    <div style="margin-top:40px; text-align: left;">
                        <h4>Invoice To:</h4>
                        <p></p>
                        <p>Driving Licence No: 12151601</p>
                        <p>case No: 252545262</p>
                        <p>Fine Amount: 3000</p>
                        <p>Pay Amount: 1500</p>
                        <p>Active Mobile No:01910512921</p>
                        <p>Liable Amount: 1500 </p>
                    </div>
                <div style="margin-top: 95px;">
                    <p>Invoice Date:</p>
                    <p>11/11/2022</p>
                </div>
                
            </div> 
            <div style="float:right;width: 50%;">
                <h1 style="font-size: 20px;margin-top:50px;">AFTER VERIFIED WILL BE PAID</h1>
                    <div style="margin-top:100px; ">
                        <table style="float: left;">
                            <tr>
                                <th>Description</th>
                            </tr>
                            <tr>
                              <td>Case No:252545262(only for this Case id)</td>
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
                              <td>3000/-</td>
                              <td>1500/-</td>
                              <td>1500/-</td>
                            </tr>
                          </table>
                    </div>
            </div> 
            <a href="#" class="button" style="border-radius: 10px;margin-left: 100px;margin-top:180px;">Download</a>
            <a href="#" class="button" style="border-radius: 10px;margin-left: 10px;margin-top:180px;">Print</a>
        </div>
    </page>
	
</body>
</html>