@extends('client.templates.layout')

@section('main')


<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height" data-background="{{asset('client/assets/img/banner_sach.png')}}">

        </div>

    </div>
</div>

<!-- slider Area End-->
<!-- Category Area Start-->
<section class="category-area section-padding">
    <div class="container-fluid">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-80">
                    <h2>Các thể loại sách</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($genres as $item)
            <div class="mb-5 col-xl-3 col-lg-6 ">
                <div class="single-category ">
                    <div class="category-img">
                        <img src="assets/img/categori/cat1.jpg" alt="">
                        <div class="category-caption">
                            <h2>{{$item->name}}</h2>
                            <span class="best"><a href="{{ route('client.genre',$item->id)}}">Xem chi tiết</a></span>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Category Area End-->
<!-- Latest Products Start -->
<section class="latest-product-area padding-bottom">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <!-- Section Tittle -->
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="section-tittle mb-30">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">

            </div>
        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach ($books_promiment as $item)


                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('client.detail',$item->id)}}"><img src="{{ $item->image ? ''.Storage::url($item->image) : ''}}" alt=""></a>
                            </div>
                            <div class="product-caption">
                                <h3>{{$item->title}} </h3>
                                <div class="price">
                                    <ul>
                                        @php
                                        $amount = $item->price; // Số tiền cần hiển thị
                                        $formattedAmount = number_format($amount, 0, ',', '.'); // Định dạng số tiền
                                    @endphp
                                        <li>Giá: {{$formattedAmount}} đ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- Card two -->

        </div>
        <!-- End Nav Card -->
    </div>
</section>

<div class="latest-wrapper lf-padding">
    <div class="latest-area latest-height d-flex align-items-center" data-background="{{asset('client/assets/img/collection/latest-offer.png')}}">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                    <div class="latest-caption">
                        <h2>Get Our<br>Latest Offers News</h2>
                        <p>Subscribe news latter</p>
                    </div>
                </div>
                 <div class="col-xl-5 col-lg-5 col-md-6 ">
                    <div class="latest-subscribe">
                        <form action="#">
                            <input type="email" placeholder="Your email here">
                            <button>Shop Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- man Shape -->
        <div class="man-shape">
            <img src="assets/img/collection/latest-man.png" alt="">
        </div>
    </div>
</div>
<!-- Latest Offers End -->
<!-- Shop Method Start-->
<div class="shop-method-area section-padding">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method ">
                    <i class="ti-package"></i>
                    <h6>Free Shipping Method</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method">
                    <i class="ti-unlock"></i>
                    <h6>Secure Payment System</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method ">
                    <i class="ti-reload"></i>
                    <h6>Secure Payment System</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Method End-->
<!-- Gallery Start-->
<div class="gallery-wrapper lf-padding">
    <div class="gallery-area">
        <div class="container-fluid">
            <div class="row">
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery1.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery2.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery3.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery4.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery5.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="latest-wrapper lf-padding">
        <div class="latest-area latest-height d-flex align-items-center" data-background="{{asset('client/assets/img/banner2.jpg')}}">
    </div>
<!-- Gallery End-->
@endsection
