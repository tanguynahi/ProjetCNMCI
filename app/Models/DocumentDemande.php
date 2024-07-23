<?php

namespace App\Models;

use App\Models\Demande;
use App\Models\TypeDemande;
use App\Models\DocumentTypeDemande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentDemande extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }

    public function typeDemande(): BelongsTo
    {
        return $this->belongsTo(TypeDemande::class);
    }

    public function documentTypeDemande(): BelongsTo
    {
        return $this->belongsTo(DocumentTypeDemande::class);
    }
}
