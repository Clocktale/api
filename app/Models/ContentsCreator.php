<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentsCreator extends Model
{
    //
    protected $table = 'anime_author';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['anime_id', 'author_id'];

    protected $casts = [
        'anime_id' => 'integer',
        'author_id' => 'integer',
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
