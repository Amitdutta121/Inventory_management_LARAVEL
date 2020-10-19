@extends('layouts.app')

@section("third_party_stylesheets")
    <!-- Select2 -->
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
                        <h3 class="card-title">INVENTORY</h3>
                    </div>
                        <div class="card-body">
                            <form action="{{route('Product.store')}}" method="post" enctype="multipart/form-data">
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
                                        <td>Select LC number</td>
                                        <td>
                                            <select  required name="lcnumber" class="form-control select2" style="width: 100%;">
                                                @foreach($lcnumbers as $lc)
                                                    <option value="{{$lc->lc_id}}">{{$lc->lc_number}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Product Name</td>
                                        <td>
                                            <input type="text" required name="name" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Code</td>
                                        <td>
                                            <input type="text" required name="code" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Origin</td>
                                        <td>
                                            <select required name="origin" class="form-control">
                                                <option value="china">China</option>
                                                <option value="bangladesh">Bangladesh</option>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Price</td>
                                        <td>
                                            <input type="text" required name="price" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Stock</td>
                                        <td>
                                            <input type="text" required name="stock" class="form-control" value="" autocomplete="off" id="exampleInputEmail1">
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
    <!-- Select2 -->
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
