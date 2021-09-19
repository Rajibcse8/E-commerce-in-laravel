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
                            <h3 class="box-title">Update Category Data</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="Post" action="{{ route('category.update',$category->id) }}" >
                                    @csrf



                                    <div class="form-group">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control"
                                                id="category_name_en" value="{{ $category->category_name_en }}">
                                        </div>
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Category Name bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_ban" class="form-control"
                                                id="category_name_ban" value="{{ $category->category_name_ban }}">
                                        </div>
                                        @error('category_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control"
                                                id="category_name_ban" value="{{ $category->category_icon }}">
                                        </div>
                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                   

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update category">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

            </div>
        </section>
    </div>
@endsection
