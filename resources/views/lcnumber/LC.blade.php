@extends('layouts.app')

@section("third_party_stylesheets")
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset("asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset("asset/plugins/toastr/toastr.min.css")}}">
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
                                <th>LC number</th>
                                <th>LC Security Money 1</th>
                                <th>LC Security Money 2</th>
                                <th>LC Bank Charge 1</th>
                                <th>LC Bank Charge 2</th>
                                <th>Insurance bill</th>
                                <th>Document Bill</th>
                                <th>Document Name</th>
                                <th>Duty Free Charge</th>
                                <th>Truck Fair Bill</th>
                                <th>Total</th>
                                <th>Already Paid</th>
                                <th>Remaining</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($lcnumber) > 0)
                                @foreach($lcnumber as $lc)
                                    <tr>
                                        <td>{{$lc->lc_number}}</td>
                                        <td>{{$lc->lc_margin_1_security_money}}</td>
                                        <td>{{$lc->lc_margin_1_bank_charge}}</td>
                                        <td>{{$lc->lc_margin_2_security_money}}</td>
                                        <td>{{$lc->lc_margin_2_bank_charge}}</td>
                                        <td>{{$lc->lc_insurance_bill}}</td>
                                        <td>{{$lc->lc_document_bill}}</td>
                                        <td>{{$lc->lc_document_name}}</td>
                                        <td>{{$lc->lc_duty_free_charge}}</td>
                                        <td>{{$lc->lc_truck_fair_bill}}</td>
                                        <td>{{$lc->total}}</td>
                                        <td>{{$lc->already_paid}}</td>
                                        <td>{{$lc->remaining}}</td>
                                        <td>
                                            <a href="../public/Lcnumber/{{$lc->lc_id }}"><button class="btn btn-primary">Edit</button></a>

                                            <form action="{{route("Lcnumber.destroy",$lc->lc_id )}}" method="POST" enctype="multipart/form-data">
                                                @method("DELETE")
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
    <!-- SweetAlert2 -->
    <script src="{{asset("asset/plugins/sweetalert2/sweetalert2.min.js")}}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if(session()->has("lcmessage"))
        Toast.fire({
            icon: 'success',
            title: 'Lc Number Added'
        });
        @endif
        @if(session()->has("deleteMessage"))
        Toast.fire({
            icon: 'error',
            title: 'Lc Number Deleted'
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
