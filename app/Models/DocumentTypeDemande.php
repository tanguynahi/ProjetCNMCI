<?php

namespace App\Models;

use App\Models\TypeDemande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentTypeDemande extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function typeDemande(): BelongsTo
    {
        return $this->belongsTo(TypeDemande::class);
    }
}
