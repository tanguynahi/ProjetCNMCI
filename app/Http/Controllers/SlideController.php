<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // $slides = Slide::whereCategorie('Image Partenaire','Image Carousel')->get();
        $slides = Slide::where('categorie', 'Image Partenaire')->orWhere('categorie', 'Image Carousel')->orderBy('created_at', 'ASC')->get();
        // dd( $slides);
        return view('dashboard.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideRequest $request)
    {
        //
        try {
            DB::beginTransaction();

            if ($request->hasFile('lien_image')) {
                // $file_name = Carbon::now()->timestamp . '.' . $request->file('lien_image')->extension();
                $file_name = md5(uniqid()) . '.' . $request->file('lien_image')->extension();
                $request->file('lien_image')->storeAs('images-slides/', $file_name);
                $lien_image = 'src-files/images-slides/' . $file_name;
            }

            Slide::create([
                'administrateur_id' => auth()->user()->administrateur->id,
                'titre' => $request->titre,
                'sous_titre' => $request->sous_titre ?? '',
                'lien_image' => $lien_image,
                'categorie' => $request->categorie,
            ]);

            DB::commit();

            toast('Image ajoutée avec succès !', 'success');

            // Rediriger l'utilisateur ou effectuer d'autres actions
            return redirect()->route('slides.index');
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
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        //
        return view('dashboard.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        //
        // dd($request->all());
        try {
            DB::beginTransaction();

            $files = $request->hasFile('lien_image');
            $lien_image = null;

            if ($files && !empty($slide->lien_image)) {

                if (File::exists(public_path($slide->lien_image))) {
                    File::delete(public_path($slide->lien_image));
                }
                $file_name = md5(uniqid()) . '.' . $request->file('lien_image')->extension();
                $request->lien_image->storeAs('images-slides/', $file_name);
                $lien_image = 'src-files/images-slides/' . $file_name;
                $slide->lien_image = $lien_image;
            }


            $slide->administrateur_id = auth()->user()->administrateur->id;


            // update slide label if label has changed
            if ($slide->titre !== $request->titre) {
                $slide->titre = $request->titre;
            }

            if ($slide->sous_titre !== $request->sous_titre) {
                $slide->sous_titre = $request->sous_titre;
            }

            if ($slide->categorie !== $request->categorie) {
                $slide->categorie = $request->categorie;
            }

            $slide->save();

            DB::commit();

            toast('Image modifiée avec succès !', 'success');

            return redirect()->route('slides.index');
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
    public function destroy(Slide $slide)
    {
        //
        try {
            DB::beginTransaction();

            $message = "";
            # code...
            $slide->status = 2;
            $slide->save();
            $message = "Images Supprimée avec succès !";
            $slide->delete();

            DB::commit();

            toast($message, 'success');

            return redirect()->route('slides.index');
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
