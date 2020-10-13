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
                            <form action="<?php echo URL::to('Labor_expense');?>/{{$labourExpense->labor_expense_id }}" method="post" enctype="multipart/form-data">
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
                                        <td>Cost</td>
                                        <td>
                                            <input type="text" name="cost" class="form-control" value="{{$labourExpense->labor_expense_cost}}" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Other Costs</td>
                                        <td>
                                            <input type="text" name="othercosts" class="form-control" value="{{$labourExpense->labor_expense_other_costs}}" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Notes</td>
                                        <td>
                                            <input type="text" name="notes" class="form-control" value="{{$labourExpense->labor_expense_notes}}" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    </tr><tr>
                                        <td>6.</td>
                                        <td>Submit</td>
                                        <td>
                                            <input name="_method" type="hidden" value="PUT">
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
