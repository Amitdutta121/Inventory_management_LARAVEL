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
                            <form action="{{route('Lcnumber.store')}}" method="post" enctype="multipart/form-data">
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
                                            <input type="number" required name="lcnumber" class="form-control" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Security money 1</td>
                                        <td>
                                            <input type="number" required name="s1" class="form-control s1" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Security money 2</td>
                                        <td>
                                            <input type="number" required name="s2" class="form-control s2" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Bank Charge 1</td>
                                        <td>
                                            <input type="number" required name="bankCharge1" class="form-control bankCharge1" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Bank Charge 2</td>
                                        <td>
                                            <input type="number" required name="bankCharge2" class="form-control bankCharge2" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Insurance Bill</td>
                                        <td>
                                            <input type="number" required name="insuranceBill" class="form-control insuranceBill" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Insurance Bill 2</td>
                                        <td>
                                            <input type="number" required name="insuranceBill1" class="form-control insuranceBill1" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>Document Bill</td>
                                        <td>
                                            <input type="number" required name="documentBill" class="form-control documentBill" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>4.</td>
                                        <td>Document Note</td>
                                        <td>
                                            <input type="text" required name="documentNote" class="form-control" value="0" autocomplete="off" id="exampleInputEmail1"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Document Bill 2</td>
                                        <td>
                                            <input type="number" required name="documentBill1" class="form-control documentBill1" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Document Note 2</td>
                                        <td>
                                            <input type="text" required name="documentNote1" class="form-control" value="0" autocomplete="off" id="exampleInputEmail1"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>Duty Free Charge</td>
                                        <td>
                                            <input type="number" required name="dutyFreeCharge" class="form-control dutyFreeCharge" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Truck Fair Bill</td>
                                        <td>
                                            <input type="number" required name="truckFairBill" class="form-control truckFairBill" value="0" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6.</td>
                                        <td>Submit</td>
                                        <td>
                                            <input type="submit" class="btn btn-success">
                                            <div class="float-right">
                                                <h3>Total</h3>
                                                <h3 class="total" style="color:red">0</h3>
                                            </div>
                                            
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
<script>
    $(document).on('change', 'input', function() {
        var s1 = parseInt($(".s1").val())
        var s2 = parseInt($(".s2").val())
        var bankCharge1 = parseInt($(".bankCharge1").val())
        var bankCharge2 = parseInt($(".bankCharge2").val())
        var insuranceBill = parseInt($(".insuranceBill").val())
        var insuranceBill1 = parseInt($(".insuranceBill1").val())
        var documentBill = parseInt($(".documentBill").val())
        var documentBill1 = parseInt($(".documentBill1").val())
        var dutyFreeCharge = parseInt($(".dutyFreeCharge").val())
        var truckFairBill = parseInt($(".truckFairBill").val())
        var total = s1 + s2 + bankCharge1 + bankCharge2 + insuranceBill + 
        insuranceBill1 +documentBill +documentBill1 +dutyFreeCharge+truckFairBill;
        $(".total").text(total);

        
    });
</script>
@endsection
