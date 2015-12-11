<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FormableImageTrait;
use App\Traits\FormableFileTrait;
use App\Traits\ParentableTrait;
use App\Traits\TranslationTrait;
use App\Traits\FormableExtrasTrait;


class Formable extends Model
{
	use FormableImageTrait, ParentableTrait, TranslationTrait, FormableFileTrait, FormableExtrasTrait;

	protected $casts = [
		'images' => 'json',
		'translations' => 'json',
		'shell' => 'json',
		'skirt' => 'json',
		'files' => 'json',
		'options' => 'json',
		'extras' => 'json'
	];

	protected $fillableExtras = [];

	public function getFillables()
	{
		return $this->fillable;
	}

	public $parent_key = 'parent_id';

	public function scopeActive($query)
	{
		return $query->where('status', 1);
	}

	public function scopeDisabled($query)
	{
		return $query->where('status', 0);
	}

	public $disable_parent_listing = false;
}
