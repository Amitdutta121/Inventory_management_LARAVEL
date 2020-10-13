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
                            <form action="<?php echo URL::to('Lcnumber');?>/{{$editLc->lc_id}}" method="post" enctype="multipart/form-data">
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
                                        <td>LC number</td>
                                        <td>
                                            <input type="number" required name="lcnumber" class="form-control" value="{{$editLc->lc_number}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Security money 1</td>
                                        <td>
                                            <input type="number" required name="s1" class="form-control" value="{{$editLc->lc_margin_1_security_money}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Security money 2</td>
                                        <td>
                                            <input type="number" required name="s2" class="form-control" value="{{$editLc->lc_margin_1_bank_charge}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Bank Charge 1</td>
                                        <td>
                                            <input type="number" name="bankCharge1" class="form-control" value="{{$editLc->lc_margin_2_security_money}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Bank Charge 1s</td>
                                        <td>
                                            <input type="number" name="bankCharge2" class="form-control" value="{{$editLc->lc_margin_2_bank_charge}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Insurance Bill</td>
                                        <td>
                                            <input type="number" name="insuranceBill" class="form-control" value="{{$editLc->lc_insurance_bill}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>Document Bill</td>
                                        <td>
                                            <input type="number" name="documentBill" class="form-control" value="{{$editLc->lc_document_bill}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Document Note</td>
                                        <td>
                                            <input type="text" name="documentNote" class="form-control" value="{{$editLc->lc_document_name}}" autocomplete="off" id="exampleInputEmail1"></input>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>Duty Free Charge</td>
                                        <td>
                                            <input type="number" name="dutyFreeCharge" class="form-control" value="{{$editLc->lc_duty_free_charge}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Truck Fair Bill</td>
                                        <td>
                                            <input type="number" name="truckFairBill" class="form-control" value="{{$editLc->lc_truck_fair_bill}}" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>

                                    <tr>
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
