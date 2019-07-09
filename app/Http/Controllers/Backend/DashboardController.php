<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {
	// public function index() {
	// 	$menu_active = 1;
	// 	return view('Backend.dashboard.index', compact('menu_active'));

	// }
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$menu_active = 1;
		return view('Backend.dashboard.index', compact('menu_active'));
	}
}
