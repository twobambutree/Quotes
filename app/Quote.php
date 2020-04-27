<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
	protected $fillable = [
		'author', 'text'
	];
	
	public function scopeSearch($query, $word)
	{
		return $query->where('text', 'like', '%'. $word .'%');
	}
}
