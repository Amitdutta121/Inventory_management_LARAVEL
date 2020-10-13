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
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Role</th>
                                <th>User Created At</th>
                                <th>Controlls</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email }}</td>
                                        <td>{{$user->user_role }}</td>
                                        <td>{{$user->created_at }}</td>
                                        <td>
                                            <a href="../public/editUsers/{{$user->id}}"><button class="btn btn-primary">Edit</button></a>

                                            <form action="{{route("deleteUser",$user->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" style="margin-top: 10px">Delete</button>
                                            </form>
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
