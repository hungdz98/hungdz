<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $table = 'products';
	protected $primaryKey = 'id';
	protected $fillable = ['categories_id', 'name', 'color', 'description', 'price', 'sale', 'image', 'status'];

	public function category() {
		return $this->belongsTo(Category::class, 'categories_id', 'id');
	}
	public function attributes() {
		return $this->hasMany(ProductAttr::class, 'products_id', 'id');
	}
}
