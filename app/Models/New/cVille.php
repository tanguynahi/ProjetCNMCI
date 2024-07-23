<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cVille extends Model
{
    protected $table = "CNMCI_Ville";
    protected $primaryKey = "ID_VILLE";
    public $timestamps = true;

    protected $fillable = [
        "ID_VILLE",
        "LIB_VILLE",
        "DESCRIPTION",
        "STATUT",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
    use HasFactory;
}
