<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cAgents extends Model
{
    protected $table = "CNMCI_Agents";
    protected $primaryKey = "ID_AGENTS";
    public $timestamps = true;
  protected $fillable = [
            "ID_AGENTS"  ,
            "ID_USERS" ,
            "STATUT"  ,
            "created_at" ,
            "updated_at" ,
            "deleted_at" ,
    ];
    use HasFactory;
}
