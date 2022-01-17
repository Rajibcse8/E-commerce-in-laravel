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
                            <h3 class="box-title">Coupon List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Coupon Name</th>
                                            <th>Coupon Discount</th>
                                            <th>Coupon Validity</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $data)
                                            <tr>
                                                <td><span><i class="{{ $data->coupon_name }}"></i></span></td>
                                                <td>{{ $data->coupon_amount }}</td>
                                                <td>{{ $data->coupon_validity }}</td>
                                               
                                                <td>
                                                    @if($data->status==1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                     @else
                                                     <span class="badge badge-pill badge-danger">InActive</span>
                                                    @endif

                                                </td>
                    
                                                <td>
                                                    <a href="" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Add Coupon Data</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="Post" action="" >
                                    @csrf



                                    <div class="form-group">
                                        <h5>Coupon Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_name" class="form-control"
                                                id="">
                                        </div>
                                        @error('coupon_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                   

                                    <div class="form-group">
                                        <h5>Coupon Discount %<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_amount" class="form-control"
                                                id="category_name_ban">
                                        </div>
                                        @error('coupon_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Coupon Validity<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validity" class="form-control"
                                                id="category_name_ban">
                                        </div>
                                        @error('coupon_validity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
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
