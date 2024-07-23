<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cApprentis extends Model
{
    protected $table = "CNMCI_Apprentis";
    protected $primaryKey = "ID_APPRENTIS";
    public $timestamps = true;
  protected $fillable = [

                "ID_APPRENTIS"  ,
                "ID_ARTISANS" ,
                "NUMERO_CNPS" ,
                "NOM"  ,
                "PRENOMS"  ,
                "DATE_NAISS"  ,
                "LIEU_NAISS" ,
                "ID_COMMUNE" ,
                "QUARTIER" ,
                "CIVILITE",
                "ID_TYPE_DOCS" ,
                "LIEN_TYPE_DOCS"  ,
                "AUTRE_DOCS" ,
                "NUMERO_DOCS"  ,
                "LIEU_DELIVRE_DOCS" ,
                "DATE_DELIVRE_DOCS"  ,
                "NATIONALITE" ,
                "ADRESSE" ,
                "CONTACT"  ,
                "CONTACT_WHATSAPP"  ,
                "ETAT_CIVIL"  ,
                "ADR_EMAIL" ,
                "AVATAR"  ,
                "ID_TYPE_ACTIVITES" ,
                "DATE_DEBT_APPRENTISSAGE"  ,
                "DATE_DEBT_APPRENTISSAGE_ENT"  ,
                "ACTIVITE_EXERCEE"  ,
                "NIVEAU_ETUDE" ,
                "CLASSE_APPRENTIS" ,
                "DIPLOME_ETD_OBT" ,
                "SIGNATURE" ,
                "STATUT" ,
                "created_at"  ,
                "updated_at"  ,
                "deleted_at",
    ];
    use HasFactory;
}
