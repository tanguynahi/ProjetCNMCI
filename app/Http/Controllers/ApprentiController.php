<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Apprenti;
use App\Models\TypeActivite;
use App\Models\TypeDocument;
use App\Models\SousPrefecture;
use App\Models\TypeEntreprise;
use App\Models\ChambreRegionale;
use App\Http\Requests\StoreApprentiRequest;
use App\Http\Requests\UpdateApprentiRequest;

class ApprentiController extends Controller
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
    public function store(StoreApprentiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Apprenti $apprenti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apprenti $apprenti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprentiRequest $request, Apprenti $apprenti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apprenti $apprenti)
    {
        //
    }

    // creation d'un appprentis par un artisan
    public function creationApprenti()
    {
        $chambresRegionales = ChambreRegionale::orderBy('libelle', 'ASC')->get();
        $typeEntreprises = TypeEntreprise::orderBy('libelle', 'ASC')->get();
        $typeActivites = TypeActivite::orderBy('libelle', 'ASC')->get();
        $sousPrefectures = SousPrefecture::orderBy('libelle', 'ASC')->get();
        $typeDocuments = TypeDocument::orderBy('libelle', 'ASC')->get();
        $communes = Commune::orderBy('libelle', 'ASC')->get();
        return view('home.Espaces.apprentis.create', compact('chambresRegionales', 'typeEntreprises', 'typeActivites', 'sousPrefectures', 'typeDocuments', 'communes'));
    }
}
