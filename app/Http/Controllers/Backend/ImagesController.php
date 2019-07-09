<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ImagesController extends Controller {

	public function index() {
		//
	}

	public function create() {
		//
	}

	public function store(Request $request) {
		$inputData = $request->all();
		if ($request->file('image')) {
			$images = $request->file('image');
			foreach ($images as $image) {
				if ($image->isValid()) {
					$extension = $image->getClientOriginalExtension();
					$filename = rand(100, 999999) . time() . '.' . $extension;
					$large_image_path = public_path('uploads/products/large/' . $filename);
					$medium_image_path = public_path('uploads/products/medium/' . $filename);
					$small_image_path = public_path('uploads/products/small/' . $filename);
					//// Resize Images
					Image::make($image)->save($large_image_path);
					Image::make($image)->resize(600, 600)->save($medium_image_path);
					Image::make($image)->resize(300, 300)->save($small_image_path);
					$inputData['image'] = $filename;
					Images::create($inputData);
				}
			}
		}
		return back()->with('message', 'Add Images Successed');
	}

	public function show($id) {
		$menu_active = 3;
		$product = Product::findOrFail($id);
		$images = Images::where('products_id', $id)->get();
		return view('Backend.product.add-image', compact('menu_active', 'product', 'images'));
	}

	public function edit($id) {
		//
	}

	public function update(Request $request, $id) {
		//
	}

	public function destroy($id) {
		$delete = Images::findOrFail($id);
		$image_large = public_path() . '/uploads/products/large/' . $delete->image;
		$image_medium = public_path() . '/uploads/products/medium/' . $delete->image;
		$image_small = public_path() . '/uploads/products/small/' . $delete->image;
		//dd($image_small);
		if ($delete->delete()) {
			unlink($image_large);
			unlink($image_medium);
			unlink($image_small);
		}
		return back()->with('message', 'Delete Success!');
	}
}
