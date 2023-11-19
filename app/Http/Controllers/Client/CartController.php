<?php

namespace App\Http\Controllers\Client;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
	//
	public function index()
	{
		return view('client.cart');
	}
	public function create(Request $request)
	{

		$book_id = $request->book_id;
		$book = book::find($book_id);
		if ($book->quantity < $request->quantity) {
			return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ');
		}
		$cart = session()->get('cart');
		$promotion = DB::table('promotions')->where('id', $book->promotion_id)->first();
		if (!$cart) {
			$cart = [
				$book_id => [
					"title" => $book->title,
					"price" => $book->price,
					"image" => $book->image,
					"quantity" => $request->quantity ?? 1,
					"discount" => 0,
				]
			];

			if ($book->promotion_id != null && $promotion) {

				$currentDate = now();
				$checkDate = $currentDate->between($promotion->start_date, $promotion->end_date);
				if ($checkDate) {
					$cart[$book_id]['discount'] = $promotion->discount;
				}
			}
			session()->put('cart', $cart);
		} else {

			if (isset($cart[$book_id])) {
				$cart[$book_id]['quantity'] += $request->quantity ?? 1;
			} else {

				$cart[$book_id] = [
					"title" => $book->title,
					"price" => $book->price,
					"image" => $book->image,
					"quantity" => $request->quantity ?? 1,
					"discount" => 0,
				];
				if ($book->promotion_id != null && $promotion) {
					$currentDate = now();
					$checkDate = $currentDate->between($promotion->start_date, $promotion->end_date);
					if ($checkDate) {
						$cart[$book_id]['discount'] = $promotion->discount;
					}
				}
			}

			session()->put('cart', $cart);
		}
		return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
	}
	public function update(Request $request)
	{
		if($request->quantities == null || $request->book_ids == null) {
			return redirect()->back()->with('error', 'Cập nhật giỏ hàng thất bại!');
		}
		$quantities = $request->quantities;
		$book_ids = $request->book_ids;
		$cart = session()->get('cart');

		foreach ($book_ids as $key => $id) {

			$book = book::select('id', 'quantity')->where('id', $id)->first();

			if ($book->quantity < $quantities[$key]) {
				return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ, có vẻ như có người khác đã nhanh hơn, hãy kiểm tra xem còn bao nhiêu sản phẩm trong kho ở trang chi tiết');
			}
			$cart[$id]['quantity'] = $quantities[$key];
		}
		session()->put('cart', $cart);

		return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
	}
	public function destroy($id)
	{
		$cart = session()->get('cart');
		if (isset($cart[$id])) {
			unset($cart[$id]);
		}
		session()->put('cart', $cart);

		return redirect()->back()->with('success', 'Đã xóa sản phẩm');
	}
	public function destroyAll()
	{
		session()->forget('cart');
		return redirect()->back()->with('success', 'Đã xóa tất cả sản phẩm');
	}
}
