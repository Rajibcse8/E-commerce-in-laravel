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
                            <form novalidate>

                                <!---=------------Brand,Categoty,SuBCategory Row Start--------------------------->
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Basic Brnad <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="brnad_id" id="select" class="form-control">
                                                    <option value="" selected="" disabled id="id1">Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}
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
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="" selected="" disabled>Select Your Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
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
                                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                                    <option value="" selected disabled>Select Sub-Category</option>
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
                                                    class="form-control">
                                                    <option value="" selected disabled>Select Sub-Sub-Category</option>
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
                                                <input type="text" name="product_name_en" class="form-control">
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
                                                <input type="text" name="product_name_ban" class="form-control">
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
                                                <input type="text" name="product_code" class="form-control">
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
                                                <input type="text" name="product_qty" class="form-control">
                                            </div>
                                            @error('product_qty')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Tags Eng <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tag_en" value="Lorem,Ipsum,Amet"
                                                    data-role="tagsinput" />
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
                                                <input type="text" name="product_tag_ban" value="Lorem,Ipsum,Amet"
                                                    data-role="tagsinput" />
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
                                                <input type="text" name="product_size_en" value="Small,IpsMedium,large"
                                                    data-role="tagsinput" />
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
                                                <input type="text" name="product_size_ban" value="Small,Medium,Large"
                                                    data-role="tagsinput" />
                                            </div>
                                            @error('product_size_ban')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>


                                </div>
                                <!--------------------------------------EndRow-------------------------------------->
                                <!------------------------------- Product Color Ban and Eng product  Selling Price --------------------------------------->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Color Eng <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_en" value="Small,Medium,Large"
                                                    data-role="tagsinput" />
                                            </div>
                                            @error('product_color_en')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Color Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_ban" value="Small,Medium,Large"
                                                    data-role="tagsinput" />
                                            </div>
                                            @error('product_color_ban')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="seeling_price" class="form-control">
                                            </div>
                                            @error('seeling_price')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <!--------------------------------------EndRow-------------------------------------->
                                <!------------------------------- discount_price main_thumbnail mnultiple Image row start--------------------------------------->

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount_price" class="form-control">
                                            </div>
                                            @error('discount_price')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Main Thumbnail <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="product_thumbnail" class="form-control" onchange="MainThumbUrl(this)" >
                                            </div>
                                            @error('product_thumbnail')
                                                <span class="text text-danger">{{ $message }}</span>

                                            @enderror
                                            <img src="" alt="" id="mainthmb">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Multiple Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="multi_img[]" class="form-control" id="multi_img" multiple>
                                            </div>
                                            @error('multi_img')
                                                <span class="text text-danger">{{ $message }}</span>

                                            @enderror
                                            <div class="row" id="preview_img"></div>
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
                                                    required placeholder="Textarea text"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_descp_ban" id="short_descp_ban"
                                                    class="form-control" required placeholder="Textarea text"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!--------------------------------------EndRow-------------------------------------->


                                <!------------------------------- Long Description Eng and Bangla--------------------------------------->
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <textarea id="editor1" name="logn_descp_en" rows="10" cols="80">
                                               Long Descriotion English</textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <textarea id="editor2" name="logn_descp_ban" rows="10" cols="80">
                                            Long Descriotion Bangla</textarea>

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
                                                    <input type="checkbox" id="hot_deals" value="1" name="hot_deals">
                                                    <label for="hot_deals">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="features" value="1" name="features">
                                                    <label for="features">Features</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="special_offer" value="1"
                                                        name="special_offer">
                                                    <label for="special_offer">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="special_deals" value="1"
                                                        name="special_deals">
                                                    <label for="special_deals">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Add Product</button>
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
                            url: "{{ url('subsubcategory/find/formsubcategory') }}/" + subcategory_id,
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
                    }else{
                        alert('danger');
                    }

                });

            });
        </script>

        <script>

                function MainThumbUrl(inp) {
                    if(inp.files && inp.files[0]){
                        var reader =new FileReader();
                        reader.onload= function(e){

                        $('#mainthmb').attr('src',e.target.result).width(75).height(75);
                       
                        };
                        reader.readAsDataURL(inp.files[0]);
                    }
                } 

              
        </script>

        <script type="text/javascript">
          
          $(document).ready(function(){
           
   $('#multi_img').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

        </script>
        
    
    

    </div>


@endsection
