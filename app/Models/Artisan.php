<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Commune;
use App\Models\Paiement;
use App\Models\TypeActivite;
use App\Models\TypeEntreprise;
use App\Models\ActiviteArtisan;
use App\Models\PaiementInitial;
use App\Models\ChambreRegionale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artisan extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function chambreRegionale(): BelongsTo
    {
        return $this->belongsTo(ChambreRegionale::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function activiteArtisans(): HasMany
    {
        return $this->hasMany(ActiviteArtisan::class);
    }

    public function gerants(): HasMany
    {
        return $this->hasMany(Gerant::class);
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
