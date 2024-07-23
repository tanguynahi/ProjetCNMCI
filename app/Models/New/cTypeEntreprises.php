<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cTypeEntreprises extends Model
{
    protected $table = "CNMCI_TypeEntreprises";
    protected $primaryKey = "ID_TYPE_ENTREPRISES";
    public $timestamps = true;

    protected $fillable = [
        "ID_TYPE_ENTREPRISES",
        "LIB_TYPE",
        "DESCRIPTION",
        "STATUT",
        "created_at",
        "deleted_at",
        "updated_at",
        "ID_GROUPES",
    ];
    use HasFactory;
}
