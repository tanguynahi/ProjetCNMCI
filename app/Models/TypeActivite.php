<?php

namespace App\Models;

use App\Models\BrancheActivite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeActivite extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function branche_activite(): BelongsTo
    {
        return $this->belongsTo(BrancheActivite::class);
    }
}
