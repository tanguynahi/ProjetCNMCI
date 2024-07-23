<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cCommunes extends Model
{
    protected $table = "CNMCI_Communes";
    protected $primaryKey = "ID_COMMUNE";
    public $timestamps = true;
  protected $fillable = [
        "ID_COMMUNE"  ,
        "LIB_COMMUNE" ,
        "DESCRIPTION" ,
        "ID_CHAMBRE_REGION" ,
        "STATUT",
        "created_at"  ,
        "updated_at"  ,
        "deleted_at" ,
    ];
    use HasFactory;
}
