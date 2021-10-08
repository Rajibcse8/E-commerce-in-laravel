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
                        <h3 class="box-title">Slider Data</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sldier Image</th>
                                        <th>Slider title</th>
                                        <th>Slider Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $data)
                                        <tr>
                                            
                                            <td><img src="{{ asset($data->slider_img) }}"
                                                    style="width:70px;height:50px;" alt="">
                                            </td>
                                            <td>{{ $data->title }}</td>
                                            <td>
                                                @if($data->description)
                                                <span class="text-primary">{{ $data->description }}</span>
                                                @else
                                                    <span class="text-danger">{{ 'No Descrition' }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->status==1)
                                                  <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>    
                                                @endif
                                            </td>
                                            <td width="26%">
                                               
                                                <a href="{{ route('slider.edit',$data->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                                @if($data->status==1)
                                                <a href="" class="btn btn-danger btn-sm" id="pactive" title="In-Active"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                <a href="" class="btn btn-danger" id="pinactive" title="Active"><i class="fa fa-arrow-up"></i></a>   
                                                @endif
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
                        <h3 class="box-title">Edit Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                @csrf



                                <div class="form-group">
                                    <h5>Slider Title<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <h5>Slider description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="description" class="form-control">
                                          
                                    </div>
                                   
                                </div>

                                <div class="form-group">
                                    <h5>Slider Image:<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_img" class="form-control" id="brand_image">
                                    </div>
                                    @error('slider_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Slider">
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