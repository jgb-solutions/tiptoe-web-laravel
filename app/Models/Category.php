<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($input) {
            $input['slug'] = Str::uuid();
        });

        self::created(function ($event) {
            
        });

        self::updating(function(){
            
        });
    }
    
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
}