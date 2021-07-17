<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelPlan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
        'stripe_plan',
        'cost',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}