@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Data</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product picture</th>
                                        <th>Product ENG</th>
                                        <th>Product price</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $data)
                                        <tr>
                                            <td><img src="{{ asset($data->product_thumbnail) }}" style="width: 50px; height:60px;" ></td>
                                            <td>{{ $data->product_name_en }}</td>
                                            <td>{{ $data->selling_price }}</td>
                                            <td>{{ $data->product_qty }}</td>
                                            <th>@if($data->discount_price)
                                                @php
                                                   $discount= round(($data->discount_price/$data->selling_price)*100); 
                                                   
                                                @endphp
                                                   {{  $discount."%" }} 

                                                @else{{ 'No Discount Available' }}
                                                
                                            @endif
                                        </th>
                                            <td>
                                                @if($data->status==1)
                                                  <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>    
                                                @endif
                                            </td>
                                            <td width="26%">
                                                <a href="" class="btn btn-info" title="View"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('product.edit',$data->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                                @if($data->status==1)
                                                <a href="{{route('makeinactive',$data->id)}}" class="btn btn-danger" id="pactive" title="In-Active"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                <a href="{{ route('makeactive',$data->id) }}" class="btn btn-danger" id="pinactive" title="Active"><i class="fa fa-arrow-up"></i></a>   
                                                @endif
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

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection