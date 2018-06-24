<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //Genre belongs to many posts
    public function films () {
      return $this->belongsToMany('App\Film');
    }

}
