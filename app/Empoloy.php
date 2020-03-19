<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empoloy extends Model {

	protected $table = 'empoloys';

	protected $fillable = [
		'username',
		'job_ar',
		'job_en',
		'image',
		'manger',
	];
}
