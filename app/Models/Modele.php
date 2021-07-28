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

        self::created(function ($modele) {
            $modele->modelAccount()->create([
                "account" => 0,
                "balance" => 0
            ]);
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

    public function modeleAccount()
    {
        return $this->hasOne(ModeleAccount::class);
    }

    public function modeleTransactions(): HasMany
    {
        return $this->hasMany(ModeleTransaction::class);
    }

    public function photoLiked()
    {
        return $this->hasManyThrough(Favorite::class, Photo::class);
    }

    public function getModeleAccountDataAttribute()
    {
        $user = auth()->user();
        $modele_account_data = null;

        if($user->is_model)
        {
            $modele_account_data = $user->modele->modeleAccount;
        }

        return $modele_account_data;
    }

    public function getFollowersCountAttribute()
    {
        $user = auth()->user();
        $followers_count = 0;

        if ($user->is_model) {
            $followers_count = $user->modele->followers->count();
        }
        
        return $followers_count;
    }

    public function getPhotosCountAttribute()
    {
        $user = auth()->user();
        $photos_count = 0;

        if ($user->is_model) {
            $photos_count = $user->modele->photos->count();
        }
        
        return $photos_count;
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