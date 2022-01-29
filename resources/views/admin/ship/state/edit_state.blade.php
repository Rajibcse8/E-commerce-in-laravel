@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">






<!--   ------------ Add Coupon Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit District </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('district.update',$districts->id) }}" >
	 	@csrf


	 <div class="form-group">
		<h5>State  Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="district_name" class="form-control" value="{{ $districts->district_name }}" required> 

     @error('division_name')
     <span class="text-danger">{{ $message  }}</span>
     @enderror

	</div>
	</div>

    <div class="form-froup">
        <h5>Division Name <span class="text-danger">*</span> </h5>
        <div class="controls">
           <select name="division_id" id="" class="form-control" required>
                <option value="" >Selcet Division Name</option>

               @foreach ($divisions as $division)
                   <option value="{{ $division->id }}" {{ $division->id == $districts->division_id ? 'selected' : ''}} >{{ $division->division_name }}</option>
                  
               @endforeach
             
         </select>        
         @error('division_name')
              <span class="text-danger">{{ $message }}</span>
         @enderror                            
    </div>
    </div>






	 <div class="text-xs-right">
       	   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					
	</div>
		
</form>



</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>




		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection 