@extends('layouts.app')

@section("third_party_stylesheets")

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{route('Sell_records.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Payment Option</label>
                            <select class="form-control custom-select" name="poption">
                                <option selected disabled>Select one</option>
                                <option selected>Cash</option>
                                <option>Check</option>
                                <option>Bank transfer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Delivery man name</label>
                            <input type="text" id="inputName" name="name" class="form-control" placeholder="Delivery man name">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Delivery Car no</label>
                            <input type="text" id="inputName" class="form-control" name="carno" placeholder="Delivery car no">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Delivery Date</label>
                            <input type="date" id="inputName" class="form-control" name="date" placeholder="Delivery date">
                        </div>
                    </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <!-- /.card -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>


                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Size</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @for ($i = 0; $i < count($pName); $i++)
                            <tr>
                                <td>{{$pName[$i]}}</td>
                                <td>{{$pQuantity[$i]}}</td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{url("removeFromSession/")}}/{{$i}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            <tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 45%">Checkout</button>
            </form>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section("third_party_scripts")

@endsection
