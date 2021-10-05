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
                                        <th>Product Name ENG</th>
                                        <th>Product Name BAN</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $data)
                                        <tr>
                                            <td><img src="{{ asset($data->product_thumbnail) }}" style="width: 50px; height:60px;" ></td>
                                            <td>{{ $data->product_name_en }}</td>
                                            <td>{{ $data->product_name_ban }}</td>
                                            <td>{{ $data->product_qty }}</td>
                                            <td>
                                                <a href="{{ route('product.edit',$data->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
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

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection