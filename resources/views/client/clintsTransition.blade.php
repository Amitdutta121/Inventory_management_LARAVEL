@extends('layouts.app')

@section("third_party_stylesheets")
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Transitions</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Client Name</th>
                                <th>Phone No</th>
                                <th>Money Type</th>
                                <th>Amount</th>
                                <th>Bank Name</th>
                                <th>Notes</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($addMoneyRecords) > 0)
                                <p hidden>{{$count = 0}}</p>

                                @foreach($addMoneyRecords as $record)
                                    <tr>
                                        <td>{{$record->date}}</td>
                                        <td>{{$clientNames[$count]}}</td>
                                        <td>{{$phoneno[$count]}}</td>
                                        <td>{{$record->money_type}}</td>
                                        <td>{{$record->amount}}</td>
                                        <td>{{$record->bank_name}}</td>
                                        <td>{{$record->notes}}</td>
                                    </tr>
                                    <p hidden>{{$count = $count + 1}}</p>
                                @endforeach
                            @else
                                <h1>No Products Found</h1>
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    <!-- /.row -->
    </div>
@endsection
@section("third_party_scripts")
    <!-- DataTables -->
    <script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
