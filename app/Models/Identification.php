<?php

namespace App\Models;

use App\Models\TypeActivite;
use App\Models\TypeDocument;
use App\Models\TypeEntreprise;
use App\Models\ChambreRegionale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Identification extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guarded = [];

    public function chambreRegionale(): BelongsTo
    {
        return $this->belongsTo(ChambreRegionale::class);
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

    public function typeDocument(): BelongsTo
    {
        return $this->belongsTo(TypeDocument::class);
    }

}
