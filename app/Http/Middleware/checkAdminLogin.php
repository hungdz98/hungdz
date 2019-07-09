<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class checkAdminLogin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		// // nếu user đã đăng nhập
		// if (Auth::check() && Auth::user()->isAdmin()) {
		// 	return $next($request);
		// }
		// else{

		// }
		// return redirect('backend.home.index');
		// nếu user đã đăng nhập
		if (Auth::check()) {
			$user = Auth::user();
			// nếu level =1 (admin), status = 1 (actived) thì cho qua.
			if ($user->admin == 1) {
				return $next($request);
			} else {
				Auth::logout();
				$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng ! Mời nhập lại']);
				return redirect()->route('login')->withInput()->withErrors($errors);
			}
		} else {
			return redirect('/login');
		}

	}

}
