<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrancheActivite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBrancheActiviteRequest;
use App\Http\Requests\UpdateBrancheActiviteRequest;

class BrancheActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brancheActivites = BrancheActivite::orderBy('created_at','DESC')->get();

        // dd( $brancheActivite);
        return view('dashboard.branches.index',compact('brancheActivites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrancheActiviteRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            BrancheActivite::create([
                'libelle' => $request->libelle,
                'description' => $request->description ?? '',
            ]);
            DB::commit();

            toast('Branche d\'activité  ajoutée avec succès !', 'success');

            // Rediriger l'utilisateur ou effectuer d'autres actions
            return redirect()->route('brancheactivites.index');
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
    public function show(BrancheActivite $brancheActivite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrancheActivite $brancheActivite)
    {
        //
        // $brancheActivite = BrancheActivite::findOrFail($id);
        dd($brancheActivite);
        return view('dashboard.branches.edit', compact('brancheActivite'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrancheActiviteRequest $request, BrancheActivite $brancheActivite)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BrancheActivite $brancheActivite)
    {
        //
        try {
            DB::beginTransaction();

            $message = "";
            # code...
            $brancheActivite->status = 2;
            $brancheActivite->save();
            $message = "branche Supprimée avec succès !";
            $brancheActivite->delete();
            DB::commit();
            toast($message, 'success');
            return redirect()->route('brancheactivites.index');
        } catch (\Throwable $e) {
            //throw $th;
            DB::rollBack();
            toast("Une erreur s'est produite, veuillez réessayer.", 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function miseAjour(Request $request,  $id)
    {

        //
        $validatedData = $request->validate([
            'libelle' => 'required|string|min:3',
            'description' => 'nullable|string|min:3',
        ]);
        $brancheActivite = BrancheActivite::findOrFail($id);
        try {
            DB::beginTransaction();

            // update brancheActivite label
            if ($brancheActivite->libelle !== $request->libelle) {
                $brancheActivite->libelle = $request->libelle;
            }

            if ($brancheActivite->description !== $request->description) {
                $brancheActivite->description = $request->description;
            }
            $brancheActivite->save();

            DB::commit();

            toast('Branche d\'activité modifiée avec succès !', 'success');

            return redirect()->route('brancheactivites.index');
        } catch (\Throwable $e) {
            //throw $th;
            DB::rollBack();

            toast("Une erreur s'est produite, veuillez réessayer.", 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        }
    }

}
