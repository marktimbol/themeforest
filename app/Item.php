<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Uuids;

    protected $fillable = ['title', 'description', 'price'];

	public $incrementing = false;
	
    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    public function url()
    {
    	return route('items.show', $this->slug);
    }
}
