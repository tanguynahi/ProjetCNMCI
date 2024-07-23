<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cGerants extends Model
{
    protected $table = "CNMCI_Gerants";
    protected $primaryKey = "ID_GERANTS";
    public $timestamps = true;
  protected $fillable = [

    "ID_GERANTS" ,
    "ID_CHAMBRE_REGION" ,
    "ID_AGENTS" ,
    "ID_ARTISANS" ,
    "ID_ACTIVITES_ARTIS" ,
    "NOM" ,
    "PRENOM_GERAN"  ,
    "DATE_NAISS" ,
    "LIEU_NAISS"  ,
    "CIVILITE" ,
    "ID_TYPE_DOCS" ,
    "LIEN_TYPE_DOCS"  ,
    "AUTRE_DOCS"  ,
    "NUMERO_DOCS" ,
    "LIEU_DELIVRE_DOCS"  ,
    "DATE_DELIVRE_DOCS" ,
    "NATIONALITE"  ,
    "ADRESSE" ,
    "CONTACT" ,
    "CONTACT_WHATSAPP" ,
    "NIVEAU_ETUDE" ,
    "CLASSE_GERAN" ,
    "DIPLOME_OBT" ,
    "APPRENTISS_MET" ,
    "NIVEAU_METIER" ,
    "DIPLOME_MET_OBT_GERAN" ,
    "DIPLOME_CNMCI" ,
    "ETAT_CIVIL" ,
    "ADR_EMAIL"  ,
    "AVATAR"  ,
    "STATUT" ,
    "created_at" ,
    "updated_at" ,
    "deleted_at" ,
    ];
    use HasFactory;
}
