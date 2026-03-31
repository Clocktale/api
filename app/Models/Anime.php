<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Streamings;
use App\Models\Studio;
use App\Models\Author;
use App\Models\ContentStarRatings;
use App\Models\ContentsCreator;

class Anime extends Model
{
    public function streamings(){
        return $this->belongsToMany(Streamings::class, 'contents_streamings', 'anime_id', 'streaming_id');
    }
    public function publishers(){
        return $this->belongsTo(Studio::class);
    }
    public function authors(){
        return $this->belongsToMany(Author::class, 'contents_authors', 'anime_id', 'creators_id');
    }
    public function starRatings(){
        return $this->hasMany(ContentStarRatings::class);
    }

    public function creatorContents(){
        return $this->hasMany(ContentsCreator::class, 'anime_id', 'id');
    }

    public function contentsCreator()
    {
        return $this->hasMany(ContentsCreator::class, 'anime_id', 'id');
    }
}
