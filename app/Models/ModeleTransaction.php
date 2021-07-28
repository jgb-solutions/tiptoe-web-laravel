<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeleTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele_id',
        'amount',
    ];

    public function modele(): BelongsTo
    {
        return $this->belongsTo(Modele::class);
    }
}