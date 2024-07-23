<?php

namespace App\Models;
use App\Models\Administrateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FAQ extends Model
{
    use HasFactory;
    protected $fillable =[
        'administrateur_id',
        'libelle',
        'description',
        'status',
    ];
    public function administrateurs(): BelongsTo
    {
        return $this->belongsTo(Administrateur::class);
    }
}
