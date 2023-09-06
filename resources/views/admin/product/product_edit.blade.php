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
                            <form action="{{ route('product.update') }}" method="POST">
                                @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" class="form-control"
                                                            value="{{ $product->product_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product color <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color" class="form-control"
                                                            value="{{ $product->product_color}}" data-role="tagsinput" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                                                    </div>
                                                </div>
                                                @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                <div class="text-xs-right">
                                    <input type="submit" name="" class="btn btn-rounded btn-primary mb-5"
                                        value=" Product Update">
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
        <!-- start multiple image section-->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title"> Product Multiple Image <strong>Update</strong></h4>
                        </div>
                        <form method="Post" action="{{ route('update-product-img') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach ($multimges as $img)
                                    <div class="col-md-3">
                                        <div class="card" style="">
                                            <img class="card-img-top" src="{{ $img->multiImage($img->photo_name) }}"
                                                style="width:210px; height:130px;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('product.multiimg.delete', Crypt::encrypt($img->id)) }}"
                                                        class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i
                                                            class="fa fa-trash"></i></a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image<span
                                                            class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file"
                                                        name="multi_img[{{ Crypt::encrypt($img->id) }}]">
                                                </div>
                                                </p>
                                            </div>
                                        </div> <!-- end of multiple image-->




                                    </div> <!-- end of row-->
                                @endforeach

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value=" Imge Update">
                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <!--end of row -->
        </section>
        <!-- end multiple image update section-->



        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title"> Product Thumbnil Image <strong>Update</strong></h4>
                        </div>
                        <form method="Post" action="{{ route('update-product-thumbnil') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="old_image" value="{{ $product->product_thambnail }}">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <div class="card" style="">
                                        <img class="card-img-top" src="{{ $product->thumbnil($product->product_thambnail) }}"
                                            style="width:210px; height:130px;">
                                        <div class="card-body">

                                            <p class="card-text">
                                            <div class="form-group">
                                                <h5>Main Thambnil<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="product_thambnail" class="form-control"
                                                        onChange="mainThamUrl(this)">
                                                </div>
                                            </div>
                                            @error('product_thambnail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <img src="" id="mainThmb">
                                            </p>
                                        </div>
                                    </div> <!-- end of single image-->
                                </div> <!-- end of row-->



                            </div>
                            <div class="text-xs-right">
                                <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value=" Imge Update">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!--end of row -->
        </section>

    </div>

    <script type="text/javascript">

    </script>
    {{-- //for singale  imaeg --}}
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{-- //for multiple image --}}
    {{-- multiimage --}}
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                    img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    {{-- end of multiImg --}}
@endsection
