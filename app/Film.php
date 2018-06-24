<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	protected $fillable = ['name', 'description','release_date', 'rating', 'slug', 'ticket_price', 'country','country',  'genre', 'photo'];

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

	public function genres () {
		return $this->belongsToMany('App\Genre');
	}

    public function countries () {
        return $this->belongsTo('App\Country');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
