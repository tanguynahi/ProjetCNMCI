<?php

namespace App\Models;

use App\Models\Artisan;
use App\Models\ActiviteArtisan;
use App\Models\ChambreRegionale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarteMembre extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guarded = [];

    public function chambreRegionale(): BelongsTo
    {
        return $this->belongsTo(ChambreRegionale::class);
    }

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(Artisan::class);
    }

    public function activiteArtisan(): BelongsTo
    {
        return $this->belongsTo(ActiviteArtisan::class);
    }
}
