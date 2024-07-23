<?php

namespace App\Models;

use App\Models\Taxe;
use App\Models\Groupe;
use App\Models\Paiement;
use App\Models\PaiementInitial;
use App\Models\ChambreRegionale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facturation extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guarded = [];

    public function chambreRegionale(): BelongsTo
    {
        return $this->belongsTo(ChambreRegionale::class);
    }

    public function taxe(): BelongsTo
    {
        return $this->belongsTo(Taxe::class);
    }

    public function groupe(): BelongsTo
    {
        return $this->belongsTo(Groupe::class);
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
