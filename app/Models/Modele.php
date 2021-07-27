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
        'hash',
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
            if (!$input['bucket']) {
                $input['bucket'] = "https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png";
            }
            $input['poster'] = $input['bucket'];
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

    public function photoLiked()
    {
        return $this->hasManyThrough(Favorite::class, Photo::class);
    }

    public function getFollowedByMeAttribute()
    {
        $user = auth()->user();
        
        $my_modeles = $user->modeles;
        
        $followed_by_me = false;
        
        foreach($my_modeles as $modele) {
            if ($modele->id === $this->id) {
                $followed_by_me = true;
                break;
            }
        }

        return $followed_by_me;
    }

    public function getnewFollowerCountAttribute()
    {
        $new_follower_count = 0;

        $my_followers = $this->followers;

        foreach($my_followers as $follower)
        {
            foreach ($follower->followers as $val) {
                if ($val->created_at->format('F') === date('F')) {
                    $new_follower_count ++;
                    break;
                }
            }
        }
        
        return $new_follower_count;
    }

    
}