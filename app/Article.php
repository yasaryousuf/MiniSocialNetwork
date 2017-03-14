<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Article extends Model
{
	use SoftDeletes;
    protected $dates = ['post_on', 'deleted_at'];
    public function setPostOnAttribute($value)
    {
    	$this->attributes['post_on'] = Carbon::parse($value);
    }
    protected $fillable = [
    	'user_id', 'content', 'live', 'post_on'
    ];
    public function setLiveAttribute($value)
    {
    	$this->attributes['live'] = (boolean)($value);
    }
}
