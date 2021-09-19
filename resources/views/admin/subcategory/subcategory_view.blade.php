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
                            <h3 class="box-title">Sub-Category Data</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub-Category English</th>
                                            <th>Sub-Category Bangla</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategory as $data)
                                            <tr>
                                                <td>{{ $data->subcategory_id }}</td>
                                                <td>{{ $data->subcategory_name_en }}</td>
                                                <td>{{ $data->subcategory_name_ban }}</td>
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
                            <h3 class="box-title">Add Sub-Category Data</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="Post" action="" >
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category" id="category" class="form-control">
                                                <option value="">Select-Category</option>
                                                <option value="1">Category-1</option>
                                                <option value="2">Category-2</option>
                                                <option value="3">Category-3</option>
                                            </select>
                                            
                                        </div>
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control"
                                                id="category_name_en">
                                        </div>
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Sub-Category Name bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_ban" class="form-control"
                                                id="category_name_ban">
                                        </div>
                                        @error('category_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                   
                                   
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Sub-Category">
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
