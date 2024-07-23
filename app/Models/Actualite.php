<?php

namespace App\Models;

use App\Models\Administrateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actualite extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'description',
        'lien_photo',
        'date_actualite',
        'administrateur_id',
    ];
    public function administrateurs(): BelongsTo
    {
        return $this->belongsTo(Administrateur::class);
    }
}
