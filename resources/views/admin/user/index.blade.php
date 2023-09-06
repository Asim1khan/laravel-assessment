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
                            <h3 class="box-title">User Product <span
                                    class="badge badge-pill badge-danger">{{  count($clientProducts) }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Product Name </th>
                                            <th>Prodtuct Price</th>
                                            <th>Product Color</th>
                                            <th>Product Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                           @foreach ($clientProducts as $data )


                                            <tr>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->product->product_name }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td>{{ $data->product->product_color }}</td>
                                            <td><img src="{{ $data->product?->thumbnil($data->product?->product_thambnail) }}"
                                                style="width: 60px; height:40px;"></td>

                                                <td width="30%">

                                                    <a href="{{ route('user.product.delete', Crypt::encrypt($data->id)) }}"
                                                        class="btn btn-danger btn-sm" id="delete" title="delete"><i
                                                            class="fa fa-trash"></i> </a>

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


                    <!-- /.box -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
