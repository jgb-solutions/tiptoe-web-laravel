<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_reset_code',
        'active',
        'admin',
        'first_login',
        'avatar',
        'gender',
        'telephone',
        'user_type',
        'image_bucket',
        'telephone',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
      'favorites'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($data) {
            
        });

        self::created(function ($user) {
            if (request()->has('model')) {

                \Log::error('cool', ['error' => request()->model] );
                Modele::create([
                    'user_id'=> $user->id,
                   request()->model]
                );
            }
        });

        self::updating(function(){
            
        });
    }

    public function modele(): HasOne
    {
        return $this->hasOne(Modele::class);
    }

    public function modeles(): BelongsToMany
    {
        return $this->belongsToMany(Modele::class, Follower::class, 'user_id', 'modele_id');
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Photo::class, Favorite::class, 'user_id', 'photo_id');
    }
}