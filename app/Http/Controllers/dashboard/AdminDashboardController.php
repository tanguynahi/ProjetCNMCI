<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Administrateur;
use App\Models\Identification;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $identifications = Identification::where('avis','En Attente')->orderBy('created_at','DESC')->get();
        return view('dashboard.index',compact('identifications'));
    }




}
