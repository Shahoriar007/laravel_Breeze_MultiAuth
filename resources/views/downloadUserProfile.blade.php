<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
   



    <style>
        table {
            font-family: arial, sans-serif;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th{
            width: 30%;
        }

        td{
            width: 70%;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        img{
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }

    </style>
</head>

<body>
    <section style="margin: 0% auto;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                   <div style="text-align: center;">
                    <span style="font-size: 30px; font-weight: 700; margin-bottom: 20px; border-bottom: 5px solid #000;">User Details</span>
                   </div>
                    
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg" alt="">
                  
                    <table>
                        <!-- <tr>
                            <h4 style="text-align: center; font-size: 20px; color: red;">Basic Information</h4>
                        </tr> -->
                        <tr>
                            <th>Full Name:</th>
                            <td>{{$data['name']}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{$data['email']}}</td>
                        </tr>
                        <tr>
                            <th>Phone Number:</th>
                            <td>{{$data['phone']}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$data['gender']}}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth:</th>
                            <td>{{$data['birthDate']}}</td>
                        </tr>
                        <tr>
                            <th>Blood Group:</th>
                            <td>{{$data['bloodGroup']}}</td>
                        </tr>
                        <tr>
                            <th>Address(City):</th>
                            <td>{{$data['city']}}</td>
                        </tr>
                        <tr>
                            <th>NID No:</th>
                            <td>{{$data['nid']}}</td>
                        </tr>
                        <tr>
                            <th>Designation:</th>
                            <td>{{$data['designation']}}</td>
                        </tr>
                        
                       <!-- <tr>
                        <h4 style="text-align: center; font-size: 20px; color: red;">Vehicle Information</h4></td>
                       </tr> -->
                        <tr>
                            <th>Vehicle:</th>
                            <td>{{$data['vehicle']}}</td>
                        </tr>
                        <tr>
                            <th>Driving License:</th>
                            <td>{{$data['drivingLicense']}}</td>
                        </tr>
                        <tr>
                            <th>City Name:</th>
                            <td>{{$data['cityName']}}</td>
                        </tr>
                        <tr>
                            <th>Category:</th>
                            <td>{{$data['category']}}</td>
                        </tr>
                        <tr>
                            <th>Number:</th>
                            <td>{{$data['number']}}</td>
                        </tr>
                   
                        <!-- <tr>
                            <h4 style="text-align: center; font-size: 20px; color: red;">Others</h4>
                        </tr> -->
                        <tr>
                            <th>Reference Number:</th>
                            <td>{{$data['refCode']}}</td>
                        </tr>
                        <tr>
                            <th>Shareble Reference Number:</th>
                            <td>{{$data['shareableRefcode']}}</td>
                        </tr>
                        <!-- <tr>
                            <th>Transaction ID:</th>
                            <td>12456378</td>
                        </tr> -->
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

