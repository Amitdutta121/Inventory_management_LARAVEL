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
                        <h3 class="card-title">Recently Sell Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Delivery Date</th>
                                <th>Delivery Person Name</th>
                                <th>Car NO</th>
                                <th>Payment Option</th>
                                <th>Total Payment</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <p hidden> {{$count = 0}}</p>
                                @foreach($sellData as $data)
                                    <tr>
                                        <td>{{$data->delivery_date}}</td>
                                        <td>{{$data->delivery_man_name}}</td>
                                        <td>{{$data->delivery_car_no}}</td>
                                        <td>{{$data->payment_option}}</td>
                                        <td>{{$totalPrice[$count]}}</td>
                                        <td><a href="{{route("Sell_records.show",$data->sell_records_id)}}"><button class="btn btn-success">Details</button></a></td>
                                    </tr>
                                    <p hidden>{{$count = $count + 1}}</p>

                                @endforeach
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
