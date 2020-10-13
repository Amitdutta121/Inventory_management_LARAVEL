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
                    <h3 class="card-title">INVENTORY</h3>
                </div>
                <div class="card-body">
                    <form action="{{url("/showReport")}}" method="POST" enctype="multipart/form-data">
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
                                <td>Reports</td>
                                <td>
                                    <select name="rtype" class="custom-select">
                                        <option value="exp">All Expense</option>
                                        <option value="prof">All Profit</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Start Date</td>
                                <td>
                                    <input type="date" name="startDate" class="form-control" value="" id="exampleInputEmail1">
                                </td>

                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>End Date</td>
                                <td>
                                    <input type="date" name="endDate" class="form-control" value="" id="exampleInputEmail1">
                                </td>

                            </tr>
                            <tr>
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
@endsection
@section("third_party_scripts")

@endsection
