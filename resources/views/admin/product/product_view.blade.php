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
                            <h3 class="box-title">All Product <span
                                    class="badge badge-pill badge-danger">{{ count($products) }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name </th>
                                            <th>Prodtuct Price</th>
                                            <th>Product Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><img src="{{ $product->thumbnil($product->product_thambnail) }}"
                                                        style="width: 60px; height:40px;"></td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->selling_price }} $</td>

                                                <td>{{ $product->product_color }}</td>

                                                <td width="30%">
                                                    <a href="{{ route('product.edit', Crypt::encrypt($product->id)) }}"
                                                        class="btn btn-info btn-sm" title="Edit"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('product.delete', Crypt::encrypt($product->id)) }}"
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
