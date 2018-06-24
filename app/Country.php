<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //Country belongs to Film
    public function films()
    {
      return $this->belongsTo('App\Film');
    }

}
