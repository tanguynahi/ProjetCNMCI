<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreAnnonceRequest;
use App\Http\Requests\UpdateAnnonceRequest;


class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $annonces = Slide::where('categorie', 'Image Annonce')->orderBy('created_at', 'DESC')->get();
        return view('dashboard.annonces.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnonceRequest $request)
    {
        //
        try {
            DB::beginTransaction();

            if ($request->hasFile('lien_image')) {
                // $file_name = Carbon::now()->timestamp . '.' . $request->file('lien_image')->extension();
                $file_name = md5(uniqid()) . '.' . $request->file('lien_image')->extension();
                $request->file('lien_image')->storeAs('images-annonces/', $file_name);
                $lien_image = 'src-files/images-annonces/' . $file_name;
            }

            Slide::create([
                'administrateur_id' => auth()->user()->administrateur->id,
                'titre' => $request->titre,
                'sous_titre' => $request->sous_titre ?? '',
                'lien_image' => $lien_image,
                'categorie' => $request->categorie,
            ]);

            DB::commit();

            toast('Annonce ajoutée avec succès !', 'success');

            // Rediriger l'utilisateur ou effectuer d'autres actions
            return redirect()->route('annonces.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $annonce)
    {
        //
        return view('dashboard.annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnonceRequest $request, Slide $annonce)
    {
        //
        try {
            DB::beginTransaction();

            $files = $request->hasFile('lien_image');
            $lien_image = null;

            if ($files && !empty($annonce->lien_image)) {

                if (File::exists(public_path($annonce->lien_image))) {
                    File::delete(public_path($annonce->lien_image));
                }
                $file_name = md5(uniqid()) . '.' . $request->file('lien_image')->extension();
                $request->lien_image->storeAs('images-annonces/', $file_name);
                $lien_image = 'src-files/images-annonces/' . $file_name;
                $annonce->lien_image = $lien_image;
            }


            $annonce->administrateur_id = auth()->user()->administrateur->id;


            // update slide label if label has changed
            if ($annonce->titre !== $request->titre) {
                $annonce->titre = $request->titre;
            }

            if ($annonce->sous_titre !== $request->sous_titre) {
                $annonce->sous_titre = $request->sous_titre;
            }

            if ($annonce->categorie !== $request->categorie) {
                $annonce->categorie = $request->categorie;
            }

            $annonce->save();

            DB::commit();

            toast('Image modifiée avec succès !', 'success');

            return redirect()->route('annonces.index');
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
    public function destroy(Slide $annonce)
    {
        //
        try {
            DB::beginTransaction();

            $message = "";
            # code...
            $annonce->status = 2;
            $annonce->save();
            $message = "Annonce Supprimée avec succès !";
            $annonce->delete();
            DB::commit();
            toast($message, 'success');
            return redirect()->route('annonces.index');
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
