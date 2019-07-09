<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\User;
use Auth;
use Cart;
use DB;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller {
	public function getCheckout(Request $request) {
		if (Auth::check()) {
			$user_id = Auth::user()->id;
			$user_email = Auth::user()->email;
			$userDetails = User::find($user_id);
			return view('Frontend.Order.ckeckout')->with(compact('userDetails'));
		} else {
			return redirect()->route('dangnhap');
		}

	}

	public function postCheckout(Request $request) {
		// $user_id = Auth::user()->id;
		// $user_email = Auth::user()->email;
		// $userDetails = User::find($user_id);
		//dd(Cart::isEmpty());
		if (Cart::session(auth()->user()->id)->isEmpty() == true) {
			return redirect()->route('frontend.home.index');
		}
		$data = $request->all();
		//dd($data = $request->all());
		//echo "<pre>";print_r($data);die;
		//Return to checkout page if any field is empty
		if (empty($data['billing_name'])
			|| empty($data['billing_email'])
			|| empty($data['billing_address'])
			|| empty($data['billing_mobile'])
		) {
			return redirect()->back()->with('success_message', 'Vui lòng điền đầy đủ thông tin để tiếp tục!!');
		}

		$order = new Order;
		$order->user_id = $data['user_id'];
		$order->user_email = $data['billing_email'];
		$order->name = $data['billing_name'];
		$order->address = $data['billing_address'];
		$order->mobile = $data['billing_mobile'];
		$order->order_status = "New";
		$order->payment_method = $data['payment_method'];
		$order->grand_total = $data['total'];
		$order->save();
		$order_id = DB::getPdo()->lastInsertId();

		$cartProducts = Cart::session(auth()->user()->id)->getContent();
		//dd($cartProducts);
		foreach ($cartProducts as $pro) {
			$cartPro = new OrdersProduct;
			$cartPro->order_id = $order_id;

			$cartPro->product_id = $pro->id;
			$cartPro->product_name = $pro->name;
			$cartPro->product_color = $pro->attributes->color;
			$cartPro->product_size = $pro->attributes->size;
			$cartPro->product_price = $pro->price;
			$cartPro->product_qty = $pro->quantity;
			$cartPro->save();

		}
		Session::put('order_id', $order_id);
		Session::put('total', $data['total']);

		if ($data['payment_method'] == "COD") {
			return redirect('/thanks');
		} else {

			return redirect('/atm');
		}
	}
	public function thanks(Request $request) {
		Cart::session(auth()->user()->id)->clear();
		return view('Frontend.Order.thank');
	}
	public function atm(Request $request) {
		Cart::session(auth()->user()->id)->clear();
		return view('Frontend.Order.atm');
	}
	public function userOrders() {
		$user_id = Auth::user()->id;
		$orders = Order::with('orders')->where('user_id', $user_id)->orderBy('id', 'DESC')->get();

		return view('Frontend.Order.user_orders')->with(compact('orders'));
	}
	public function userOrderDetails($order_id) {
		$user_id = Auth::user()->id;
		$orderDetails = Order::with('orders')->where('id', $order_id)->first();
		// $orderDetails = json_decode(json_encode($orderDetails));
		// //echo "<pre>";print_r($orderDetails);die;
		return view('Frontend.Order.user_order_details')->with(compact('orderDetails'));
	}

}
