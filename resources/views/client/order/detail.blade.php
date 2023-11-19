@extends('client.templates.layout')
@section('title', 'Chi tiết đơn hàng')
@section('main')
<div class="container-fluid py-5">
  <h1 class="text-center fs-2 fw-bold mb-5">Hóa đơn chi tiết</h1>
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr class="bg-success text-white">
        <th scope="col">#</th>
        <th scope="col">Sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Tổng</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($order_details as $key => $order_detail)
      <tr>
        <td scope="row">{{$order_detail->id}}</td>
        <td>{{$order_detail->book->title}}</td>
        <td>{{$order_detail->price}}</td>
        <td>{{$order_detail->quantity}}</td>
        <td>{{formatNumberPrice($order_detail->total)}}</td>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
      <tr class="bg-success text-white">
        <th colspan="4" class="text-right">Tổng tiền:</th>
        <td>{{formatNumberPrice($order->total_amount)}}</td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
