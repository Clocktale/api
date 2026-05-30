<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'original_title',
        'description',
        'release_date',
        'content_lenght',
        'studio_id',
        'cover_image_url',
        'status',
        'story_lenght',
    ];

    public function streamings()
    {
        return $this->belongsToMany(Streamings::class, 'anime_streamings', 'anime_id', 'streaming_id');
    }

    public function publishers()
    {
        return $this->belongsTo(Studio::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'anime_authors', 'anime_id', 'author_id');
    }

    public function studios()
    {
        return $this->belongsToMany(Studio::class, 'anime_studios', 'anime_id', 'studio_id');
    }

    public function starRatings()
    {
        return $this->hasMany(ContentStarRatings::class);
    }

    public function creatorContents()
    {
        return $this->hasMany(ContentsCreator::class, 'anime_id', 'id');
    }

    public function contentsCreator()
    {
        return $this->hasMany(ContentsCreator::class, 'anime_id', 'id');
    }
}
