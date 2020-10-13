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
                        <h3 class="card-title">INVENTORY</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Calan Number</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{$count = 0}}
                            @if(count($sell_records) > 0)
                                @foreach($sell_records as $sell)
                                    <tr>
                                        <td>{{$sell->customer_id}}</td>
                                        <td>{{$sell->calan_number}}</td>
                                        <td>{{$sell->date}}</td>
                                        <td>{{$total[$count]}}</td>
                                        <td width="300px">
                                            <a href="{{url("/clientDetailsProduct")}}/{{$sell->sell_records_id}}"><button type="submit" class="btn btn-primary float-left" style="margin-left: 10px">Show Products</button></a>
                                        </td>
                                    </tr>
                                    {{$count = $count + 1}}
                                @endforeach
                            @else
                                <h1>No Products Found</h1>
                            @endif

                            </tbody>
                        </table>

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
