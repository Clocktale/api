<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentStarRatings extends Model
{
    protected $table = 'anime_star_rates';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function content(){
        return $this->belongsTo(Anime::class, 'anime_id');
    }
}
