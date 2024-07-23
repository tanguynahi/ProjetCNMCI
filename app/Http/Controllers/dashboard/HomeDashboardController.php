<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;

class HomeDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home.Espaces.index');
    }

    /*---
             Controller Conversation artisan et sa Chambre Régionale
    -----*/
    public function listeMessage()
    {
        return view('home.Espaces.discution.index');
    }

    public function listeApprentis()
    {
        return view('home.Espaces.apprentis.index');
    }

    public function listeCompagnons()
    {
        return view('home.Espaces.compagnons.index');
    }
}
