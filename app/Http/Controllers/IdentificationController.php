<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
// use App\Models\Taxe;
use App\Models\User;
use App\Models\Gerant;
use App\Models\Artisan;
use App\Models\Commune;
use App\Models\Facturation;
use Illuminate\Http\Request;
use App\Models\Identification;
use App\Models\TypeEntreprise;
use Illuminate\Support\Carbon;
use App\Models\ActiviteArtisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreIdentificationRequest;
use App\Http\Requests\UpdateIdentificationRequest;
use App\Notifications\PaiementDroitInscriptionArtisan;

class IdentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $us = session()->get('user');
        // dd($us);
        $reponse = Http::get(urlAPI() . '/list-identification/'.$us['ID_USERS']);
        $ResJSON = $reponse->json();
        // dd(($ResJSON['data']) );
        if ($reponse->status() === 200) {
            if ($ResJSON['code'] === 200) {
                $identifications = $ResJSON['data'];
                return view('dashboard.identifications.index', compact('identifications', 'us'));
            } else {
                if ($ResJSON['code'] == 401) {
                    $mess = messageBrut($ResJSON['message']);
                } else {
                    $mess = $ResJSON['message'];
                }
            }
        } else {
            $mess = 'Une erreur inattendue s\'est produite, verifier que vous avez accès à internet, ' .
            'puis reéssayer. erreur ' . $reponse->status();
        }
        toast($mess, 'error');
        return back()->with('message', $mess);
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
    public function store(StoreIdentificationRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $us = session()->get('user');
        
        $reponse = Http::get(urlAPI() . '/infos-ident/'.$id);
        $ResJSON = $reponse->json();
        // dd(($ResJSON) );
        if ($reponse->status() === 200) {
            if ($ResJSON['code'] === 200) {
                $identification = $ResJSON['data'];
                // dd($identification);
                // return view('dashboard.identifications.index', compact('identifications', 'us'));
                return view('dashboard.identifications.show', compact('identification','us'));
                // return redirect()->route('formulaire');
            } else {
                $mess = messageBrut($ResJSON['message']);
                
            }
        } else {
            $mess = 'Une erreur inattendue s\'est produite, verifier que vous avez accès à internet, ' .
                'puis reéssayer. erreur ' . $reponse->status();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Identification $identification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdentificationRequest $request, Identification $identification)
    {
        //
    }


    public function accepterIdentification($id)
    {
        
        $us = session()->get('user');
        $data = [
            'identifiant' => $id,
            'us_identifiant' => $us['ID_USERS'],
            'value' => "bew"
        ];
      
        $reponse = Http::post(urlAPI() . '/valid-ident/', $data);
        $ResJSON = $reponse->json();
        
        // dd(($ResJSON) );
        
        if ($reponse->status() === 200) {
            if ($ResJSON['code'] === 200) {
                $identification = $ResJSON['data'];
                toast('Identification acceptée avec succes!', 'success');
                return redirect()->route('identifications.index', $identification);
            } else {
                if ($ResJSON['code'] == 401) {
                    $mess = messageBrut($ResJSON['message']);
                } else {
                    $mess = $ResJSON['message'];
                }
            }
        } else {
            $mess = 'Une erreur inattendue s\'est produite, verifier que vous avez accès à internet, ' .
            'puis reéssayer. erreur ' . $reponse->status();
        }
        toast($mess, 'error');
        return back()->with('message', $mess);
    }

    public function refuserIdentification(Request $request, Identification $identification)
    {
        // refuser

        // $us = session()->get('user');
        // // $data = [
        // //     'identifiant' => $id,
        // //     'us_identifiant' => $us->ID_USERS,
        // //     'value' => "bew"
        // // ];
      
        // $reponse = Http::post(urlAPI() . '/valid-ident/', $data);
        // $ResJSON = $reponse->json();
        
        // dd(($ResJSON) );
        
        // if ($reponse->status() === 200) {
        //     if ($ResJSON['code'] === 200) {
        //         $identification = $ResJSON['data'];
        //         toast('Identification acceptée avec succes!', 'success');
        //         return redirect()->route('identifications.index', $identification);
        //     } else {
        //         if ($ResJSON['code'] == 401) {
        //             $mess = messageBrut($ResJSON['message']);
        //         } else {
        //             $mess = $ResJSON['message'];
        //         }
        //     }
        // } else {
        //     $mess = 'Une erreur inattendue s\'est produite, verifier que vous avez accès à internet, ' .
        //     'puis reéssayer. erreur ' . $reponse->status();
        // }
        // toast($mess, 'error');
        // return back()->with('message', $mess);
        

        
        $rules = [
            'motif_refus' => 'required|string|min:3',
        ];

        // Définir les messages de validation personnalisés
        $messages = [
            'motif_refus.required' => 'Le motif du refus est requis.',
            'motif_refus.string' => 'Le motif du refus doit être une chaîne de caractères.',
            'motif_refus.min' => 'Le motif du refus doit avoir au moins 3 caractères.',
        ];

        // Appliquer la validation
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // Rediriger avec les erreurs de validation et les données de la session
            toast('Veuillez renseigner le motif du refus svp!', 'error');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $identification->administrateur_id = auth()->user()->administrateur->id;
            $identification->avis = "Refusée";
            $identification->motif_refus = $request->motif_refus;
            $identification->save();

            DB::commit();

            toast('Inscription rejetée avec succes!', 'success');

            return redirect()->route('identifications.show', $identification);
        } catch (\Throwable $e) {
            //throw $e;
            DB::rollBack(); // Rejetée l'approbation de la demande

            // Loguer l'erreur
            Log::error('Erreur lors du refus de l\'inscription : ' . $e->getMessage());

            toast('Une erreur s\'est produite, Veuillez réessayer', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Identification $identification)
    {
        //
    }
}
