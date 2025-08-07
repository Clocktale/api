<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genders extends Model
{
    public function preferences(){
        return $this->belongsToMany(Preferences::class, 'gender_id', 'user_id');
    }
}
