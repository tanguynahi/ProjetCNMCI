<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CNMCI_users extends Model
{
    protected $table = "CNMCI_users";
    protected $primaryKey = "ID_USERS";
    public $timestamps = true;

    protected $fillable = [
        "ID_USERS",
        "NOM",
        "PRENOMS",
        "CONTACT",
        "ADR_EMAIL",
        "ADRESSE",
        "CIVILITE",
        "AVATAR",
        "LOGIN",
        "MOT_DE_PASSE",
        "SEL",
        "USER_ONLINE",
        "STATUT",
        "created_at",
        "updated_at",
        "deleted_at",
        "ID_PROFIL",
        "ID_VILLE",
    ];
    use HasFactory;
}
