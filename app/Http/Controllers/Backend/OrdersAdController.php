<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;

class OrdersAdController extends Controller {
	public function viewOrders() {
		$menu_active = 5;
		$orders = Order::with('orders')->orderBy('id', 'DESC')->get();
		//dd($orders);
		return view('Backend.Orders.view_orders')->with(compact('orders', 'menu_active'));
	}
	public function viewOrderDetails($order_id) {
		$menu_active = 5;
		$orderDetails = Order::with('orders')->where('id', $order_id)->first();
		$user_id = $orderDetails->user_id;
		$userDetails = User::where('id', $user_id)->first();

		return view('Backend.Orders.order_details')->with(compact('orderDetails', 'userDetails', 'menu_active'));
	}
	public function updateOrderStatus(Request $request) {
		$menu_active = 5;
		if ($request->isMethod('post')) {
			$data = $request->all();
		}
		Order::where('id', $data['order_id'])->update(['order_status' => $data['order_status']]);
		return redirect()->back()->with('message', 'Order Status has been Updated Successfully!', 'menu_active');
	}
}
