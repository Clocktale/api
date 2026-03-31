<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Streamings extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'url', 'logo_url'];

    public function contents(){
        return $this->belongsToMany(Anime::class, 'contents_streamings', 'streaming_id','anime_id' );
    }
}
