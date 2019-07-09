<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('Categories', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('parent_id')->nullable();
			$table->string('name')->unique('slug');
			$table->text('description')->nullable();
			$table->tinyInteger('status')->default(0);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('Categories');
	}
}
