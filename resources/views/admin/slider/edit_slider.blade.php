@extends('admin.admin_master')
@section('admin')
            

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-12 ">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="old_image" value="{{ $slider->slider_img }}">
                                   
                                <div class="form-group">
                                    <h5>Slider Title<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
                                    </div>
                                  
                                </div>


                                <div class="form-group">
                                    <h5>Slider description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="description" class="form-control" value="{{ $slider->description }}">
                                          
                                    </div>
                                   
                                </div>

                                <div class="form-group">
                                    <h5>Slider Image:<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_img" class="form-control">
                                    </div>
                                    @error('slider_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Edit Slider">
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