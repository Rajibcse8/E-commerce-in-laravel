@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <div class="container-full">
      <section class="content">
          <div class="row">

            <div class="col-12 ">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub-SubCategory Data</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="">
                                @csrf

                                <div class="form-group">
                                    <h5>Category Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                             <option value="{{ $category->id }}" {{ $category->id==$subsubcategory->category_id ? 'selected': ''}}>
                                                    {{ $category->category_name_en }}</option>
                                            @endforeach 


                                        </select>

                                    </div>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value=""  selected="" disabled="">Select SubCategory</option> 
                                            @foreach ($subcategories as $subcategory)
                                               <option value="{{ $subsubcategory->id }}" 
                                                {{ $subcategory->id==$subsubcategory->subcategory_id ? 'selected':'' }}>{{ $subcategory->subcategory_name_en }}</option>
                                            @endforeach
                                            

                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Sub-SubCategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_en" class="form-control"
                                            id="subsubcategory_name_en" value="{{ $subsubcategory->subsubcategory_name_en }}">
                                    </div>
                                    @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <h5>sub-SubCategory Name bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_ban" class="form-control"
                                            id="subsubcategory_name_ban" value="{{ $subsubcategory->subsubcategory_name_ban }}">
                                    </div>
                                    @error('subsubcategory_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                        value="Update Sub-Sub-Category">
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

  <script type="text/javascript">
    
    $(document).ready(function () {
         
         $('select[name="category_id"]').on('change', function () {
            var category_id=$(this).val();
            //alert(category_id);
            if(category_id){
                $.ajax({
                    type: "GET",
                    url: "{{ url('subcategory/find/formcategory') }}/" + category_id,
                    dataType: "json",
                    success: function (data) {
                       var d=  $('select[name="subcategory_id"]').empty();
                        $.each(data, function (key, value) { 
                            $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                        });
                    },
                });
            }
            else{
                alert('danger');
            }
         });

    });

  </script>
  
@endsection