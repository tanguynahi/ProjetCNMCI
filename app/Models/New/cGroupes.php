<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cGroupes extends Model
{
    protected $table = "CNMCI_Groupes";
    protected $primaryKey = "ID_GROUPES";
    public $timestamps = true;
  protected $fillable = [

        "ID_GROUPES",
        "LIB_GROUPE" ,
        "DESCRIPTION",
        "STATUT",
        "created_at" ,
        "updated_at" ,
        "deleted_at" ,
    ];
    use HasFactory;
}
