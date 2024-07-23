<?php

namespace App\Models;

use App\Models\Groupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeEntreprise extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function groupe(): BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }
}
