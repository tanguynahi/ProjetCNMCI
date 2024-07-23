<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreFAQRequest;
use App\Http\Requests\UpdateFAQRequest;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faqs = FAQ::orderBy('created_at', 'DESC')->get();
        return view('dashboard.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFAQRequest $request)
    {
        //
        try {
            DB::beginTransaction();


            FAQ::create([
                'administrateur_id' => auth()->user()->administrateur->id,
                'libelle' => $request->libelle,
                'description' => $request->description,
            ]);

            DB::commit();

            toast('FAQS ajoutée avec succès !', 'success');

            // Rediriger l'utilisateur ou effectuer d'autres actions
            return redirect()->route('faqs.index');
        } catch (\Throwable $e) {
            //throw $th;
            DB::rollBack();
            toast('Une erreur s\'est produit, Veuillez réessayer.', 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        } //throw $th;

    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $faq)
    {
        //
        return view('dashboard.faqs.edit' ,compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFAQRequest $request, FAQ $faq)
    {
        //
        try {
            DB::beginTransaction();
            $faq->administrateur_id = auth()->user()->administrateur->id;

            if ($faq->libelle === $request->libelle) {
                DB::rollBack();
                toast("Cette faq '$request->libelle' existe déjà, mise à jour annulée.", 'error');
                return redirect()->back();
            }
            if ($faq->libelle !== $request->libelle) {

                $faq->libelle = $request->libelle;
            }
            if ($faq->description !== $request->description) {
                $faq->description = $request->description;
            }
            $faq->save();

            DB::commit();

            toast('faq modifiée avec succès !', 'success');

            return redirect()->route('faqs.index');
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
    public function destroy(FAQ $faq)
    {
        //
        try {
            DB::beginTransaction();

            $message = "";
            # code...
            $faq->status = 2;
            $faq->save();
            $message = "fAQ Supprimée avec succès !";
            $faq->delete();

            DB::commit();

            toast($message, 'success');

            return redirect()->route('faqs.index');
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
