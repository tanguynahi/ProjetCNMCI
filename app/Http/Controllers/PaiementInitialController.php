<?php

namespace App\Http\Controllers;

use App\Models\Facturation;
use Illuminate\Http\Request;
use App\Models\PaiementInitial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PaiementInscriptionRequest;
use App\Http\Requests\StorePaiementInitialRequest;
use App\Http\Requests\UpdatePaiementInitialRequest;

class PaiementInitialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaiementInitialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaiementInitial $paiementInitial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaiementInitial $paiementInitial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaiementInitialRequest $request, PaiementInitial $paiementInitial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaiementInitial $paiementInitial)
    {
        //
    }



    // route home
    public function paiementInscription(PaiementInscriptionRequest $request)
    {
        // dd($request->all());
        // $activiteArtisanID = $request->activite_artisan_id;
        // $facturationCarteMembre = Facturation::where('id', $request->facturation_id_2)->first();
        // dd($request->facturation_id_2);

        try {
            DB::beginTransaction();
            if ($request->facturation_id_1 && $request->facturation_id_2) {
                $codePaiement1 = generateCode2('Ref');
                $paiementInital1 = PaiementInitial::create([
                    'chambre_regionale_id' => $request->chambre_regionale_id,
                    'activite_artisan_id' => $request->activite_artisan_id,
                    'artisan_id' => $request->artisan_id,
                    'facturation_id' => $request->facturation_id_1,
                    'reference' => $codePaiement1,
                    'montant_initial' => $request->faturationinscription,
                    'frais' => 0,
                    'montant_total' => $request->faturationinscription,
                ]);
                if ($paiementInital1) {
                    $codePaiement2 = generateCode2('Ref');
                    $paiementInital2 = PaiementInitial::create([
                        'chambre_regionale_id' => $request->chambre_regionale_id,
                        'activite_artisan_id' => $request->activite_artisan_id,
                        'artisan_id' => $request->artisan_id,
                        'facturation_id' => $request->facturation_id_2,
                        'reference' => $codePaiement2,
                        'montant_initial' => $request->montant_initial,
                        'frais' => 0,
                        'montant_total' => $request->montant_initial,
                    ]);
                }

                $facturationInscription = Facturation::where('id', $request->facturation_id_1)->first();// faturation inscription
                $facturationInscription2 = Facturation::where('id', $request->facturation_id_2)->first(); // facturation carte membre
                $activiteArtisanId = Facturation::where('activite_artisan_id', $facturationInscription->activite_artisan_id)->pluck('activite_artisan_id')->first();

                dd($facturationInscription2);

            } elseif ($request->facturation_id_1 > 0 && $request->facturation_id_2 == 0) {
                // si il ya pas de collaborateur
                $codePaiement3 = generateCode2('Ref');
                $paiementInital3 = PaiementInitial::create([
                    'chambre_regionale_id' => $request->chambre_regionale_id,
                    'activite_artisan_id' => $request->activite_artisan_id,
                    'artisan_id' => $request->artisan_id,
                    'facturation_id' => $request->facturation_id_1,
                    'reference' => $codePaiement3,
                    'montant_initial' => $request->faturationinscription,
                    'frais' => 0,
                    'montant_total' => $request->faturationinscription,
                ]);
                // dd('test');
                $facturationInscription = Facturation::where('id', $request->facturation_id_1)->first();
                $activiteArtisanId = Facturation::where('activite_artisan_id', $facturationInscription->activite_artisan_id)->pluck('activite_artisan_id')->first();

                dd($activiteArtisanId);
            }


            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            // dd('test');
            toast('Une erreur s\'est produit, Veuillez réessayer.', 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
