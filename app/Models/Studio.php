<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Contents;

class Studio extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];


    public function contents(): HasMany
    {
        return $this->hasMany(Anime::class);
    }
}