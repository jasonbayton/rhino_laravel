<?php

namespace App\Models;

use Orbit\Concerns\Orbital;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model {
	use HasFactory, Orbital;

	protected $guarded = [];

	public static function schema(Blueprint $table) {
		$table->string('title');
		$table->string('subtitle');
//		$table->string('featuredImage')->nullable();
//		$table->boolean('featured')->default(false);
//		$table->date('date');
//		$table->date('updated')->nullable();
//		$table->string('url');
//		$table->string('type');
//		$table->string('published')->nullable();
//		$table->string('parent')->nullable();
//		$table->string('topic')->nullable();
//		$table->integer('order')->default(0);
	}

}
