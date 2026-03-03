<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $primarykey = 'user_id';

    public $incrementing = false;

    public function genders(){
        return $this->belongsToMany(Genders::class, 'preferences_has_genre', 'user_id', 'gender_id');
    }
}
