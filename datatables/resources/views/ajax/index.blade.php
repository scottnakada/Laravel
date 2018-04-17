@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/b-print-1.5.1/cr-1.4.1/r-2.2.1/datatables.min.css"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">Data Table Demo</div>

                    <div class="card-body">
                        <table id="example" class="table table-hover table-bordered table-striped datatable" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
        <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#example').DataTable({
                "ajax": "api/ajax/getusers",
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "email"}
                ],
                "colReorder": true,
                "responsive": true,
                "pagingType": "full_numbers",
                "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                       "<'row'<'col-sm-12'tr>>" +
                       "<'row'<'col-sm-4'i><'col-sm-8'p>>"
            });
        });
    </script>
@endsection