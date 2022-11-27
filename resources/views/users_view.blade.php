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

<h2>HTML Table</h2>

<div style="overflow-x:auto;">
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Nid</th>
    <th>Gender</th>
    <th>Birth Date</th>
    <th>Blood Group</th>
    <th>City</th>
    <th>Vehicle</th>
    <th>Driving License</th>
    <th>City Name</th>
    <th>Category</th>
    <th>Number</th>
    <th>Ref Code</th>
    <th>Bkash TransactionID</th>
    <th>Status</th>
  </tr>

@foreach($users as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->nid }}</td>
        <td>{{ $item->gender }}</td>
        <td>{{ $item->birthDate }}</td>
        <td>{{ $item->bloodGroup }}</td>
        <td>{{ $item->city }}</td>
        <td>{{ $item->vehicle }}</td>
        <td>{{ $item->drivingLicense }}</td>
        <td>{{ $item->cityName }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->number }}</td>
        <td>{{ $item->refCode }}</td>
        <td>{{ $item->transactionId }}</td>

        @if($item->status==1)

        <td>
            <a href="{{url('admin/view/status/0')}}/{{$item->id}}">
                <button type="button" class="btn btn-primary">Active</button>
            </a>
        </td>
        
        @elseif($item->status==0)

        <td>
            <a href="{{url('admin/view/status/1')}}/{{$item->id}}">
                <button type="button" class="btn btn-outline-primary">Deactive</button>
            </a>
        </td>

        @endif


    </tr>
@endforeach

</table>
</div>




</body>
</html>
