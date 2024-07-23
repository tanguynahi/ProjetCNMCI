<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cadministrateurs extends Model
{
    protected $table = "CNMCI_administrateurs";
    protected $primaryKey = "ID_ADMINISTRATEUR";
    public $timestamps = true;
  protected $fillable = [

        "ID_ADMINISTRATEUR"  ,
        "ID_CHAMBRE_REGION" ,
        "STATUT" ,
        "created_at",
        "updated_at",
        "deleted_at",
        "ID_USERS" ,
    ];
    use HasFactory;
}
