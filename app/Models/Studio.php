<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Contents;

class Studio extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];


    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'anime_studios', 'studio_id', 'anime_id');
    }

    public function animePublisher()
    {
        return $this->hasMany(Anime::class, 'studio_id', 'id');
    }

}