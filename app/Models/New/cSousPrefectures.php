<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cSousPrefectures extends Model
{
    protected $table = "CNMCI_SousPrefectures";
    protected $primaryKey = "ID_SOUS_PREFECTURE";
    public $timestamps = true;
  protected $fillable = [
        "ID_SOUS_PREFECTURE"  ,
        "LIB_SP"  ,
        "DESCRIPTION"  ,
        "ID_CHAMBRE_REGION" ,
        "STATUT",
        "created_at"  ,
        "updated_at"  ,
        "deleted_at" ,
    ];
    use HasFactory;
}
