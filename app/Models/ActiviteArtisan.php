<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Artisan;
use App\Models\Commune;
use App\Models\Paiement;
use App\Models\CarteMembre;
use App\Models\TypeActivite;
use App\Models\TypeDocument;
use App\Models\SousPrefecture;
use App\Models\TypeEntreprise;
use App\Models\PaiementInitial;
use App\Models\ChambreRegionale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActiviteArtisan extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function chambreRegionale(): BelongsTo
    {
        return $this->belongsTo(ChambreRegionale::class);
    }

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(Artisan::class);
    }


    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function typeDocument(): BelongsTo
    {
        return $this->belongsTo(TypeDocument::class);
    }


    public function typeEntreprise(): BelongsTo
    {
        return $this->belongsTo(TypeEntreprise::class);
    }

    public function typeActivite(): BelongsTo
    {
        return $this->belongsTo(TypeActivite::class);
    }

    public function sousPrefecture(): BelongsTo
    {
        return $this->belongsTo(SousPrefecture::class);
    }

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class);
    }

    public function paiementInitials(): HasMany
    {
        return $this->hasMany(PaiementInitial::class);
    }

    public function carteMembres(): HasMany
    {
        return $this->hasMany(CarteMembre::class);
    }

}
