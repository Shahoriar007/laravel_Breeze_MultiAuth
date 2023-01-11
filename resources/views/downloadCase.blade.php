<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case details</title>
   



    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }
    </style>
</head>

<body>
    <section style="margin: 15% auto;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h3 style="font-size: 30px; font-weight: 700; text-align: center; margin-bottom: 20px;">Case Details
                    </h3>

                    @php
                      $caseData = \App\Models\User::find($data['userId']);
                    @endphp
                    <table>
                        <tr>
                            <th>ID:</th>
                            <td>{{$data['id']}}</td>
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td>{{$caseData->name}}</td>
                        </tr>
                        <tr>
                            <th>Reference Number:</th>
                            <td>{{$caseData->shareableRefcode}}</td>
                        </tr>
                        <tr>
                            <th>Case Number:</th>
                            <td>{{$data['caseId']}}</td>
                        </tr>
                        <tr>
                            <th>Case Fine:</th>
                            <td>{{$data['caseCode']}}</td>
                        </tr>
                        <tr>
                            <th>Comments:</th>
                            <td>{{$data['fineAmmount']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

