@extends('layouts.app')

@section("third_party_stylesheets")

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sell Records Details</h3>
                    </div>
                        <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Product Name</th>
                                        <th>Product price</th>
                                        <th>Product quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty(Session::get('rawMaterialSession')))
                                        @for($i=0; $i<count(Session::get('rawMaterialSession')); $i++)
                                        <tr>
                                            <td>1.</td>
                                            <td>{{Session::get('rawMaterialSession')[$i][0]}}</td>
                                            <td>{{Session::get('rawMaterialSession')[$i][1]}}</td>
                                            <td>{{Session::get('rawMaterialSession')[$i][2]}}</td>
                                            <td><a href="{{url("removeRawMaterialSession/")}}/{{$i}}"><button class="btn btn-danger">Delete</button></a></td>
                                        </tr>
                                        @endfor
                                    @endif
                                    </tbody>
                                </table>
                        </div>
                    <div class="card-body">
                        <form action="{{url('addToRawMaterialSession')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Input</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Product Name</td>
                                    <td>
                                        <input type="text" name="name" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Price</td>
                                    <td>
                                        <input type="number" name="cost" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                    </td>

                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Stock</td>
                                    <td>
                                        <input type="number" name="quantity" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Submit</td>
                                    <td>
                                        <input type="hidden" name="pid" value="">
                                        <input type="submit" class="btn btn-success">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                        <!-- /.card-body -->
                    <div class="card-body">
                        <form action="{{route('Raw_material_records.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered">

                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Input</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Total Cost</td>
                                    <td>
                                        <input required type="number" placeholder="amount" name="totalCost" class="form-control" autocomplete="off" id="exampleInputEmail1">
                                    </td>

                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Transportation Cost</td>
                                    <td>
                                        <input type="number" placeholder="amount" name="transCost"  class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                    </div>

                    <a href=""><button style="width: 100%; margin-bottom: 2%" type="submit" class="btn btn-primary">Submit</button></a>
                    </form>
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

@endsection
