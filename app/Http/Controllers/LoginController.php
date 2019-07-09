<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;

class LoginController extends Controller {
	public function getLogin() {
		if (Auth::check()) {
			// nếu đăng nhập thàng công thì
			return redirect('admin');
		} else {
			return view('Backend.Login.login');
		}
		//return view('Backend.Login.login');
	}
	public function postLogin(Request $request) {
		$rules = [
			'email' => 'required|email',
			'password' => 'required|min:6',
		];
		$messages = [
			'email.required' => 'Email là trường bắt buộc',
			'email.email' => 'Email không đúng định dạng',
			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
		];
		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$email = $request->input('email');
			$password = $request->input('password');

			if (Auth::attempt(['email' => $email, 'password' => $password])) {
				return redirect()->intended('/admin');
			} else {
				$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
				return redirect()->back()->withInput()->withErrors($errors);
			}
		}
	}
	public function logout() {
		Auth::logout();
		return redirect('/login');
	}
}
