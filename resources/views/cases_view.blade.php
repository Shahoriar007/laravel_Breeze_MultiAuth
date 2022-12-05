@extends('masterAdmin')
@section('adminCaseView')




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
    <th>ID</th>
    <th>User ID</th>
    <th>Case ID</th>
    <th>Case code</th>
    <th>fine ammount</th>
    
    <th>Action</th>
  </tr>

@foreach($cases as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->userId }}</td>
        <td>{{ $item->caseId }}</td>
        <td>{{ $item->caseCode }}</td>
        <td>{{ $item->fineAmmount }}</td>
        

        <td>
            <a href="{{url('admin/viewcases')}}/{{$item->id}}">
                <button type="button" class="btn btn-primary">Details</button>
            </a>
        </td>
        
    </tr>
@endforeach

</table>
</div>


      

@endsection


