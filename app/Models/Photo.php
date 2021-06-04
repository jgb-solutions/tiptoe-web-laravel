<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele_id',
        'category_id',
        'uri',
        'image_bucket',
        'caption',
        'detail',
        'featured',
        'has',
        'publish',
    ];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function modele(): BelongsTo
    {
        return $this->belongsTo(Modele::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Favorite::class, 'photo_id', 'user_id');
    }
}