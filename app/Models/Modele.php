<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $guarded = [];
    
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
    ],
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}