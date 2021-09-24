@extends('admin.admin_master')
@section('admin')

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
                                                    <option value="" selected="" disabled>Select Brand</option>
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
                                                <input type="file" name="product_thumbnail" class="form-control" >
                                            </div>
                                            @error('product_thumbnail')
                                            <span class="text text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Multiple Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="multi_img[]" class="form-control" >
                                            </div>
                                            @error('multi_img')
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
                                                <textarea name="short_descp_en" id="short_descp_en" class="form-control" required
                                                    placeholder="Textarea text"></textarea>
                                            </div>
                                        </div>

                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_descp_ban" id="short_descp_ban" class="form-control" required
                                                    placeholder="Textarea text"></textarea>
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
                                        This is my textarea to be replaced with CKEditor</textarea>
                                    
                                  </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                 
                                  <textarea id="editor2" name="logn_descp_ban" rows="10" cols="80">
                                      This is my textarea to be replaced with CKEditor</textarea>
                                  
                                </div>
                            </div>

                           </div>

                          <!--------------------------------------EndRow-------------------------------------->
         
                          
                          
                          
                            <div class="row">

                                        <div class="col-12">

                                            <div class="form-group">
                                                <h5>Email Field <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>

                                          
                                        </div>
                                    </div>



                                    <div class="row">

                                        <div class="col-12">

                                          
                                            <div class="form-group">
                                                <h5>Textarea <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="textarea" id="textarea" class="form-control" required
                                                        placeholder="Textarea text"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Checkbox <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="checkbox" id="checkbox_1" required value="single">
                                                    <label for="checkbox_1">Check this custom checkbox</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" required value="x">
                                                        <label for="checkbox_2">I am unchecked Checkbox</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" value="y">
                                                        <label for="checkbox_3">I am unchecked too</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
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
    </div>


@endsection
