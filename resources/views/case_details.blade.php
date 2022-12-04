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
    <a href="{{route('admin.dashboard')}}"> Dashboard</a>
</div>




<h3>ID: {{ $caseDetails->id }}</h3>
<h3>userId: {{ $caseDetails->userId }}</h3>
<h3>caseId: {{ $caseDetails->caseId }}</h3>
<h3>caseCode: {{ $caseDetails->caseCode }}</h3>
<h3>fineAmmount: {{ $caseDetails->fineAmmount }}</h3>

<!-- case image -->
<img src="{{ (!empty($caseDetails->casePhoto))? url($caseDetails->casePhoto):url('upload/no_image.jpg') }}" width="140" height="150">





</div>




</body>
</html>
