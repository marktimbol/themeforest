<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	public $incrementing = false;
	
    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function url()
    {
    	return route('items.show', $this->slug);
    }
}
