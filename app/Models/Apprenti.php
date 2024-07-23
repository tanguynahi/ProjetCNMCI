<?php

namespace App\Models;

use App\Models\Artisan;
use App\Models\Commune;
use App\Models\TypeActivite;
use App\Models\TypeDocument;
use App\Models\ChambreRegionale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apprenti extends Model
{
    use HasFactory,SoftDeletes, Notifiable;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chambreRegionale(): BelongsTo
    {
        return $this->belongsTo(ChambreRegionale::class);
    }

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(Artisan::class);
    }

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    public function typeDocument(): BelongsTo
    {
        return $this->belongsTo(TypeDocument::class);
    }

    public function typeActivite(): BelongsTo
    {
        return $this->belongsTo(TypeActivite::class);
    }
}
