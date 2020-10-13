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
                            <form action="{{route('deleteUsersRequest')}}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                        <td>User Name</td>
                                        <td>
                                            <input type="text" required name="name" class="form-control" value="" autocomplete="off" id="exampleInputEmail1" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>User Email</td>
                                        <td>
                                            <input type="text" required name="email" class="form-control" value="" autocomplete="off" id="exampleInputEmail1" autocomplete="off">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>User Role</td>
                                        <td>
                                            <select name="user_role" id="" class="form-control">
                                                <option selected disabled value="">Please Select An Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Password</td>
                                        <td>
                                            <input type="password" required name="password" class="form-control" value="" autocomplete="off" id="exampleInputEmail1" autocomplete="off">
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
    <!-- /.row -->
    </div>
@endsection
@section("third_party_scripts")

@endsection
