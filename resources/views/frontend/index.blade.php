@extends('frontend.main_master')
@section('content')
@section('title')
    Easy lerning
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                {{-- @include('frontend.common.vertical_menue') --}}
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->
                {{-- @include('frontend.common.hot_deals') --}}


            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->



                <!-- ========================================= SECTION – HERO : END ========================================= -->


                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

                            <li class="active"><a data-transition-type="backSlide" href="#all"
                                    data-toggle="tab">All</a></li>

                            {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
                               <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
                        </ul>
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                    </div>
                                                    <div class="product-info text-left">
                                                        <h3 class="name">

                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">


                                </div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button data-toggle="tooltip" class="btn btn-primary icon"
                                                    type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart</button>
                                            </li>
                                            <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                    class="add-to-cart" href="detail.html" title="Wishlist"> <i
                                                        class="icon fa fa-heart"></i> </a> </li>
                                            <li class="lnk"> <a data-toggle="tooltip"
                                                    class="add-to-cart" href="detail.html" title="Compare"> <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</div>
</div>


</div>
</div>

<div class="wide-banners wow fadeInUp outer-bottom-xs">
    <div class="row">
        <div class="col-md-7 col-sm-7">
            <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive"
                        src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
            </div>
            <!-- /.wide-banner -->
        </div>
        <!-- /.col -->
        <div class="col-md-5 col-sm-5">
            <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive"
                        src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
            </div>
            <!-- /.wide-banner -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>


<div class="best-deal wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Best seller</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                    @if($products)
                    @foreach ($products as $product)

                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{ $product->thumbnil($product->product_thambnail)}}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">{{ $product->product_name?? '' }}</a></h3>
                                        <div class="rating rateit-small"></div>
                                        @if (auth()->check())
                                        @php
                                        $specialPrice = $product->getSpecialPriceForClient($product->id ,auth()->user()->id);
                                    @endphp
                                            @if ($specialPrice)
                                            <div class="product-price"> <span class="price"> ${{ $specialPrice }} </span>
                                            </div>
                                     @else
                                     <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>
                                     </div>
                                     @endif
                                      @else
                                        <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>
                                        </div>
                                        @endif
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>

                    </div>
                    @endforeach
                    @else


              <div class="item">
                <div class="products best-product">
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="#"> <img
                                                    src="{{ asset('frontend/assets/images/products/p20.jpg') }}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{ asset('frontend/assets/images/products/p21.jpg') }}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="products best-product">
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{ asset('frontend/assets/images/products/p24.jpg') }}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{ asset('frontend/assets/images/products/p25.jpg') }}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="products best-product">
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{ asset('frontend/assets/images/products/p26.jpg') }}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{ asset('frontend/assets/images/products/p27.jpg') }}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== BEST SELLER : END ============================================== -->

<!-- ============================================== BLOG SLIDER ============================================== -->

<!-- /.section -->
<!-- ============================================== BLOG SLIDER : END ============================================== -->

<!-- ============================================== FEATURED PRODUCTS ============================================== -->

<!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

</div>
<!-- /.homebanner-holder -->
<!-- ============================================== CONTENT : END ============================================== -->
</div>
<!-- /.row -->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <div class="item m-t-15"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand1.png') }}"
                        src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->

            <div class="item m-t-10"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand2.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand3.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand4.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand5.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand6.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand2.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand4.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="assets/images/brands/brand1.png"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->

            <div class="item"> <a href="#" class="image"> <img
                        data-echo="{{ asset('frontend/assets/images/brands/brand5.png') }}"
                        src="{{ asset('frontend/assets/images/blank.gif') }}" alt=""> </a> </div>
            <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->

</div>
<!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
</div>
<!-- /.container -->
</div>
@endsection
