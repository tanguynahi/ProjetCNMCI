<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cTypeDocuments extends Model
{
    protected $table = "CNMCI_TypeDocuments";
    protected $primaryKey = "ID_TYPE_DOCS";
    public $timestamps = true;
  protected $fillable = [

        "ID_TYPE_DOCS" ,
        "LIB_TYPE_DOCS"  ,
        "DESCRIPTION"  ,
        "STATUT" ,
        "created_at" ,
        "updated_at"  ,
        "deleted_at" ,

    ];
    use HasFactory;
}
