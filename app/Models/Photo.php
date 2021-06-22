<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele_id',
        'category_id',
        'uri',
        'bucket',
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
    
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($input) {
            $input['hash'] = Str::uuid();
            $input['uri'] = $input['bucket'];
        });

        self::created(function ($event) {
            
        });

        self::updating(function(){
            
        });
    }

    public function getLikedByMeAttribute()
    {
        $user = auth()->user();
        
        $my_favorites = $user->favorites;
        
        $liked_by_me = false;
        
        foreach($my_favorites as $photo) {
            if ($photo->id === $this->id) {
                $liked_by_me = true;
                
                break;
            }
        }

        return $liked_by_me;
    }

    public function getLikesCountAttribute()
    {
        return $this->users->count();
    }

    public function favorites()
    {

        $user = auth()->user();
        
        $my_favorites = $user->favorites;
        
        foreach($my_favorites as $fa)
        {
            if ($fa.id === $this->id)
            {
                return $this;
            }
        }
    }
    
}