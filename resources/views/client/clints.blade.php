@extends('layouts.app')

@section("third_party_stylesheets")
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset("asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">
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
                                <th>Clint Name</th>
                                <th>Clint PhoneNO</th>
                                <th>Clint NID</th>
                                <th>Clint Address</th>
                                <th>Clint Balance</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($clints) > 0)
                                @foreach($clints as $clint)
                                    <tr>
                                        <td>{{$clint->client_name}}</td>
                                        <td>{{$clint->client_phoneno}}</td>
                                        <td>{{$clint->client_nid}}</td>
                                        <td>{{$clint->client_address}}</td>
                                        <td>{{$clint->client_balance}}</td>
                                        <td>
                                            <a href="../public/Clint/{{$clint->client_id}}"><button class="btn btn-primary">Edit</button></a>

                                            <form action="{{route("Clint.destroy",$clint->client_id)}}" method="POST" enctype="multipart/form-data">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger" style="margin-top: 10px">Delete</button>
                                            </form>
                                            <a href="../public/clientDetails/{{$clint->client_id}}"><button class="btn btn-success float-right" style="margin-top: -70px">Details</button></a>
                                        </td>
                                    </tr>
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
    <script src="{{asset("asset/plugins/sweetalert2/sweetalert2.min.js")}}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if(session()->has("amessage"))
        Toast.fire({
            icon: 'success',
            title: 'Client Added'
        });
        @endif
        @if(session()->has("adelete"))
        Toast.fire({
            icon: 'error',
            title: 'Client Deleted'
        });
        @endif

    </script>
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
