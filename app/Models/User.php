<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'role',
        'password',
        'token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function preferences()
    {
        return $this->hasOne(Preferences::class . 'user_id');
    }

    public function preferredGenres()
    {
        return $this->belongsToMany(Genders::class, 'preferences_has_genre', 'user_id', 'gender_id');
    }

    public function starRatings()
    {
        return $this->hasMany(ContentStarRatings::class, 'user_id');
    }

    public function updateRequests()
    {
        return $this->hasMany(UpdateRequests::class, 'user_id');
    }

    public function includeRequests()
    {
        return $this->hasMany(IncludeRequests::class, 'user_id');
    }
}
