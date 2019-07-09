<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	public function orders() {
		return $this->hasMany(OrdersProduct::class, 'order_id', 'id');
	}
	// public function products() {
	// 	return $this->belongsToMany('Models\App\Product')->withPivot('quantity');
	// }

}
