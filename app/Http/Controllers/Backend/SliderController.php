<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller {
	public function index() {
		$menu_active = 6;
		$i = 0;
		$sliders = Slider::orderBy('created_at', 'desc')->get();
		return view('Backend.slider.index', compact('menu_active', 'sliders', 'i'));
	}
	public function create() {
		$menu_active = 6;
		return view('Backend.slider.create', compact('menu_active'));
	}
	public function store(Request $request) {
		$this->validate($request, [
			'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
		],

			[

				'image.required' => 'Bạn phải chọn ảnh',
				'image.image' => 'k phải ảnh',
				'image.mimes' => 'Dượng đây',
			]

		);
		$formInput = $request->all();
		if ($request->file('image')) {
			$image = $request->file('image');
			if ($image->isValid()) {
				$fileName = time() . '.' . $image->getClientOriginalExtension();
				$large_image_path = public_path('uploads/sliders/' . $fileName);
				//dd($large_image_path);
				Image::make($image)->resize(1700, 600)->save($large_image_path);
				$formInput['image'] = $fileName;
			}
		}
		//dd($formInput);
		Slider::create($formInput);
		return redirect()->route('slider.create')->with('message', 'Add SLider Successfully!');
	}
	public function destroy($id) {
		$delete = Slider::findOrFail($id);
		$image_small = public_path() . '/uploads/sliders/' . $delete->image;
		//dd($image_small);
		if ($delete->delete()) {
			unlink($image_small);
		}
		return redirect()->route('slider.index')->with('message', 'Delete Success!');
	}
}
