<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cBrancheActvites extends Model
{
    protected $table = "CNMCI_BrancheActvites";
    protected $primaryKey = "ID_BRANCHES";
    public $timestamps = true;
  protected $fillable = [
                "ID_BRANCHES"  ,
                "LIB_BRANCHE" ,
                "DESCRIPTION",
                "STATUT" ,
                "created_at" ,
                "updated_at" ,
                "deleted_at",
    ];
    use HasFactory;
}
