<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttr;
use Illuminate\Http\Request;

class ProductAttController extends Controller {

	public function index() {

	}

	public function create() {

	}

	public function store(Request $request) {
		$data = $request->all();
		//dd($data);
		//dd($data['products_id']);
		$data['sku'] = $data['sku'] . $data['products_id'] . '-' . $data['size'];
		$this->validate($request,
			[
				'sku' => 'unique:productatt,sku',
				'size' => 'required',
				'stock' => 'required|numeric',
			],
			[

				'sku.unique' => 'sku đã tồn tại',
				'size.rerequired' => 'Bạn phải nhập kích thước',
				'stock.rerequired' => 'Bạn phải nhập số lượng',

			]);
		ProductAttr::create($data);
		return back()->with('message', 'Add Attribute Successed');
	}

	public function show($id) {
		$menu_active = 3;
		$product = Product::findOrFail($id);
		$attributes = ProductAttr::where('products_id', $id)->get();
		return view('Backend.product.add_pro_att', compact('menu_active', 'product', 'attributes'));
	}

	public function edit($id) {
		//
	}

	public function update(Request $request, $id) {
		$request_data = $request->all();
		foreach ($request_data['id'] as $key => $attr) {
			$update_attr = ProductAttr::where([['products_id', $id], ['id', $request_data['id'][$key]]])
				->update(['sku' => $request_data['sku'][$key], 'size' => $request_data['size'][$key],
					'stock' => $request_data['stock'][$key]]);
		}

		return back()->with('message', 'Update Attribute Successed');
	}

	public function destroy($id) {

	}
	public function deleteAttr($id) {
		$deleteAttr = ProductAttr::findOrFail($id);
		$deleteAttr->delete();
		return back()->with('message', 'Deleted Success!');
	}
}
