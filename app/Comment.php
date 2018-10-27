<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'comment', 'film_id', 'user_id', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
        
    }


}
