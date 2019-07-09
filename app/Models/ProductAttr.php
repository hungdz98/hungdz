<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model {
	protected $table = 'productatt';
	protected $primaryKey = 'id';
	protected $fillable = ['products_id', 'sku', 'size', 'stock'];
	public function ProductAttr() {
		return $this->belongsToMany(Product::class, 'product_id', 'id');
	}
}
