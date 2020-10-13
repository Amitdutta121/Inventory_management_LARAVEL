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
                        <h3 class="card-title">Add Clint</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{route('Clint.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">

                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Progress</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Clint Name</td>
                                        <td>
                                            <input type="text" required name="name" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Clint Phone NO</td>
                                        <td>
                                            <input type="text" required name="phoneno" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Clint NID</td>
                                        <td>
                                            <input type="text" required name="nid" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Clint address</td>
                                        <td>
                                            <input type="text" required name="address" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                        <td>6.</td>
                                        <td>Submit</td>
                                        <td>
                                            <input type="submit" class="btn btn-success">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!-- /.card-body -->

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
