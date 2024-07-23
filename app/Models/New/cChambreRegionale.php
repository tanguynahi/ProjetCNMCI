<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cChambreRegionale extends Model
{
    protected $table = "CNMCI_ChambreRegionale";
    protected $primaryKey = "ID_CHAMBRE_REGION";
    public $timestamps = true;
  protected $fillable = [


                    "ID_CHAMBRE_REGION",
                    "LIB_CHAMBRE"  ,
                    "DESCRIPTION" ,
                    "STATUT" ,
                    "created_at"  ,
                    "updated_at"  ,
                    "deleted_at" ,
    ];
    use HasFactory;
}
