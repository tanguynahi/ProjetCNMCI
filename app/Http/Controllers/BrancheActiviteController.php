<?php

namespace App\Http\Controllers;

use App\Models\BrancheActivite;
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
        return view('dashboard.branches.index',compact('brancheActivites'));
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
    public function store(StoreBrancheActiviteRequest $request)
    {
        //
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
    }
}
