<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Mail\Mailables\Content;

class Author extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];

    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'contents_Author', 'author_id', 'anime_id');
    }
    
    public function animeCreator()
    {
        return $this->hasMany(ContentsCreator::class, 'author_id', 'id');
    }
    
    public function contentsCreatorContents()
    {
        return $this->hasMany(Anime::class, 'id', 'anime_id');
    }


}
