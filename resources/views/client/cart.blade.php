@extends('client.templates.layout')

@section('main')
@component('templates.form', [
                    'method' => 'POST',
                    'action' => route('client.cart.update'),
                    'textButton' => 'Cập nhật giỏ hàng',
                    'buttonClass' => 'btn',
                ])
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


<section class="cart_area ">

    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="" scope="col">Sản phẩm</th>
                <th class="" scope="col">Giá</th>
                <th class="" scope="col">Số lượng</th>
                <th class="" scope="col">Thành tiền</th>
                {{-- <th class="" scope="col">Action</th> --}}
              </tr>
            </thead>
            <tbody>
                @if (!empty(session('cart')))
                                @php
                                    $total = 0;
                                @endphp
                                @foreach (session('cart') as $key => $item)
                                    @php
                                        $total += ($item['price'] - intval($item['discount'])) * $item['quantity'];
                                    @endphp
                                    <input type="hidden" name="book_ids[]" value="{{ $key }}">
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                        <img src="{{ $item['image'] ? ''. Storage::url($item['image']) : '' }}" alt="" width="100">
                    </div>
                    <div class="media-body">
                      <p>{{ $item['title'] }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>{{ formatNumberPrice($item['price'] - intval($item['discount'])) }}</h5>
                </td>
                <td>
                    <div class="product_count">
                        <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                        <input class="input-number" name="quantities[]" type="text" value="{{ $item['quantity'] }}" min="1" max="10">
                        <span class="input-number-increment"> <i class="ti-plus"></i></span>
                    </div>
                </td>
                <td>
                    <div class="media">
                        <div class="d-flex px-3">
                            <h5>{{ formatNumberPrice(($item['price'] - intval($item['discount'])) * $item['quantity']) }}</h5>
                        </div>
                        <div class="d-flex px-2 media-body">
                            <a href="{{ route('client.detail', $key) }}" class="btn py-2 px-3"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('client.cart.delete', $key) }}" class="btn py-2 px-3 mx-2"><i
                                class="fa-solid fa-trash"></i></a>
                        </div>
                      </div>

                </td>


              </tr>
              @endforeach
                            @endif
              <tr class="bottom_button">
                <td>
                 @endcomponent
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="{{ route('client.cart.deleteAll') }}">Xóa tất cả</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Tổng tiền</h5>
                </td>
                <td>
                  <h5>{{ formatNumberPrice($total ?? 0) }}</h5>
                </td>
              </tr>

            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{ route('client.home')}}">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="@if (!empty(session('cart'))) {{ route('client.order.index') }} @endif">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>



@endsection
