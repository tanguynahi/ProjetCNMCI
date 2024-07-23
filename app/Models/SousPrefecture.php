<?php

namespace App\Models;

use App\Models\ChambreRegionale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousPrefecture extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function chambreRegionale(): BelongsTo
    {
        return $this->belongsTo(ChambreRegionale::class);
    }
}
