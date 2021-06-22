<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Modele extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'stage_name',
        'bucket',
        'poster',
        'has',
        'bio',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'verified',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($input) {
            $input['hash'] = Str::uuid();
        });

        self::created(function ($event) {
            
        });

        self::updating(function(){
            
        });
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Follower::class,'modele_id', 'user_id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
}