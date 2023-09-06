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
                            <form action="{{ route('user.product.store') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Select Product <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="product_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Product
                                                            </option>
                                                            @foreach ($product as $product)
                                                                <option value="{{ Crypt::encrypt($product->id) }}">
                                                                    {{ $product->product_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('product_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="price" class="form-control" id="product_seling_price">
                                                    </div>
                                                </div>
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Select User <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="user_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select User
                                                            </option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ Crypt::encrypt($user->id) }}">
                                                                    {{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('user_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value="Submit">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="product_id"]').on('change', function() {
                var product_id= $(this).val();
                if (product_id) {
                    $.ajax({
                        url: "{{ url('/User/product/ajax') }}/" + product_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // when product change price should be empty
                            $('#product_seling_price').val('');
                            //end
                              let price =data.selling_price
                              $('#product_seling_price').val(price)
                        },
                    });
                } else {
                    alert('danger');
                }
            });



        });
    </script>

@endsection
