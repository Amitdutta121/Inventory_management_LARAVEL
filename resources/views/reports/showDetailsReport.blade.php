@extends('layouts.app')

@section("third_party_stylesheets")
    <title>Reports</title>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Report</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">{{ Request::segment(1) }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>LC ID</th>
                                <th>LC Amount</th>
                                <th>Labour Cost</th>
                                <th>Transportation Cost</th>
                                <th>Other Cost</th>
                                <th>Other Cost Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($expenseRecord) > 0)
                                <p hidden>{{$count = 0}}</p>

                            @foreach($expenseRecord as $expense)
                                <tr>
                                    <td>{{$expense->date}}</td>
                                    <td>{{$lcNumber[$count]}}</td>
                                    <td>{{$expense->lc_amount}}</td>
                                    <td>{{$expense->labour_cost}}</td>
                                    <td>{{$expense->transportation_cost}}</td>
                                    <td>{{$expense->other_cost}}</td>
                                    <td>{{$expense->other_cost_note}}</td>

                                <p hidden>{{$count = $count +1}}</p>

                            @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="col-6" style="margin-left: 48%">
                        <p class="lead">Total</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Total:</th>
                                    <td>{{$total}} TK</td>
                                </tr>
                            </table>
                            <button class="btn btn-default btn-print" onclick="window.print()" style="margin-bottom: 50px"><i class="fas fa-print"></i> Print</button>
                        </div>
                    </div>

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
