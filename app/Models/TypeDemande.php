<?php

namespace App\Models;

use App\Models\DocumentTypeDemande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeDemande extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function documentTypeDemandes(): HasMany
    {
        return $this->hasMany(DocumentTypeDemande::class);
    }
}
