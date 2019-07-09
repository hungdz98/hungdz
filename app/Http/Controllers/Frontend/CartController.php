<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {
	public function index() {
		$userId = auth()->user()->id; // or any string represents user identifier

		$data['items'] = Cart::session($userId)->getContent();
		$data['total'] = Cart::session($userId)->getTotal();
		return view('Frontend.cart.list', $data);
	}
	public function addToCart(Request $request) {

		if (Auth::check()) {
			$userId = auth()->user()->id;
			$inputToCart = $request->all();
			//dd($inputToCart);
			if ($inputToCart['size'] == "") {
				return back()->with('message', 'Xin vui lòng chọn kích cỡ !');
			} else {
				$stockAvailable = DB::table('productatt')->select('stock', 'sku')->where(['products_id' => $inputToCart['products_id']])->first();
				//dd($stockAvailable);
				if ($stockAvailable->stock >= $inputToCart['quantity']) {
					$sizeAtrr = explode("-", $inputToCart['size']);
					$inputToCart['size'] = $sizeAtrr[1];
					$inputToCart['product_code'] = $stockAvailable->sku;
					//dd($stockAvailable->sku);
					Cart::session($userId)->add(array(
						array(
							'id' => $inputToCart['product_code'],
							'name' => $inputToCart['product_name'],
							'price' => $inputToCart['price'],
							'quantity' => $inputToCart['quantity'],
							'attributes' => array(
								'size' => $inputToCart['size'],
								'color' => $inputToCart['product_color'],
								'image' => $inputToCart['product_image'],
							),
						),
					));
					//dd(Cart::getContent());
					return back()->with('message', 'Thêm vào giỏ hàng thành công !');
				} else {
					return back()->with('message', 'Số lượng không có sẵn!');
				}

			}
		} else {
			return redirect()->route('dangnhap');
		}

	}
	public function deleteItem($id) {
		$userId = auth()->user()->id;
		Cart::session($userId)->remove($id);
		return back()->with('message', 'Delete Item Already');
	}
	public function deleteCart() {
		$userId = auth()->user()->id;
		Cart::session($userId)->clear();
		return back()->with('message', 'Delete Cart Already');
	}

	public function updateQuantity($id, $quantity) {
		$userId = auth()->user()->id;
		Cart::session($userId)->update($id, array(
			'quantity' => array(
				'relative' => false,
				'value' => $quantity,
			),
		));
		return back()->with('message', 'Update Already');
	}

}
