<?php

namespace App\Models;

use App\Models\Taxe;
use App\Models\TypeEntreprise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupe extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function taxe(): HasMany
    {
        return $this->hasMany(Taxe::class);
    }

    public function typeEntreprise(): HasMany
    {
        return $this->hasMany(TypeEntreprise::class);
    }
}
