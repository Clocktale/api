<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = [
        'token',
        'token_expiration'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
