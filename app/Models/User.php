<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Cashier;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable, SoftDeletes;

    protected $stripeId;
    
    public function __construct()
    {
        $this->stripeId = env('STRIPE_KEY');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_reset_code',
        'active',
        'admin',
        'first_login',
        'avatar',
        'gender',
        'telephone',
        'user_type',
        'bucket',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
      'favorites'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($data) {
            $data['password'] = Hash::make($data['password']);
            $data['first_login'] = true;
            if (!$data['avatar']) {
                $data['avatar'] = "https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png";
            }
        });

        self::created(function ($user) {
            $user->createOrGetStripeCustomer();
        });

        self::updating(function(){
            
        });
    }

    public function modele(): HasOne
    {
        return $this->hasOne(Modele::class);
    }

    public function modelPlan(): HasOne
    {
        return $this->hasOne(ModelPlan::class);
    }

    public function modeles(): BelongsToMany
    {
        return $this->belongsToMany(Modele::class, Follower::class, 'user_id', 'modele_id');
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Photo::class, Favorite::class, 'user_id', 'photo_id');
    }

    public function followers(): HasMany
    {
        return $this->hasMany(Follower::class);
    }

    public function getIsModelAttribute() {
        return $this->user_type === "MODEL";
    }

    public function getIsConsumerAttribute() {
        return $this->user_type === "CONSUMER";
    }

    public function getIsNewAttribute()
    {
        $user = auth()->user();
        $is_new = false;

        if ($user->is_model) {
            $my_followers = $user->modele->followers;

            foreach($my_followers as $follower)
            {
                foreach ($follower->followers as $val) {
                    if ($val->created_at->format('F') === date('F')) {
                        $is_new = true;
                        break;
                    }
                }
            }
        }
        return $is_new;
    }
}