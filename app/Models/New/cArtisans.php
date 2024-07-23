<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cArtisans extends Model
{
    protected $table = "CNMCI_Artisans";
    protected $primaryKey = "ID_ARTISANS";
    public $timestamps = true;
  protected $fillable = [

                "ID_ARTISANS"  ,
                "ID_CHAMBRE_REGION" ,
                "ID_USERS" ,
                "ID_AGENTS" ,
                "ID_TYPE_DOCS" ,
                "LIEN_TYPE_DOCS" ,
                "AUTRE_DOCS"  ,
                "NUMERO_DOCS"  ,
                "LIEU_DELIVRE_DOCS"  ,
                "DATE_DELIVRE_DOCS"  ,
                "NATIONALITE"  ,
                "ADRESSE"  ,
                "CONTACT"  ,
                "CONTACT_WHATSAPP"  ,
                "ETAT_CIVIL"  ,
                "ADR_EMAIL"  ,
                "AVATAR"  ,
                "NIVEAU_ETUDE" ,
                "CLASSE_ARTIS" ,
                "DIPLOME_ETD_OBT"  ,
                "APPRENTISS_MET"  ,
                "NIVEAU_METIER" ,
                "DIPLOME_METIER_OBT"  ,
                "DIPLOME_CNMCI"  ,
                "SIGNATURE"  ,
                "DECLARE_MAITRISE_METIER",
                "DECLARE_HONNEUR",
                "ACCEPTE_CONFIDENTIAL",
                "EST_GERANT",
                "NUMERO_REGISTRE"  ,
                "TYPE_REGISTRE"  ,
                "STATUT" ,
                "created_at" ,
                "updated_at" ,
                "deleted_at",
    ];
    use HasFactory;
}
