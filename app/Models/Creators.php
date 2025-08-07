<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailables\Content;

class Creators extends Model
{
    protected $primarykey = 'creators_id';
    protected $fillable = ['name', 'primary_role'];
    
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
