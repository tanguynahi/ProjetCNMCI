<?php

namespace App\Http\Controllers;

use App\Models\TypeActivite;
use App\Models\BrancheActivite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreTypeActiviteRequest;
use App\Http\Requests\UpdateTypeActiviteRequest;

class TypeActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $branches = BrancheActivite::where('status','1')->get();
        $metiers = TypeActivite::orderBy('created_at','DESC')->get();
        return view('dashboard.typeactivites.index',compact('branches','metiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $branches = BrancheActivite::where('status','1')->get();
        return view('dashboard.typeactivites.create',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeActiviteRequest $request)
    {
         try {
            DB::beginTransaction();
            TypeActivite::create([
                'branche_activite_id' => $request->branche_activite_id,
                'libelle' => $request->libelle,
                'description' => $request->description ?? '',
            ]);
            DB::commit();

            toast('Métier ajoutée avec succès !', 'success');

            // Rediriger l'utilisateur ou effectuer d'autres actions
            return redirect()->route('typeactivites.index');
        } catch (\Throwable $e) {
            //throw $th;
            DB::rollBack();
            toast('Une erreur s\'est produit, Veuillez réessayer.', 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(TypeActivite $typeActivite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $typeActivite = TypeActivite::findOrFail($id);
        // dd($typeActivite);
        $branches = BrancheActivite::where('status','1')->get();
        return view('dashboard.typeactivites.edit',compact('typeActivite','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeActiviteRequest $request, TypeActivite $typeActivite)
    {
        //

        try {
            DB::beginTransaction();

            // update brancheActivite label
            if ($typeActivite->libelle !== $request->libelle) {
                $typeActivite->libelle = $request->libelle;
            }

            if ($typeActivite->description !== $request->description) {
                $typeActivite->description = $request->description;
            }
            if ($typeActivite->branche_activite_id !== $request->branche_activite_id) {
                $typeActivite->branche_activite_id = $request->branche_activite_id;
            }
            $typeActivite->save();

            DB::commit();

            toast('Branche d\'activité modifiée avec succès !', 'success');

            return redirect()->route('typeactivites.index');
        } catch (\Throwable $e) {
            //throw $th;
            DB::rollBack();

            toast("Une erreur s'est produite, veuillez réessayer.", 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $typeActivite = TypeActivite::findOrFail($id);
        // dd($typeActivite);
        try {
            DB::beginTransaction();
            $message = "";
            # code...
            $typeActivite->status = 2;
            $typeActivite->save();
            $message = "métier Supprimée avec succès !";
            $typeActivite->delete();
            DB::commit();
            toast($message, 'success');
            return redirect()->route('typeactivites.index');
        } catch (\Throwable $e) {
            //throw $th;
            // dd('elel');
            DB::rollBack();
            toast("Une erreur s'est produite, veuillez réessayer.", 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
