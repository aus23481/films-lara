<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'release_date', 'rating', 'ticket_price', 'country_id', 'genre_id', 'photo', 'created_at', 'updated_at'
    ];

    public function genre()
    {
        return $this->belongsTo('App\Genre', 'genre_id');
        
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
        
    }
}
