<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function index() {
		$menu_active = 0;
		$categories = Category::all();
		return view('Backend.category.index', compact('menu_active', 'categories'));
	}
	public function create() {
		$menu_active = 2;
		$plucked = Category::where('parent_id', 0)->pluck('name', 'id');
		$cate_levels = ['0' => 'Main Category'] + $plucked->all();
		return view('Backend.category.create', compact('menu_active', 'cate_levels'));
	}
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|max:255|unique:categories,name',
			'description' => 'required',
		],
			[
				'description.required' => 'Bạn phải nhập mô tả',
			]);
		$data = $request->all();
		Category::create($data);
		return redirect()->route('category.create')->with('message', 'Added Success!');
	}
	public function checkCateName(Request $request) {
		$data = $request->all();
		$category_name = $data['name'];
		$ch_cate_name_atDB = Category::select('name')->where('name', $category_name)->first();
		if ($category_name == $ch_cate_name_atDB['name']) {
			echo "true";die();
		} else {
			echo "false";die();
		}
	}

	public function edit($id) {
		$menu_active = 0;
		$plucked = Category::where('parent_id', 0)->pluck('name', 'id');
		$cate_levels = ['0' => 'Main Category'] + $plucked->all();
		$edit_category = Category::findOrFail($id);
		return view('Backend.category.edit', compact('edit_category', 'menu_active', 'cate_levels'));
	}

	public function update(Request $request, $id) {
		$update_categories = Category::findOrFail($id);
		$this->validate($request, [
			'name' => 'required|max:255|unique:categories,name,' . $update_categories->id,
			'description' => 'required',
		],
			[
				'description.required' => 'Bạn phải nhập mô tả',
			]);
		//dd($request->all());die();
		$input_data = $request->all();
		if (empty($input_data['status'])) {
			$input_data['status'] = 0;
		}
		$update_categories->update($input_data);
		return redirect()->route('category.index')->with('message', 'Updated Success!');
	}
	// public function destroy($id) {
	// 	$delete = Category::findOrFail($id);
	// 	$delete->delete();
	// 	return redirect()->route('category.index')->with('message', 'Delete Success!');
	// }
	public function deleteCategoryByAjax($id) {
		$delete = Category::findOrFail($id);
		$delete->delete();
		return redirect()->route('category.index')->with('message', 'Delete Success!');
	}
}
