<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TestController extends Controller {
	public function index() {
		return view('Frontend.user.login_register');
	}
	public function register(Request $request) {
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
		return back()->with('message', 'Registered already!');
	}
	public function login(Request $request) {
		$input_data = $request->all();
		if (Auth::attempt(['email' => $input_data['email'], 'password' => $input_data['password']])) {
			Session::put('frontSession', $input_data['email']);
			return back()->with('message', 'Đăng nhập thành công!');
			//return view('Frontend.home.index')->with('message', 'Đăng nhập thành công!');
		} else {
			return back()->with('message', 'Tài khoản không hợp lệ!');
		}
	}
	public function logoutUser() {
		Auth::logout();
		Session::forget('frontSession');
		//return redirect('/login_page');
		return redirect()->route('frontend.home.index');
	}
	public function account() {

		$user_login = User::where('id', Auth::id())->first();
		return view('Frontend.user.account', compact('user_login'));
	}
	public function updatepassword(Request $request, $id) {
		$oldPassword = User::where('id', $id)->first();
		$input_data = $request->all();
		if (Hash::check($input_data['password'], $oldPassword->password)) {
			$this->validate($request, [
				'newPassword' => 'required|min:6|max:12|confirmed',
			]);
			$new_pass = Hash::make($input_data['newPassword']);
			User::where('id', $id)->update(['password' => $new_pass]);
			return back()->with('message', 'Update Password Already!');
		} else {
			return back()->with('oldpassword', 'Old Password is Inconrrect!');
		}
	}
}
