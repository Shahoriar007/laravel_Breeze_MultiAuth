<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirapod Chalok</title>

    <style>
    body {
        background-color: #f2f2f2;
    }

    .user-part,
    .office-part {
        background-color: #fff;
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    h2,
    h5,
    h3 {
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .user-left-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .img-responsive {
        max-width: 100%;
        height: auto;
    }

    img {
        width: 250px;
        margin-bottom: 10px;
    }

    .user-right {
        text-align: right;
    }

    .pay-first {
        background-color: green;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        font: 25px;

    }

    .nirapod-logo {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    p {

        margin: 2px 0px;
        font-size: 18px;
    }

    select {
        width: 200px;
        height: 30px;
    }

    select option {
        padding: 5px 0px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;

        padding: 5px;
    }

    td {
        width: 50px;
    }

    th {
        text-align: left;
    }

    .button-1 {
        background-color: green;
        color: #fff;
        padding: 10px 15px;
        border-radius: 10px;
        width: 100px;
        cursor: pointer;
        border: none;
    }

    .pay50 {
        position: relative;
        display: block;
        text-align: center;
    }

    .pay50 span {
        text-align: center;
        background-color: green;
        padding: 15px 30px;
        color: #fff;
        border-radius: 10px;
        font-size: 20px;
    }
    </style>
</head>

<body>


    <div class="user-part" style="margin-bottom: 5px; border-bottom: 2px dashed #000;">
        <div class="user-left">
            <h3 style="margin-bottom: 50px; font-size: 20px; text-transform: uppercase;">User Part</h3>
            <div class="nirapod-logo">
                <!-- <img style="width: 100px;" src="" class="img-responsive" alt="logo"> -->
                <h2 style="font-size: 20px; text-transform: uppercase; margin-left: 20px;">Nirapod Chalok</h2>
            </div>
            <h3 style="margin-bottom: 40px;">Invoice Id <span>#{{ $invdata['id'] }}</span></h3>

            <div class="owner-details">

            @php 
            $caseData = \App\Models\User::find($invdata['userId']);
            @endphp

                <div>
                    <h3 style="margin-bottom: 10px;">Invoice To:</h3>
                    <p style="font-weight: 700;">{{$caseData->name}}</p>
                    <p>Driving Licence No: {{$caseData->drivingLicense}}</p>
                    <p>case No: {{ $invdata['caseId'] }}</p>
                    <p>Fine Amount: {{ $invdata['caseCode'] }}</p>
                    <p>Pay Amount: {{ $invdata['newcaseCode'] }}</p>
                    <p>Active Mobile No:{{$caseData->phone}}</p>
                    <p>Refference Number: {{$caseData->shareableRefcode}} </p>
                </div>

                <div style="margin-top: 40px;">
                    <p>Invoice Date:</p>
                    @php
                        date_default_timezone_set('Asia/Dhaka');
                        $date = date('d-m-y');
                    @endphp

                    <p>{{ $date }}</p>
                </div>

            </div>

        </div>
        <div class="user-right">
            <div>
                <h2 style="margin-bottom: 20px;">Status:<span>Unpaid</span></h2>
                <h5 style="font-size: 20px;margin-bottom: 10px;">Due Date: <span>02/01/2023</span></h5>
            </div>
            <!-- <img src="" class="img-responsive" alt="bkash"><br> -->
            <a class="pay-first" href="">Pay First with Bkash</a>

            <div style="margin-top: 40px;">
                <h3>Pay To:</h3>
                <p style="font-weight: 700;">Nirapodchalok.com</p>
                <!-- <p>1 Indira Road,City Corporation Corner Market,</p> -->
                <p>2nd floor</p>
                <p>Farmgate Shere Bangla Nagar</p>
                <p>Dhaka-1215</p>
                <p>Email: Nirapodchalok@gmail.com</p>
                <p>Cell: 01557-855233</p>
                <p>Govt Approved Organization: DSWF</p>
                <p>Case No: {{ $invdata['caseId'] }} </p>
                <p>Fine Amount: {{ $invdata['caseCode'] }}</p>
                <p>Pay Amount: {{ $invdata['newcaseCode'] }}</p>
            </div>

            <!-- <div style="margin-top: 40px; margin-bottom: 40px;">
                <h3>Payment Method</h3>

                <form action="">
                    <select name="" id="">
                        <option value="0">Bkash</option>
                        <option value="1">Nagad</option>
                        <option value="2">Rocket</option>
                    </select>
                </form>
            </div> -->
        </div>
    </div>


    <div class="pay50"><span>50% Paying Organization</span></div>

    <br><br>

    <div class="office-part" style="padding-top: 50px;">
        <div class="office-left">
            <h3 style="margin-bottom: 10px; font-size: 20px; text-transform: uppercase;">Office Part</h3><br>
            <h3 style="margin-bottom: 40px;">Invoice Id <span>#{{ $invdata['id'] }}</span></h3>

            <div>
                <h3>Invoice To:</h3>
                <p>{{$caseData->name}}</p>
                <p>Driving Licence No: {{$caseData->drivingLicense}}</p>
                <p>case No: {{ $invdata['caseId'] }}</p>
                <p>Fine Amount: {{ $invdata['caseCode'] }}</p>
                <p>Pay Amount: {{ $invdata['newcaseCode'] }}</p>
                <p>Active Mobile No:{{$caseData->phone}}</p>
                <p>Liable Amount: {{ $invdata['newcaseCode'] }} </p>
            </div>
            <div style="margin-top: 40px;">
                <p>Invoice Date:</p>
                    <p>{{ $date }}</p>
            </div>
        </div>
        <div class="office-right">
            <h3 style="margin-bottom: 50px; font-size: 20px; text-transform: uppercase;">AFTER VERIFIED WILL BE PAID
            </h3>


            <div>
                <table style="width:200px; font-weight: 600; margin-bottom: 30px;">
                    <tr>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td>Case No: <span>{{ $invdata['caseId'] }}</span>
                            <br>(only for this Case id)
                        </td>
                    </tr>
                </table>

                <table style="width:100%">
                    <tr>
                        <th>Fine Amount:</th>
                        <td>{{ $invdata['caseCode'] }}</td>
                    </tr>
                    <tr>
                        <th>Credit by Organization:</th>
                        <td>{{ $invdata['newcaseCode'] }}</td>
                    </tr>
                    <tr>
                        <th>Due Customer:</th>
                        <td>{{ $invdata['newcaseCode'] }}</td>
                    </tr>
                </table>
            </div>

            <!-- <div style="margin-top: 30px;">
                <input class="button-1" type="button" value="Download"></input>
                <input class="button-1" type="button" value="Print"></input>
            </div> -->
        </div>

    </div>

</body>

</html>