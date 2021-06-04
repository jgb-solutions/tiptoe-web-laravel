<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
}