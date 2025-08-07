<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publishers extends Model
{
    public function contents(){
        return $this->hasMany(Contents::class);
    }
}
