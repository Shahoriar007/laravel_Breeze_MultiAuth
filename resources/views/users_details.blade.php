<!DOCTYPE html>
<html>
<head>
<style>
/* table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
} */
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>

<div>
    <a href="{{route('showUsers')}}"> Dashboard</a>
</div>




<h3>ID: {{ $userDetails->id }}</h3>
<h3>Name: {{ $userDetails->name }}</h3>
<h3>Phone: {{ $userDetails->phone }}</h3>
<h3>Nid: {{ $userDetails->nid }}</h3>
<h3>Gender: {{ $userDetails->gender }}</h3>
<h3>Birth Date: {{ $userDetails->birthDate }}</h3>
<h3>Blood Group: {{ $userDetails->bloodGroup }}</h3>
<h3>City: {{ $userDetails->city }}</h3>
<h3>Vehical: {{ $userDetails->vehicle }}</h3>
<h3>Driving license: {{ $userDetails->drivingLicense }}</h3>
<h3>City Name: {{ $userDetails->cityName }}</h3>
<h3>Category: {{ $userDetails->category }}</h3>
<h3>Number: {{ $userDetails->number }}</h3>
<h3>Ref Code: {{ $userDetails->refCode }}</h3>
<h3>Shareable Ref Code: {{ $userDetails->shareableRefcode }}</h3>
<h3>Blash TransactionID: {{ $userDetails->transactionId }}</h3>


<!-- User image -->
<img src="{{ (!empty($userDetails->photo))? url($userDetails->photo):url('upload/no_image.jpg') }}" width="140" height="150">



</div>




</body>
</html>
