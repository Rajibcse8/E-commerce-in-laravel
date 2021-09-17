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
				  <h3 class="box-title">Brand Data</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand ENG</th>
								<th>Brand Ban</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($brands as $data )
                            <tr>
								<td>{{ $data->brand_name_eng }}</td>
								<td>{{ $data->brnad_name_ban }}</td>
								<td><img src="{{ asset($data->brand_image) }}" style="width:70px;height:50px;" alt=""></td>
								<td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
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
                     <h3 class="box-title">Add Brand Data</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                            @csrf
                               
                                   
                                    
                                            <div class="form-group">
                                                <h5>Brand Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="brnad_name_eng" class="form-control" id="brnad_name_eng" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Brnad Name bangla<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="brnad_name_ban" class="form-control"id="brnad_name_ban"  required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Brnad Image:<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="brand_image" class="form-control" id="brand_image" required>
                                                </div>
                                            </div>
                      

                                 
                               

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Brand">
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