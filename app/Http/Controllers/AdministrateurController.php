<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreAdministrateurRequest;
use App\Http\Requests\UpdateAdministrateurRequest;

class AdministrateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrateurs = Administrateur::where('id', '<>', 1)->orderBy('created_at', 'DESC')->get();

        return view('dashboard.administrateurs.index', compact('administrateurs'));
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
    public function store(StoreAdministrateurRequest $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(Administrateur $administrateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrateur $administrateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdministrateurRequest $request, Administrateur $administrateur)
    {
        //

        try {
            DB::beginTransaction();

            $files = $request->hasFile('lien_photo');
            $lien_photo = null;
            // dd($files);
            if ($files) {
                // Log::info('Supression du logo s\'il y\'en avait');

                if (File::exists(public_path($administrateur->lien_photo))) {
                    File::delete(public_path($administrateur->lien_photo));
                }

                $file_name = md5(uniqid()) . '.' . $request->file('lien_photo')->extension();
                $request->lien_photo->storeAs('images-administrateurs/', $file_name);
                $lien_photo = 'src-files/images-administrateurs/' . $file_name;
            }

            $administrateur->user_id = auth()->user()->administrateur->id;
            $administrateur->ville_id = $request->ville_id;
            $administrateur->nom = $request->nom;
            $administrateur->prenom = $request->prenom;
            $administrateur->contact = $request->contact;
            $administrateur->adresse = $request->adresse;
            $administrateur->email = $request->email;
            $administrateur->sexe = $request->sexe;
            $administrateur->lien_photo = $lien_photo ? $lien_photo : $administrateur->lien_photo;

            $administrateur->save();
            // dd( $administrateur->lien_photo);

            DB::commit();

            toast('Information Administrateur modifiées avec succès !', 'success');

            return redirect()->route('parametres.index');
        } catch (\Throwable $e) {
            DB::rollBack();

            toast("Une erreur s'est produite, veuillez réessayer.", 'error');
            Log::error('Erreur interne du serveur: ' . $e->getMessage());

            // $previousUrl = url()->previous() . '#list-item-3';

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrateur $administrateur)
    {
        //
    }


    //  modifier Mot de passe de l'administrateur

    public function changePasswordAdministrateur(Request $request){
        // mes validation
        $rules = [
            'password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ];
        $messages = [
            'password.required' => 'Le mot de passe actuel est requis.',
            'new_password.required' => 'Le nouveau mot de passe est requis.',
            'new_password.min' => 'Le nouveau mot de passe doit contenir au moins 6 caractères.',
            'new_password.confirmed' => 'La confirmation du nouveau mot de passe ne correspond pas.',
        ];
        $validator = Validator::make($request->all(),$rules , $messages);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        // dd('tes');
        // Vérification du mot de passe actuel
        if (!Hash::check($request->input('password'), Auth::user()->password)) {
            return redirect()->back()->withErrors(['password' => 'Le mot de passe actuel est incorrect.']);
        }
        // Mise à jour du mot de passe
        $user = Auth::user();
        $user->password = Hash::make($request->input('new_password'));
        //   dd($user);
        $user->save();
        toast('Vos Mot de passe a été modifié avec succès !', 'success');
        return redirect()->back();
    }
}
