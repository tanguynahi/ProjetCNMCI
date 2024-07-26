<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\Administrateur;
use App\Models\Identification;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(){
        $us = session()->get('user');
        $identifications = session()->get('identifications');
        // dd($us);
        return view('dashboard.index',compact('identifications','us'));
    }




}
