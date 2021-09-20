@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub->Sub-Category Data</h3>
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
                                        @foreach ($subsubcategory as $data)
                                            <tr>
                                                <td>{{ $data->category->category_name_en }}</td>
                                                <td>{{ $data->subcategory_subcategory_name_en }}</td>
                                                <td>{{ $data->subsubcategory_name_en }}</td>
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
                            <h3 class="box-title">Add Sub-SubCategory Data</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subsubcategory.store') }}" >
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach ($categories as $category )
                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                @endforeach
                                                

                                            </select>
                                            
                                        </div>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Sub-Category</option>
                                              
                                            </select>
                                                   
                                        </div>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control"
                                                id="subsubcategory_name_en">
                                        </div>
                                        @error('subsubcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>sub-SubCategory Name bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_ban" class="form-control"
                                                id="subsubcategory_name_ban">
                                        </div>
                                        @error('subsubcategory_name_ban')
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
    
      <script>
         $(document).ready(function () {
             $('select[name="category_id"]').on('change', function () {
                 var category_id=$(this).val();
                 if(category_id){
                        $.ajax({
                            type: "GET",
                            url: "{{ url('subcategory/find/formcategory') }}/"+category_id,
                            dataType: "json",
                            success: function (data) {
                               var d= $('select[name="subcategory_id"]').empty();
                               $.each(data, function (key, value) { 
                                   $('select[name="subcategory_id"]').append(
                                       '<option name="'+value.id+'">'+value.subcategory_name_en+'</option>'
                                   );
                                    
                               });
                            },
                        });
                 }
                 else{
                     alert('error');
                 }
             });
         });
      </script>


@endsection
