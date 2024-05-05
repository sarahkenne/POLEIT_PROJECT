<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inscriptionActivite;
use App\Models\activite;
use App\Models\user;

class inscriptionActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = user::All();
        $activites = activite::All();
        return view('inscriptions.index',compact('users','activites'));
    
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
    public function store(Request $request)
    {
        //
        $id = "1";
        $inscriptionActivite = new inscriptionActivite();
        $inscriptionActivite->users_id =$request->input('users_id');
        $inscriptionActivite->activites_id =$request->input('activites_id');
        $inscriptionActivite->save();
        return redirect()->route('activites.show' , $id)
            ->with('success','vous etes inscrit.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $inscriptionActivite = inscriptionActivite::find($id);
        $inscriptionActivite->delete();
        return redirect()->route("activites.index")
            ->with('success','mise a jour de votre status.');

    }
}
