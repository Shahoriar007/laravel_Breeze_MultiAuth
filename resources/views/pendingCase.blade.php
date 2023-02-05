@extends('masterAdmin')
@section('adminCaseView')



<style>
div#example_info {
    font-size: medium;
    padding-top: 30px;
}

div#example_paginate {
    padding-top: 30px;
}

div.dataTables_wrapper div.dataTables_filter input {
    display: inline-block;
    font-size: 15px !important;
    padding: 10px !important;
}

div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
    font-size: 15px !important;
    padding: 10px;
}

.nk-menu-text {
    flex-grow: 1;
    display: inline-block;
    white-space: nowrap;
    padding: 8px !important;
}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



</head>

<body>

    <div>
        <a href="{{route('admin.dashboard')}}"> Dashboard</a>
    </div>
    <br>
    <br>

    <h2 class="text-center">Case Table</h2>

    <div style="overflow-x:auto;">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Case Number</th>
                    <th>Case Fine</th>
                    <th>Comments</th>
                    <th>Case Status</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($pendingCase as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    
                    @php
                        $userName = \App\Models\User::findOrFail($item->userId);
                    @endphp

                    <td>{{ $userName->name }}</td>

                    <td>{{ $item->caseId }}</td>
                    <td>{{ $item->caseCode }}</td>
                    <td>{{ $item->fineAmmount }}</td>
                    <td>{{ $item->caseStatus }}</td>


                    <td>
                        <a href="{{url('admin/viewcases')}}/{{$item->id}}">
                            <button type="button" class="btn btn-primary">Details</button>
                        </a>
                        <a href="{{url('admin/caseDelete')}}/{{$item->id}}" id="delete">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>

                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Case Number</th>
                    <th>Case Fine</th>
                    <th>Comments</th>
                    <th>Case Status</th>

                    <th>Action</th>

                </tr>
            </tfoot>

        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
    </script>

    <script type="text/Javascript">

        // $(document).ready( function () {
    // $('#myTable').DataTable();
    // });

    $(document).ready(function () {
        
    // Setup - add a text input to each footer cell
    $('#example thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');
 
    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
});
   
</script>


    @endsection