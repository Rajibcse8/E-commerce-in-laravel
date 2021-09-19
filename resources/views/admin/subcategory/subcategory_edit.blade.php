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
                            <h3 class="box-title">Update Sub-Category Data</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subcategory.update',$subcategory->id) }}" >
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach ($categories as $category )
                                                <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': ''  }}>{{ $category->category_name_en }}</option>
                                                @endforeach
                                                

                                            </select>
                                            
                                        </div>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control"
                                                id="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}">
                                        </div>
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Sub-Category Name bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_ban" class="form-control"
                                                id="subcategory_name_ban" value="{{ $subcategory->subcategory_name_ban }}">
                                        </div>
                                        @error('subcategory_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                   
                                   
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Sub-Category">
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