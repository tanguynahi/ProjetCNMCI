<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\Paiement;
use App\Models\Administrateur;
use App\Models\SousPrefecture;
use App\Models\PaiementInitial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChambreRegionale extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guarded = [];

    public function administrateur(): BelongsTo
    {
        return $this->belongsTo(Administrateur::class);
    }

    public function sousPrefectures(): HasMany
    {
        return $this->hasMany(SousPrefecture::class);
    }

    public function communes(): HasMany
    {
        return $this->hasMany(Commune::class);
    }

    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class);
    }

    public function paiementInitials(): HasMany
    {
        return $this->hasMany(PaiementInitial::class);
    }


}
