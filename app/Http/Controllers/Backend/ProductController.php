<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\EditProductRequest;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller {
	public function index() {
		$menu_active = 3;
		$i = 0;
		$products = Product::orderBy('created_at', 'desc')->get();
		return view('Backend.product.index', compact('menu_active', 'products', 'i'));
	}

	public function create() {
		$menu_active = 3;
		$categories = Category::where('parent_id', 0)->pluck('name', 'id')->all();
		return view('Backend.product.create', compact('menu_active', 'categories'));
	}

	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|unique:products,name',
			'color' => 'required',
			'description' => 'required',
			'price' => 'required',
			'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
		],

			[
				'name.required' => 'Bạn phải nhập tên',
				'name.unique' => 'Sản phẩm đã tồn tại',
				'color.required' => 'Bạn phải nhập màu',
			]

		);
		$formInput = $request->all();
		//dd($formInput);
		if ($request->file('image')) {
			$image = $request->file('image');
			if ($image->isValid()) {
				$fileName = time() . '-' . str_slug($formInput['name'], "-") . '.' . $image->getClientOriginalExtension();
				$large_image_path = public_path() . '/uploads/products/large/' . $fileName;
				$medium_image_path = public_path() . '/uploads/products/medium/' . $fileName;
				$small_image_path = public_path() . '/uploads/products/small/' . $fileName;
				//Resize Image
				//dd($small_image_path);
				Image::make($image)->save($large_image_path);
				Image::make($image)->resize(600, 600)->save($medium_image_path);
				Image::make($image)->resize(300, 300)->save($small_image_path);
				$formInput['image'] = $fileName;
			}
		}
		Product::create($formInput);
		//dd($formInput);
		return back()->with('message', 'Add product Successed');
	}
	public function edit($id) {
		$menu_active = 3;
		$categories = Category::where('parent_id', 0)->pluck('name', 'id')->all();
		$edit_product = Product::findOrFail($id);
		$edit_category = Category::findOrFail($edit_product->categories_id);
		return view('Backend.product.edit', compact('edit_product', 'menu_active', 'categories', 'edit_category'));
	}
	public function update(EditProductRequest $request, $id) {
		$update_product = Product::findOrFail($id);
		// $this->validate($request, [
		// 	'name' => 'required|unique:products,name,' . $this->product,
		// 	'code' => 'required',
		// 	'color' => 'required',
		// 	'description' => 'required',
		// 	'price' => 'required|numeric',
		// 	'image' => 'image|mimes:png,jpg,jpeg|max:1000',
		// ]);
		//dd($update_product);
		$formInput = $request->all();
		//dd($formInput);
		if (empty($formInput['status'])) {
			$formInput['status'] = 0;
		}
		if ($update_product['image'] != '') {
			if ($request->file('image')) {
				$image_tmp = $request->file('image');
				//dd($image_tmp);
				if ($image_tmp->isValid()) {
					//Image File Path code
					$fileName = time() . '-' . str_slug($formInput['name'], "-") . '.' . $image_tmp->getClientOriginalExtension();
					$large_image_path = public_path() . '/uploads/products/large/' . $fileName;
					$medium_image_path = public_path() . '/uploads/products/medium/' . $fileName;
					$small_image_path = public_path() . '/uploads/products/small/' . $fileName;
					//dd($small_image_path);
					//Resize Image
					Image::make($image_tmp)->save($large_image_path);
					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
					Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
					$formInput['image'] = $fileName;
					//dd($filename);
				}
			} else {
				//dd($filename);
				$filename = $formInput['current_image'];
				//dd($filename);
			}
		}
		$update_product->update($formInput);
		return redirect()->route('product.index')->with('message', 'Update Products Successfully!');

	}
	public function destroy($id) {
		$delete = Product::findOrFail($id);
		//dd($delete);
		$image_large = public_path() . '/uploads/products/large/' . $delete->image;
		$image_medium = public_path() . '/uploads/products/medium/' . $delete->image;
		$image_small = public_path() . '/uploads/products/small/' . $delete->image;
		$deleteImage = Images::where('products_id', $id)->get();
		foreach ($deleteImage as $object => $key) {
			$image_largeI = public_path() . '/uploads/products/large/' . $key->image;
			//dd($image_largeI);
			$image_mediumI = public_path() . '/uploads/products/medium/' . $key->image;
			$image_smallI = public_path() . '/uploads/products/small/' . $key->image;
			//dd($key);
			$key->delete();
			if ($key->image != '') {
				$key->image = '';
				$key->save();
				////// delete image ///

				unlink($image_largeI);
				unlink($image_mediumI);
				unlink($image_smallI);
			}

		}

		if ($delete->image != '') {
			$delete->image = '';
			$delete->save();
			////// delete image ///

			unlink($image_large);
			unlink($image_medium);
			unlink($image_small);
		}
		$delete->delete();
		return back()->with('message', 'Delete Success!');
	}
	public function deleteProductImage($id) {
		$delete_image = Product::findOrFail($id);
		//dd($delete_image);
		$image_large = public_path() . '/uploads/products/large/' . $delete_image->image;
		$image_medium = public_path() . '/uploads/products/medium/' . $delete_image->image;
		$image_small = public_path() . '/uploads/products/small/' . $delete_image->image;
		//dd($image_small);
		if ($delete_image) {
			$delete_image->image = '';
			$delete_image->save();
			////// delete image ///
			unlink($image_large);
			unlink($image_medium);
			unlink($image_small);
		}
		return back();
	}

}
