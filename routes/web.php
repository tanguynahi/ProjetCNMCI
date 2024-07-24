<?php

use App\Models\BrancheActivite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaxeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\GroupeController;
use League\CommonMark\Node\Block\Document;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ApprentiController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PenaliteController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\CompagnonController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\FacturationController;
use App\Http\Controllers\TypeDemandeController;
use App\Http\Controllers\TypeActiviteController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\TypeFormationController;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\SousPrefectureController;
use App\Http\Controllers\TypeEntrepriseController;
use App\Http\Controllers\ActiviteArtisanController;
use App\Http\Controllers\BrancheActiviteController;
use App\Http\Controllers\DocumentDemandeController;
use App\Http\Controllers\PaiementInitialController;
use App\Http\Controllers\ChambreRegionaleController;
use App\Http\Controllers\DocumentTypeDemandeController;
use App\Http\Controllers\dashboard\HomeDashboardController;
use App\Http\Controllers\dashboard\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false]);

// les routes de la page vitrine
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('accueil');
    Route::get('/page-Contact', 'contact')->name('accueil.contact');
    Route::get('/finalisation-inscription', 'create'); // on la passe avec l'id de l'artisan pour mettre son mot de passe
    Route::get('/attente-paiementInscription/{idinscription}/{idcartemembre?}', 'show')->name('attente.paiement'); // on la passe avec l'id de l'artisan pour mettre son mot de passe
    Route::get('/inscriptions-artisan', 'inscription')->name('inscription');
    Route::get('/page-connexion-artisan', 'connexion')->name('connexion.artisan');
    Route::post('/identification-artisan', 'identification')->name('identification.artisan');
    Route::post('/traitement-connexion', 'traitementConnexion')->name('artisan.traitementConnexion');
    Route::get('/page-actualiteIndex', 'pageActualite')->name('actualites'); // index de la page des actualites
    Route::get('/page-success/{id}', 'pageSuccess')->name('pageSuccess'); // la page success identification

});

Route::controller(PaiementInitialController::class)->group(function () {
    Route::post('/paiement-inscription', 'paiementInscription')->name('paiement.inscription');
});
// route de l'espace artisan
Route::controller(HomeDashboardController::class)->group(function () {
    Route::get('/tableau-de-bord', 'index')->name('artisan.tableau_de_bord');
    Route::get('/liste-messages', 'listeMessage')->name('artisan.messages');
    Route::get('/liste-apprentis', 'listeApprentis')->name('artisan.apprentis');
    Route::get('/liste-compagnons', 'listeCompagnons')->name('artisan.compagnons');
});
Route::controller(ApprentiController::class)->group(function () {
    Route::get('/creation-apprenis', 'creationApprenti')->name('apprenti.creation'); // la view de creation d'un apprentis
});
Route::controller(CompagnonController::class)->group(function () {
    Route::get('/creation-compagnons', 'creationCompagnon')->name('compagnon.creation'); // la view de creation d'un compagnons
});

Route::middleware('auth')->group(function () {


    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/dashboard-statistiques', 'statistiques')->name('dashboard.statistiques');
    });

    Route::controller(IdentificationController::class)->group(function () {
        Route::put('/refuser-identification/{identification}', 'refuserIdentification')->name('refuser.identification');
        Route::put('/accepter-identification/{identification}', 'accepterIdentification')->name('accepter.identification');
    });

    Route::controller(AdministrateurController::class)->group(function(){
        Route::post('/update-passwordAdministrateur','changePasswordAdministrateur')->name('administrateur.password');
    });

    Route::resources([
        'administrateurs' => AdministrateurController::class,
        'artisans' => ArtisanController::class,
        'compagnons' => CompagnonController::class,
        'apprentis' => ApprentiController::class,
        'agents' => AgentController::class,
        'villes' => VilleController::class,
        'chambreregionales' => ChambreRegionaleController::class,
        'sousprefectures' => SousPrefectureController::class,
        'communes' => CommuneController::class,
        'brancheactivites' => BrancheActiviteController::class,
        'typeentreprises' => TypeEntrepriseController::class,
        'typeactivites' => TypeActiviteController::class,
        'identifications' => IdentificationController::class,
        'activiteartisans' => ActiviteArtisanController::class,
        'typedocuments' => TypeDocumentController::class,
        'typedemandes' => TypeDemandeController::class,
        'documenttypedemandes' => DocumentTypeDemandeController::class,
        'demandes' => DemandeController::class,
        'documentdemandes' => DocumentDemandeController::class,
        'groupes' => GroupeController::class,
        'taxes' => TaxeController::class,
        'penalites' => PenaliteController::class,
        'facturations' => FacturationController::class,
        'paiementinitials' => PaiementInitialController::class,
        'paiements' => PaiementController::class,
        'typeformations' => TypeFormationController::class,
        'formations' => FormationController::class,
        'actualites' => ActualiteController::class,
        'slides' => SlideController::class,
        'parametres' => ParametreController::class,
        'annonces' => AnnonceController::class,
        'faqs' => FAQController::class,
    ]);
    Route::controller(ParametreController::class)->group(function(){
        Route::put('/parametre-update-lien-reseauxSociaux/{parametre}','updateReseauxSociaux')->name('paramtre.reseauSociaux');
    });
    Route::controller(BrancheActiviteController::class)->group(function(){
       Route::put('/mise-ajour/{id}','miseAjour')->name('branche.update');
    });
});
