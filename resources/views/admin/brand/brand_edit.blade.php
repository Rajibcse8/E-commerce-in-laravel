@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand Data</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="Post" action="{{ route('brand.update.store',$brands->id) }}" enctype="multipart/form-data">
                                    @csrf



                                    <div class="form-group">
                                        <h5>Brand Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control"
                                                id="brand_name_en" value="{{ $brands->brand_name_en }}">
                                        </div>
                                        @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Brnad Name bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_ban" class="form-control"
                                                id="brand_name_ban" value="{{ $brands->brand_name_ban }}">
                                        </div>
                                        @error('brand_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Brnad Image:<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control" id="brand_image">
                                        </div>
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Brand">
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



