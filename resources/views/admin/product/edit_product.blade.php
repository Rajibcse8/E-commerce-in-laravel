@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('product.update', $product->id) }}"
                                enctype="multipart/form-data">

                                @csrf
                                <!---=------------Brand,Categoty,SuBCategory Row Start--------------------------->
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Basic Brnad <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="brand_id" id="select" class="form-control" required>
                                                    <option value="" selected="" disabled id="id1">Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->brand_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Select Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" id="category_id" class="form-control" required>
                                                    <option value="" selected="" disabled>Select Your Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->category_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Select Sub-Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" id="subcategory_id" class="form-control"
                                                    required>
                                                    <option value="" selected disabled>Select Sub-Category</option>
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}"
                                                            {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                                            {{ $subcategory->subcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subcategory_id')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!--------------------------------------EndRow-------------------------------------->
                                <!------------------------Subsubcategory,Product Name eng,Product Name Ban Row Strat------------------------->
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Select Sub=Sub-Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subsubcategory_id" id="	subsubcategory_id"
                                                    class="form-control" required>
                                                    <option value="" selected disabled>Select Sub-Sub-Category</option>
                                                    @foreach ($subsubcategories as $subsubcategory)
                                                        <option value="{{ $subsubcategory->id }}"
                                                            {{ $product->subsubcategory_id == $subsubcategory->id ? 'selected' : '' }}>
                                                            {{ $subsubcategory->subsubcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subsubcategory_id')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Name Eng <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_en" class="form-control" required
                                                    value="{{ $product->product_name_en }}">
                                            </div>
                                            @error('product_name_en')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Name Ban <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_ban" class="form-control" required
                                                    value="{{ $product->product_name_ban }}">
                                            </div>
                                            @error('product_name_ban')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                <!--------------------------------------EndRow-------------------------------------->
                                <!-------------------------------Product Code Product Quantity  Product Tags Eng Row Start --------------------------------------->

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_code" class="form-control" required
                                                    value="{{ $product->product_code }}">
                                            </div>
                                            @error('product_code')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_qty" class="form-control" required
                                                    value="{{ $product->product_qty }}">
                                            </div>
                                            @error('product_qty')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Tags Eng <span class="text-danger">*</span></h5>
                                            <div class="`   ">
                                                <input type="text" name="product_tag_en"
                                                    value="{{ $product->product_tag_en }}" data-role="tagsinput"
                                                    required />
                                            </div>
                                            @error('product_tag_en')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>



                                <!--------------------------------------EndRow-------------------------------------->
                                <!------------------------------- Product Tags Ban product  size eng and ban Row Start --------------------------------------->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Tags Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tag_ban"
                                                    value="{{ $product->product_tag_ban }}" data-role="tagsinput"
                                                    required />
                                            </div>
                                            @error('product_tag_ban')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Size Eng <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_en"
                                                    value="{{ $product->product_size_en }}" data-role="tagsinput"
                                                    required />
                                            </div>
                                            @error('product_size_en')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Size Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_ban"
                                                    value="{{ $product->product_size_ban }}" data-role="tagsinput"
                                                    required />
                                            </div>
                                            @error('product_size_ban')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>


                                </div>
                                <!--------------------------------------EndRow-------------------------------------->
                                <!------------------------------- Product Color Ban and Eng product   --------------------------------------->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Product Color Eng <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_en"
                                                    value="{{ $product->product_color_en }}" data-role="tagsinput"
                                                    required />
                                            </div>
                                            @error('product_color_en')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Product Color Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_ban"
                                                    value="{{ $product->product_color_ban }}" data-role="tagsinput"
                                                    required />
                                            </div>
                                            @error('product_color_ban')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <!--------------------------------------EndRow-------------------------------------->
                                <!------------------------------- discount_price selling price (main_thumbnail mnultiple Image row) start--------------------------------------->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount_price" class="form-control"
                                                    value="{{ $product->discount_price }}" required>
                                            </div>
                                            @error('discount_price')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="selling_price" class="form-control" required
                                                    value="{{ $product->selling_price }}">
                                            </div>
                                            @error('selling_price')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>



                                </div>

                                <!--------------------------------------EndRow-------------------------------------->

                                <!------------------------------- Short Description Eng and Bangla--------------------------------------->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Short Description Eng <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_descp_en" id="short_descp_en" class="form-control"
                                                    required
                                                    placeholder="Textarea text">{{ $product->short_descp_en }}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_descp_ban" id="short_descp_ban"
                                                    class="form-control" required placeholder="Textarea text">
                                                        {{ $product->short_descp_ban }}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!--------------------------------------EndRow-------------------------------------->


                                <!------------------------------- Long Description Eng and Bangla--------------------------------------->
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <textarea id="editor1" name="long_descp_en" rows="10" cols="80" required>
                                                    {{ $product->long_descp_en }}</textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <textarea id="editor2" name="long_descp_ban" rows="10" cols="80" required>
                                                    {{ $product->long_descp_ban }}</textarea>

                                        </div>
                                    </div>

                                </div>

                                <!--------------------------------------EndRow-------------------------------------->

                                <!---------------------------------Hot Deals Features Special Offer Special Deals--------------------------------------->
                                <hr>
                                <hr>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="hot_deals" value="1" name="hot_deals"
                                                        {{ $product->hot_deals == '1' ? 'checked' : '' }}>
                                                    <label for="hot_deals">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="featured" value="1" name="featured"
                                                        {{ $product->featured == '1' ? 'checked' : '' }}>
                                                    <label for="featured">Features</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="special_offer" value="1" name="special_offer"
                                                        {{ $product->special_offer == '1' ? 'checked' : '' }}>
                                                    <label for="special_offer">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="special_deals" value="1" name="special_deals"
                                                        {{ $product->special_deals == '1' ? 'checked' : '' }}>
                                                    <label for="special_deals">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update-Product">

                                </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
        <!--Section For multiple Image--------------------------------------------------------------->

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">

                        <div class="box-header">
                            <h4 class="box-title">MUltiple Image for Product <strong>Update</strong></h4>
                        </div>

                        <form action="{{ route('multiple.image.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                              <div class="row row-sm">
                                @foreach ($multi_img as $img)
                                  
                                  <div class="col-md-3">
                                    <div class="card" >
                                        <img src="{{ asset($img->image_name) }}" class="card-img-top" style="height: 130px; width:230px;">
                                        <div class="card-body">
                                          <a href="{{ route('delete.multiImg',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                          <p class="card-text">
                                              <label for="" class="form-control-label">Change Image <span>*</span></label>
                                              <input  type="file" name="multi_img[{{$img->id }}]">
                                          </p>
                                        
                                        </div>
                                      </div>
                                  </div>
                                    
                                @endforeach
                                
                              </div>
                              <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update-Image">

                              </div>

                        </form>

                    </div>
                </div>


            </div>

        </section>



        <!-----------------end Section--------------------------------------------------------------->

        <!--Start Product Main Image Update----------------------------------------------------------->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">

                        <div class="box-header">
                            <h4 class="box-title">Main  Thamble <strong>Update</strong></h4>
                        </div>

                        <form action="{{ route('main.image.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                              <div class="row row-sm">
                               
                                  <div class="col-md-3">
                                    <div class="card" >
                                        <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" style="height: 130px; width:230px;">
                                        <div class="card-body">
                                        
                                          <p class="card-text">
                                              <label for="" class="form-control-label">Change Image <span>*</span></label>
                                              <input  type="file" name="product_thumbnail" onchange="MainThumbUrl(this)">
                                              <img src="" id="mainthmb"> 
                                            </p>
                                        
                                        </div>
                                      </div>
                                  </div>  
                                                       
                              </div>
                              
                              <br>
                              
                              <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update-Main-Thamble">

                              </div>

                        </form>

                    </div>
                </div>


            </div>

        </section>
        <!--end Section-->
        <script>
            $(document).ready(function() {
                $('select[name="category_id"]').on('change', function() {

                    $('select[name="subsubcategory_id"]').empty();
                    var category_id = $(this).val();
                    if (category_id) {
                        $.ajax({
                            type: "GET",
                            url: "{{ url('subcategory/find/formcategory') }}/" + category_id,
                            dataType: "json",
                            success: function(data) {
                                var d = $('select[name="subcategory_id"]').empty();
                                $.each(data, function(key, value) {

                                    $('select[name="subcategory_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .subcategory_name_en + '</option>');

                                });
                            },
                        });
                    } else {
                        alert('error');
                    }


                });

                $('select[name="subcategory_id"]').on('change', function() {

                    var subcategory_id = $(this).val();
                    if (subcategory_id) {
                        $.ajax({
                            type: "GET",
                            url: "{{ url('subsubcategory/find/formsubcategory') }}/" +
                                subcategory_id,
                            dataType: "json",
                            success: function(data) {
                                var da = $('select[name="subsubcategory_id"]').empty();
                                $.each(data, function(key, value) {

                                    $('select[name="subsubcategory_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .subsubcategory_name_en + '</option>');

                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }

                });

            });
        </script>

        <script>
            function MainThumbUrl(inp) {
                if (inp.files && inp.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {

                        $('#mainthmb').attr('src', e.target.result).width(75).height(75);

                    };
                    reader.readAsDataURL(inp.files[0]);
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#multi_img').on('change', function() { //on file input change
                    if (window.File && window.FileReader && window.FileList && window
                        .Blob) //check File API supported browser
                    {
                        var data = $(this)[0].files; //this file data

                        $.each(data, function(index, file) { //loop though each file
                            if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                                var fRead = new FileReader(); //new filereader
                                fRead.onload = (function(file) { //trigger function on successful read
                                    return function(e) {
                                        var img = $('<img/>').addClass('thumb').attr('src',
                                                e.target.result).width(80)
                                            .height(80); //create image element 
                                        $('#preview_img').append(
                                        img); //append image to output element
                                    };
                                })(file);
                                fRead.readAsDataURL(file); //URL representing the file's data.
                            }
                        });

                    } else {
                        alert("Your browser doesn't support File API!"); //if File API is absent
                    }
                });
            });
        </script>




    </div>


@endsection








{{-- <div class="form-group">
    <h5>Product Main Thumbnail <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="file" name="product_thumbnail" class="form-control" onchange="MainThumbUrl(this)" required>
    </div>
    @error('product_thumbnail')
        <span class="text text-danger">{{ $message }}</span>

    @enderror
    <img src="" alt="" id="mainthmb">
</div> --}}


{{-- <div class="form-group">
    <h5>Product Multiple Image <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="file" name="multi_img[]" class="form-control" id="multi_img" multiple required>
    </div>
    @error('multi_img')
        <span class="text text-danger">{{ $message }}</span>

    @enderror
    <div class="row" id="preview_img"></div>
</div> --}}
