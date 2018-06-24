<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Country;
use App\Genre;
use App\Comment;
use App\FilmGenre;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // get country name by id
        $country = Country::select('name')->where('id', '=', $this->country)->value('name');

        return [
            'id'            => (string)$this->id,
            'name'          => $this->name,
            'country'       => $country,
            'description'   => $this->description,
            'slug'       => $this->slug,
            'photo'         => $this->photo,
            'release_date'  => $this->release_date,
            'rating'        => $this->rating,
            'ticket_price'  => $this->ticket_price,
            'comments'      => $this->comments
        ];
    }
}
