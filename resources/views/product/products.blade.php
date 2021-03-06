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
                                <th>Product Name</th>
                                <th>Product LC number</th>
                                <th>product CODE</th>
                                <th>Product Origin</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Date</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($products) > 0)
                                <p hidden>{{$count = 0}}</p>

                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$lcnumber[$count]}}</td>
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->product_origin}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td>{{$product->product_stocks}}</td>
                                        <td>{{$product->date}}</td>
                                        <td width="300px">
                                            <a href="../public/Product/{{$product->product_id}}"><button class="btn btn-primary float-left">Edit</button></a>

                                            <form action="{{route("Product.destroy",$product->product_id)}}" method="POST" enctype="multipart/form-data">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger float-left" style="margin-left: 10px">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <p hidden>{{$count = $count + 1}}</p>

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
