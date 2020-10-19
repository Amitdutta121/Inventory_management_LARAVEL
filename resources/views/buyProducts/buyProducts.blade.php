@extends('layouts.app')

@section("third_party_stylesheets")
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset("asset/plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Selected Products</h3>
                    </div>
                        <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty(Session::get('sellSession')))
                                        @for($i=0; $i<count(Session::get('sellSession')); $i++)
                                        <tr>
                                            <td>1.</td>
                                            <td>{{Session::get('sellSession')[$i][1]}}</td>
                                            <td>{{Session::get('sellSession')[$i][2]}}</td>
                                            <td>{{Session::get('sellSession')[$i][3]}}</td>
                                            <td><a href="{{url("removeFromSellSession/")}}/{{$i}}"><button class="btn btn-danger">Delete</button></a></td>
                                        </tr>
                                        @endfor
                                    @endif
                                    </tbody>
                                </table>
                        </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Select Products</h3>
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
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->product_name}}</td>
                                                    <td>{{$product->product_lc_id}}</td>
                                                    <td>{{$product->product_code}}</td>
                                                    <td>{{$product->product_origin}}</td>
                                                    <td>{{$product->product_price}}</td>
                                                    <td>{{$product->product_stocks}}</td>
                                                    <td>{{$product->date}}</td>
                                                    <td width="300px">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$product->product_id}}" data-whatever="@mdo">Add to Sell</button>
                                                        </button>

                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="exampleModal{{$product->product_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{url('addToCart')}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Price:</label>
                                                                        <input required type="text" name="price" class="form-control" id="recipient-name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Quantity</label>
                                                                        <input required type="text" name="quantity" class="form-control" id="recipient-name">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                                                <input type="hidden" name="product_name" value="{{$product->product_name}}">

                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

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
                        <!-- /.card-body -->
                    <div class="card-body">
                        <form action="{{route('Buy_records.store')}}" method="post" enctype="multipart/form-data">
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
                                    <td>3.</td>
                                    <td>Select Customer</td>
                                    <td>
                                        <select required name="cnumber" class="form-control select2" style="width: 100%;">
                                            @foreach($clients as $c)
                                                <option value="{{$c->client_id}}">{{$c->client_name}} | {{$c->client_phoneno}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Calan Number</td>
                                    <td>
                                        <input required type="text" name="calannumber" class="form-control" autocomplete="off" id="exampleInputEmail1">
                                    </td>

                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Date</td>
                                    <td>
                                        <input required type="date" name="date" class="form-control date" id="">
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
    <!-- SweetAlert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


    @if(Session::get('message') == "false")
        <script>
            swal("", "Not enough stock", "warning",{
                button:"OK"
            });
        </script>
        {{session::forget("message")}}
    @endif

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
    <script src="{{asset("asset/plugins/select2/js/select2.full.min.js")}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>

@endsection
