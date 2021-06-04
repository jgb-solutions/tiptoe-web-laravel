<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Modele extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'stage_name',
        'image_bucket',
        'poster',
        'has',
        'bio',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'verified',
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Follower::class,'modele_id', 'user_id');
    }
}