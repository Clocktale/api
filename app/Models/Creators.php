<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Mail\Mailables\Content;

class Creators extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];

    public function contents()
    {
        return $this->belongsToMany(Contents::class, 'contents_creators', 'creator_id', 'content_id');
    }
    
    public function contentsCreator()
    {
        return $this->hasMany(ContentsCreator::class, 'creators_id', 'id');
    }
    
    public function contentsCreatorContents()
    {
        return $this->hasMany(Contents::class, 'id', 'content_id');
    }


}
