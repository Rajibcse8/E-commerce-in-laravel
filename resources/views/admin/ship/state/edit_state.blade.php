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
				  <h3 class="box-title">Edit State </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('state.update',$states->id) }}" >
	 	@csrf


	 <div class="form-group">
		<h5>State  Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="state_name" class="form-control" value="{{ $states->state_name }}" required> 

     @error('state_name')
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
                   <option value="{{ $division->id }}" {{ $division->id == $states->division_id ? 'selected' : ''}} >{{ $division->division_name }}</option>
                  
               @endforeach
             
         </select>        
         @error('division_name')
              <span class="text-danger">{{ $message }}</span>
         @enderror                            
    </div>
    </div>


	<div class="form-froup">
        <h5>District Name <span class="text-danger">*</span> </h5>
        <div class="controls">
           <select name="district_id" id="" class="form-control" required>
                <option value="" >Selcet District Name</option>

               @foreach ($districts as $district)
                   <option value="{{ $district->id }}" {{ $district->id == $states->district_id ? 'selected' : ''}} >{{ $district->district_name }}</option>
                  
               @endforeach
             
         </select>        
         @error('district_name')
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