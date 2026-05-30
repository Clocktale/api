<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Streamings extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'url', 'logo_url'];

    public function contents()
    {
        return $this->belongsToMany(Anime::class, 'anime_streamings', 'streaming_id', 'anime_id');
    }
}
