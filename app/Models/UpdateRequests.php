<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpdateRequests extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function content(){
        return $this->belongsTo(Contents::class);
    }
}
