<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 <style>
      .container {
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 10px;
    padding-right: 10px;
  }  

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

.button {
    background-color: blue;
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
 </style>
</head>
<body>

  <div class="container">
      <div style="display: block; ">
        <p>Invoice</p>
        <ul>
          <li><i class="fas fa-circle" style="color:#84B0CA ;"></i><span>ID:</span>{{$invdata['id']}}</li>
          <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span>Creation Date: </span>{{$invdata['created_at']}}</li>
          <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span>Status:</span><span class="badge bg-warning text-black fw-bold">
          {{$invdata['caseStatus']}}</span></li>
        </ul>
      </div> 
   <div>
     <table class="styled-table">
      <thead>
          <tr>
              <th>Case ID</th>
              <th>Case Fine</th>
              <!-- <th>Qty</th> -->
          </tr>
      </thead>
      <tbody>
          <tr class="active-row">
              <td>{{$invdata['caseId']}}</td>
              <td>{{$invdata['caseCode']}}</td>
              <!-- <td>2</td> -->
          </tr>
         
          <!-- and so on... -->
      </tbody>
  </table>
   </div>
  <div class="row">
    <div style="">
      <!-- <p>Add additional notes and payment information</p> -->

    </div>
    <div >
      <ul>
        <li style="list-style-type: none;"><span style="margin-left: 230px;margin-right: 20px;">SubTotal</span>{{$invdata['caseCode']}}</li>
        <li style="list-style-type: none;" ><span style="margin-left: 167px;margin-right: 20px;">Company Paying</span> - {{$invdata['newcaseCode']}}</li>
      </ul>
      <p ><span style="margin-left: 230px;margin-right: 20px;"> Total Amount</span><span
          style="font-size: 25px;">{{$invdata['newcaseCode']}}</span></p>
    </div>
  </div>
  </div>
</body>
</html>