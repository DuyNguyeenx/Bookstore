@extends('client.templates.layout')
@section('title', 'Chi tiết sản phẩm')
@section('css')
    <style>
        .fa-star {
            color: #ccc;
        }

        .fa-star.active {
            color: #ffc107;
        }
    </style>
@endsection
@section('main')
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>{{$book->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================Single Product Area =================-->
<div class="">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12 mb-5">
      <div class="product_img_slide owl-carousel">
        <div class="single_product_img">
          <img src="{{ $book->image ? ''. Storage::url($book->image) : ''}}" alt="#" class="img-fluid">
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="single_product_text text-center">

<h3>Tác giả: {{$book->author->name}}</h4>

<h4>Thể loại: {{$book->genre->name}}</h4>
<h4>
    Số lượng: {{$book->quantity}}
</h4>
        <h4>
            Mô tả: {{$book->description}}
        </h4>

        <div class="card_area">
            @component('templates.form', [
                'method' => 'post',
                'action' => route('client.cart.create'),
                'enctype' => 'multipart/form-data',
                'textButton' => 'Thêm vào giỏ hàng',
                'buttonClass' => 'btn',
            ])
                @include('templates.input', [
                    'label' => '',
                    'type' => 'hidden',
                    'name' => 'book_id',
                    'value' => $book->id,
                ])
                 @php
                 $amount = $book->price; // Số tiền cần hiển thị
                 $formattedAmount = number_format($amount, 0, ',', '.'); // Định dạng số tiền
             @endphp
<h4>Giá: {{$formattedAmount}} đ</h4>
            <div class="product_count_area">

                <p>Quantity</p>
                <div class="product_count d-inline-block mb-3">
                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                    <input class="product_count_item input-number" type="text" value="1" min="0" max="10" name="quantity">
                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                </div>
            </div>
          @endcomponent
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4 >Sản phẩm liên quan</h4>
            </div>
            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                <div class="row ">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="col-lg-3 col-md-4 mb-4">
                            @include('templates.product_card', ['book' => $relatedProduct])
                        </div>
                    @endforeach
                </div>
            </div>


            <section style="background-color: #eee;">
                    <h4 class="mt-5 p-3">Bình luận</h4>
                <div class="container  py-5">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                      <div class="card">
                        @foreach ($ratings as $rating)
                        <div class="card-body">
                          <div class="d-flex flex-start align-items-center">

                            <div>
                              <h6 class="fw-bold text-primary mb-1">{{ $rating->user_name }}</h6>
                              <p class="text-muted small mb-0">

                                    {{ formatDate($rating->created_at) }}
                                </p>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($rating->rating >= $i)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-warning"></i>
                                    @endif
                                @endfor

                            </div>
                          </div>

                          <p class="mt-3 mb-4 pb-2">
                            {{ $rating->comment }}
                          </p>


                        </div>
                        @endforeach
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                          <div class="d-flex flex-start w-100">
                            @component('templates.form', [
                                'method' => 'POST',
                                'action' => route('client.rating.store'),
                                'textButton' => 'gửi',
                            ])
                            <div class="form-outline w-100">
                                <h3>Đánh giá</h3>
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <div class="rating mb-2">
                                    <input type="radio" hidden name="rating" id="star1" value="1"><i
                                        for="star1" class="fa-solid fa-star" data-index="1"></i>
                                    <input type="radio" hidden name="rating" id="star2" value="2"><i
                                        for="star2" class="fa-solid fa-star" data-index="2"></i>
                                    <input type="radio" hidden name="rating" id="star3" value="3"><i
                                        for="star3" class="fa-solid fa-star" data-index="3"></i>
                                    <input type="radio" hidden name="rating" id="star4" value="4"><i
                                        for="star4" class="fa-solid fa-star" data-index="4"></i>
                                    <input type="radio" hidden name="rating" id="star5" value="5"><i
                                        for="star5" class="fa-solid fa-star" data-index="5"></i>
                                </div>
                                @include('templates.textarea', [
                                    'name' => 'comment',
                                    'value' => old('comment'),
                                ])
 @endcomponent
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>


        </div>
    @endsection
    @section('script_footer')
        <script>
            const stars = document.querySelectorAll('.fa-star');

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    // get input previous

                    let currentIndex = parseInt(star.dataset.index);

                    stars.forEach(star => {
                        if (parseInt(star.dataset.index) <= currentIndex) {
                            star.classList.add('active');
                        } else {
                            star.classList.remove('active');
                        }

                    });
                    stars.forEach((star, index) => {
                        if (index < currentIndex) {
                            document.querySelector(`#star${index+1}`).checked = true;
                        } else {
                            document.querySelector(`#star${index+1}`).checked = false;
                        }
                    });
                });
            });
        </script>
    @endsection
