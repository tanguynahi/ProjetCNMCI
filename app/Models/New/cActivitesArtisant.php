<?php

namespace App\Models\New;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cActivitesArtisant extends Model
{
    // use HasFactory;

    protected $table = "CNMCI_ActivitesArtisant";
    protected $primaryKey = "ID_ACTIVITES_ARTIS";
    public $timestamps = true;

    protected $fillable = [
        "ID_ACTIVITES_ARTIS",
        "ID_CHAMBRE_REGION",
        "ID_TYPE_ENTREPRISES",
        "ID_AGENTS",
        "ID_ARTISANS",
        "NUMERO_IDENT",
        "DENOMINATION",
        "ADRESSE_POSTAL",
        "CONTACT",
        "ADR_EMAIL",
        "REGIME_FISCALE",
        "NB_ASSOCIES",
        "DUREE_PERS_MORAL",
        "CAPITAL_SOCIAL",
        "NUMERO_CNPS",
        "NUM_COMPTE_CONT",
        "ID_TYPE_ACTIVITES",
        "ACTIVITE_SECONDAIRE",
        "RAISON_SOCIALE",
        "SIGLE",
        "OBJET_SOCIAL",
        "DATE_DEBT_ACTIVITE",
        "LIB_DEPARTEMENT",
        "ID_SOUS_PREFECTURE",
        "ID_COMMUNE",
        "QUARTIER",
        "VILLAGE",
        "NUM_LOT",
        "NUM_ILOT",
        "NB_COMPAGNON",
        "NB_APPRENTIS",
        "LIEN_MAP",
        "TYPE_DUREE",
        "STATUT",
        "created_at",
        "updated_at",
        "deleted_at"
    ];
    use HasFactory;
}
