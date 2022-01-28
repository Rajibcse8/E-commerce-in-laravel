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
                            <h3 class="box-title">Shipping-State</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>State Name</th>
                                            <th>Division Name</th>
                                            <th>District Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($states as $data)
                                            <tr><td><span><i class="">{{ $data->state_name }}</i></span></td>
                                                <td><span><i class="">{{ $data->division_id }}</i></span></td>
                                                <td><span><i class="">{{ $data->district_id}}</i></span></td>
                    
                                                <td>
                                                    <a href="{{--  --}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{--  --}}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Add Shipping State</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="Post" action="{{ route('ship.store') }}" >
                                  
                                   @csrf


                                    <div class="form-group">
                                        <h5>State Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="state_name" class="form-control"
                                                id="" required>
                                       </div>
                                        @error('state_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> 


                                    <div class="form-froup">
                                        <h5>Division Name <span class="text-danger">*</span> </h5>
                                        <div class="controls">
                                           <select name="division_id" id="" class="form-control" required>
                                                <option value="" >Selcet Division Name</option>

                                               @foreach ($divisions as $division)
                                                   <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                                  
                                               @endforeach
                                             
                                         </select>        
                                         @error('division_id')
                                              <span class="text-danger">{{ $messag  }}</span>
                                         @enderror                            
                                    </div>
                                    </div>


                                    <div class="form-froup">
                                        <h5>District Name <span class="text-danger">*</span> </h5>
                                        <div class="controls">
                                           <select name="district_id" id="" class="form-control" required>
                                                <option value="" >Selcet District Name</option>

                                               @foreach ($districts as $district)
                                                   <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                                  
                                               @endforeach
                                             
                                         </select>        
                                         @error('district_id')
                                              <span class="text-danger">{{ $messag  }}</span>
                                         @enderror                            
                                    </div>
                                    </div>


                                   
                                   
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add State">
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
