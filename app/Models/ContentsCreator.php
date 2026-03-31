<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentsCreator extends Model
{
    //
    protected $table = 'contents_creators';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['content_id', 'creators_id'];
    protected $casts = [
        'content_id' => 'integer',
        'creators_id' => 'integer',
    ];


    public function contents()
    {
        return $this->belongsTo(Anime::class, 'id', 'anime_id');
    }

    public function creators()
    {
        return $this->belongsTo(Author::class, 'id', 'author_id');
    }
}
