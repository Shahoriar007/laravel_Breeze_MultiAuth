<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<div>
    <a href="{{route('admin.dashboard')}}"> Dashboard</a>
</div>

<h2>HTML Table</h2>

<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Status</th>
  </tr>

@foreach($users as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>

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



</body>
</html>
