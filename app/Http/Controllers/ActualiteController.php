<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Actualite;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreActualiteRequest;
use App\Http\Requests\UpdateActualiteRequest;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $actualites = Actualite::orderBy('created_at', 'ASC')->get();
        return view('dashboard.actualites.index', compact('actualites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.actualites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActualiteRequest $request)
    {
        //
        // dd('test');
        try {
            DB::beginTransaction();

            $lien_photo = null;
            if ($request->hasFile('lien_photo')) {
                $file_name = md5(uniqid()) . '.' . $request->file('lien_photo')->extension();
                $request->file('lien_photo')->storeAs('images-actualite/', $file_name);
                $lien_photo = 'src-files/images-actualite/' . $file_name;
            }
            $actualite = Actualite::create([
                'administrateur_id' => auth()->user()->administrateur->id,
                'libelle' => $request->libelle,
                'description' => $request->description,
                'date_actualite' => $request->date_actualite,
                'lien_photo' => $lien_photo,
            ]);
            // dd($actualite);
            DB::commit();

            toast('Actualites ajouté avec succès !', 'success');
            return redirect()->route('actualites.index');
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
    public function show(Actualite $actualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actualite $actualite)
    {
        //
        return view('dashboard.actualites.edit', compact('actualite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActualiteRequest $request, Actualite $actualite)
    {
        //
        try {
            DB::beginTransaction();

            $files = $request->hasFile('lien_photo');
            $lien_photo = null;

            $description = $request->description;
            // $dom = new DOMDocument();
            // $dom->loadHTML($description,9);

            if ($files && !empty($actualite->lien_photo)) {
                if (File::exists(public_path($actualite->lien_photo))) {
                    File::delete(public_path($actualite->lien_photo));
                }
                // $file_name = Carbon::now()->timestamp . '.' . $request->file('lien_photo')->extension();
                $file_name = md5(uniqid()) . '.' . $request->file('lien_photo')->extension();
                $request->lien_photo->storeAs('images-actualite/', $file_name);
                $lien_photo = 'src-files/images-actualite/' . $file_name;
                $actualite->lien_photo = $lien_photo;
            }


            $actualite->administrateur_id = auth()->user()->administrateur->id;
            // $description = $dom->saveHTML();
            // update qctuqlite label if label has changed
            if ($actualite->libelle === $request->libelle) {
                DB::rollBack();
                toast("Cette actualité '$request->libelle' existe déjà, mise à jour annulée.", 'error');
                return redirect()->back();
            }
            if ($actualite->libelle !== $request->libelle) {
                // $libelleExists = Actualite::where('libelle', $request->libelle)->first();
                // dd('tets');

                $actualite->libelle = $request->libelle;
                // dd($actualite->libelle);
            }
            // dd('tets');

            if ($actualite->description !== $request->description) {
                $actualite->description = $description;
            }

            if ($actualite->date_actualite !== $request->date_actualite) {
                $actualite->date_actualite = $request->date_actualite;
            }

            $actualite->save();

            DB::commit();

            toast('Actualité modifiée avec succès !', 'success');

            return redirect()->route('actualites.index');
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
    public function destroy(Actualite $actualite)
    {
        //
        try {
            DB::beginTransaction();

            $message = "";
            # code...
            $actualite->status = 2;
            $actualite->save();
            $message = "Actualité Supprimée avec succès !";
            $actualite->delete();

            DB::commit();

            toast($message, 'success');

            return redirect()->route('actualites.index');
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
