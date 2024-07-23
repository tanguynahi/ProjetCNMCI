<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Compagnon;
use App\Models\TypeActivite;
use App\Models\TypeDocument;
use App\Models\SousPrefecture;
use App\Models\TypeEntreprise;
use App\Models\ChambreRegionale;
use App\Http\Requests\StoreCompagnonRequest;
use App\Http\Requests\UpdateCompagnonRequest;

class CompagnonController extends Controller
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
    public function store(StoreCompagnonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Compagnon $compagnon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compagnon $compagnon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompagnonRequest $request, Compagnon $compagnon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compagnon $compagnon)
    {
        //
    }

    public function creationCompagnon()
    {
        $chambresRegionales = ChambreRegionale::orderBy('libelle', 'ASC')->get();
        $typeEntreprises = TypeEntreprise::orderBy('libelle', 'ASC')->get();
        $typeActivites = TypeActivite::orderBy('libelle', 'ASC')->get();
        $sousPrefectures = SousPrefecture::orderBy('libelle', 'ASC')->get();
        $typeDocuments = TypeDocument::orderBy('libelle', 'ASC')->get();
        $communes = Commune::orderBy('libelle', 'ASC')->get();
        return view('home.Espaces.compagnons.create', compact('chambresRegionales', 'typeEntreprises', 'typeActivites', 'sousPrefectures', 'typeDocuments', 'communes'));
    }
}
