<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cTaxes extends Model
{
    protected $table = "CNMCI_Taxes";
    protected $primaryKey = "ID_TAXES";
    public $timestamps = true;
  protected $fillable = [

        "ID_TAXES"  ,
        "LIB_TAXE"  ,
        "MONTANT" ,
        "DESCRIPTION"  ,
        "ID_GROUPES" ,
        "STATUT" ,
        "created_at" ,
        "updated_at" ,
        "deleted_at" ,
    ];
    use HasFactory;
}
