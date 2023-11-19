@extends('client.templates.layout')
@section('main')
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Result search "{{$search}}"</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- Latest Products Start -->
<section class="latest-product-area ">
    <div class="container">
        <div class="row product-btn d-flex justify-content-between">
                {{-- <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Featured</a>
                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Offer</a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
                <div class="select-this d-flex">
                    <div class="featured">
                        <span>Short by: </span>
                    </div>
                    <form action="#">
                        <div class="select-itms">
                            <select name="select" id="select1">
                                <option value="">Featured</option>
                                <option value="">Featured A</option>
                                <option value="">Featured B</option>
                                <option value="">Featured C</option>
                            </select>
                        </div>
                    </form>
                </div> --}}
        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach ($book as $item)


                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-product mb-60">
                            <div class="product-img">
                                <a href="{{route('client.detail',$item->id)}}"><img src="{{ $item->image ? ''.Storage::url($item->image) : ''}}" alt=""></a>

                            </div>
                            <div class="product-caption">

                                <h4>{{$item->title}}</h4>
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
        <!-- End Nav Card -->
    </div>
</section>
@endsection
