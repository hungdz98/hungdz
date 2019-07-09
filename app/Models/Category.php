<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'categories';
	protected $primaryKey = 'id';
	protected $fillable = ['parent_id', 'name', 'description', 'status'];
	public function product() {
		return $this->hasMany(Product::class, 'categories_id', 'id');
	}
	public function categories() {
		return $this->hasMany('App\Models\Category', 'parent_id');
	}
}
