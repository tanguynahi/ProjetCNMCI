<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cTypeActivites extends Model
{
    protected $table = "CNMCI_TypeActivites";
    protected $primaryKey = "ID_TYPE_ACTIVITES";
    public $timestamps = true;
  protected $fillable = [
        "ID_TYPE_ACTIVITES",
        "LIB_TYPE_ACT" ,
        "DESCRIPTION"  ,
        "STATUT" ,
        "created_at"  ,
        "updated_at"  ,
        "deleted_at"  ,
        'ID_BRANCHES',
    ];
    use HasFactory;
}
