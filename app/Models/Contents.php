<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    public function streamings(){
        return $this->belongsToMany(Streamings::class, 'contents_streamings', 'content_id', 'streaming_id');
    }
    public function publishers(){
        return $this->belongsTo(Publishers::class);
    }
    public function creators(){
        return $this->belongsToMany(Creators::class, 'contents_authors', 'content_id', 'creators_id');
    }
    public function starRatings(){
        return $this->hasMany(ContentStarRatings::class);
    }

    public function creatorContents(){
        return $this->hasMany(ContentsCreator::class, 'content_id', 'id');
    }

    public function contentsCreator()
    {
        return $this->hasMany(ContentsCreator::class, 'content_id', 'id');
    }
}
