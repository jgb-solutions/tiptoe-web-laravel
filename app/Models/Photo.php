<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use App\Models\Modele;

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
        'hash',
        'publish',
        'type'
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

        self::created(function ($photo) {
            
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

    public function getForMyModeleAttribute()
    {
        $user = auth()->user();
        
        $my_modeles = $user->modeles;
        
        $for_my_modele = false;
        
        foreach($my_modeles as $modele) {
            if ($modele->id === $this->modele->id) {
                $for_my_modele = true;
                break;
            }
        }

        return $for_my_modele;
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

    public function getIsForMeAttribute()
    {
        $user = auth()->user();
        
        $is_for_me = false;
        
        if ($user->modele) {
            # code...
            $my_photos = $user->modele->photos;
            
            foreach($my_photos as $photo) {
                if ($photo->id === $this->id) {
                    $is_for_me = true;
                    break;
                }
            }
        }

        return $is_for_me; 
    }
    
}