<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Streamings extends Model
{
    public function contents(){
        return $this->belongsToMany(Contents::class, 'contents_streamings', 'streaming_id','content_id' );
    }
}
