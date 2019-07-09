<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
	public function index() {
		$menu_active = 4;
		$users = User::all();
		return view('Backend.user.index', compact('menu_active', 'users'));
	}

	public function create() {
		$menu_active = 4;
		return view('Backend.user.create', compact('menu_active'));
	}

	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|unique:users,email',
			'password' => 'required|min:6|confirmed',
			'address' => 'required',
			'mobile' => 'required',

		],

			[
				'name.required' => 'Bạn phải nhập tên',
				'mobile.required' => 'Bạn phải nhập số điện thoại',
				'email.required' => 'Bạn phải nhập email',
				'email.unique' => 'Email đã tồn tại',
				'password.required' => 'Bạn phải nhập mật khẩu',
				'password.confirmed' => 'Xác nhận mật khẩu không khớp',

			]
		);
		$input_data = $request->all();
		$input_data['password'] = Hash::make($input_data['password']);
		User::create($input_data);
		return redirect()->route('user.create')->with('message', 'Thêm thành công!');
	}
	public function destroy($id) {
		$delete = User::findOrFail($id);

		$delete->delete();
		return redirect()->route('user.index')->with('message', 'Delete Success!');

	}
}
