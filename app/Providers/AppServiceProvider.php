<?php

namespace App\Providers;

use Cart;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Schema::defaultStringLength(191);

		// 	view()->composer('layout.Pagination_f.header', function ($view) {
		// 		if (Session('cart')) {
		// 			$oldCart = Session::get('cart');
		// 			$cart = new Cart($oldCart);
		// 			$view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
		// 		}
		// 	});
		view()->composer('Frontend.cart.list', function ($view) {
			$data = Cart::getContent();
			$view->with(['cart' => $data]);
		});

	}
}
