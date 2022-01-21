@extends('admin.admin_master')

@section('admin')



    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shipping-Area</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shippings as $data)
                                            <tr>
                                                <td><span><i class="">{{ $data->division_name }}</i></span></td>
                    
                                                <td>
                                                    <a href="" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

                <div class="col-4 ">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Shipping Area</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="Post" action="{{ route('shipping.store') }}" >
                                  
                                   @csrf


                                    <div class="form-group">
                                        <h5>Division Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="division_name" class="form-control"
                                                id="" required>
                                        {{-- </div>
                                        @error('division_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}


                                   
                                   
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Coupon">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
