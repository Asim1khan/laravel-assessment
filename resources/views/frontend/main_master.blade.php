<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
{{-- //toster link --}}


<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!--strip link for card number-->
<script src="https://js.stripe.com/v3/"></script>
<!--End strip link for card number-->

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
     @include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
            @yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
   @include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script type="{{ asset('frontend/text/javascript') }}" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
  <!--swwet alert message-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--end of swwet alert message-->

{{-- //toster --}}
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
       @if(Session::has('message'))
         var type ="{{ Session::get('alert-type','info') }}"
         switch(type)
         {
             case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
             case 'success':
             toastr.success("{{ Session::get('message') }}");
              break;
              case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;

              case 'error' :
              toastr.error("{{ Session::get('message') }}");
              break;

         }
         @endif
     </script>
     {{-- add to card --}}
     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodel">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
               <div class="row">
                  <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="..." style="height:200px; width:200px;" id="pimage">
                      </div>
                  </div><!--end of col-1-->
                  <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">Product Price:<strong class="text-danger">$<span id="pprice"></span>
                        </strong>
                        <del id="oldprice">$</del>
                        </li>
                        <li class="list-group-item">Product Code:<strong id="pcode"></strong></li>
                        <li class="list-group-item">Category:<strong id="pcategory"></strong></li>
                        <li class="list-group-item">Brand:<strong id="pbrand"></strong></li>
                        <li class="list-group-item">Stock:<span class="badge badge-pill badge-success" id="aviable" style="background:green; color:white"></span>
                            <span class="badge badge-pill badge-success" id="stockout" style="background:red; color:white"></span>
                        </li>
                      </ul>
                  </div><!--end of col-2-->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="color">Chose Color</label>
                        <select class="form-control" id="color" name="color">
                        </select>
                      </div>

                      <!--end form group-->
                      <div class="form-group" id="sizeArea">
                        <label for="size">Chose size</label>
                        <select class="form-control"  id="size" name="size">
                        </select>
                      </div>

                      <!--end form group-->

                      <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control"  id="qty" value="1" min="1">
                      </div>
                      <!--end form group-->
                      <input type="hidden" id="product_id">

                      <button type="submit" class="btn btn-primary mb-2"   id="addtocart" >Add to Cart</button>
                  </div>
                    <!--end of col-3-->
               </div><!--end of row-->
        </div>

      </div>
    </div>
  </div>
     {{-- end of add to card --}}





</body>
</html>
