<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['film_id', 'user_id', 'comment', 'name'];

    // comment can only belong to one film
    public function films()
    {
      return $this->belongsTo('App\Film');
    }
}
