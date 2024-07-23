<?php

namespace App\Models;

use App\Models\User;
use App\Models\Artisan;
use App\Models\ActiviteArtisan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function artisans(): HasMany
    {
        return $this->hasMany(Artisan::class);
    }

    public function activiteArtisans(): HasMany
    {
        return $this->hasMany(ActiviteArtisan::class);
    }
}
