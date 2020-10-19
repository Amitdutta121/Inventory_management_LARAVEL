@extends('layouts.app')

@section("third_party_stylesheets")
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        @media print {
            .btn-print{
                display: none;
            }
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Client Details</h3>

                    </div>
                    <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Calan Number</td>
                                    <td>
                                        <h4>{{$details->calan_number}}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Date</td>
                                    <td>
                                        <h4>{{$details->date}}</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Product Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products) > 0)
                                <p hidden>{{$count = 0}}</p>

                            @foreach($products as $pro)
                                <tr>
                                    <td>{{$productNames[$count]}}</td>
                                    <td>{{$pro->products_quantity}}</td>
                                    <td>{{$pro->product_price}}</td>
                                </tr>
                                <p hidden>{{$count = $count + 1}}</p>

                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
                <button class="btn btn-default btn-print" onclick="window.print()" style="margin-bottom: 50px"><i class="fas fa-print"></i> Print</button>
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
