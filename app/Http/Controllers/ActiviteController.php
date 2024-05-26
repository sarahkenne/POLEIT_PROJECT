<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activite;
use App\Models\user;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = user::All();
        $activites = activite::All();
        return view('activites.index',compact('users','activites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
            $users = user::All();
            return view('activites.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
       
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
        $image = $request->file('image');
  
        if (!is_null($image)) {
            // La valeur de l'input existe, attribuer cette valeur à la variable
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $image = '/images/'.$imageName;
        } else {
            // La valeur de l'input n'existe pas, attribuer une valeur par défaut (par exemple, null)
            $image = "NULL";
        }

        $activite = new activite();
        $activite->users_id =$request->input('users_id');
        $activite->nom=$request->input('nom');
        $activite->lieu=$request->input('lieu');
        $activite->date_debut=$request->input('date_debut');
        $activite->date_fin=$request->input('date_fin');
        $activite->type=$request->input('type');
        $activite->cout=$request->input('cout');
        $activite->description=$request->input('description');
        $activite->image=$image;
     #   $activite->image_name=$image_name;
        $activite->statut=true;
        $activite->save();
        return redirect()->route('activites.show' , $activite->id)
            ->with('success','sujet cree avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $users = user::All();
        $activites = activite::find($id);
        return view('activites.show',compact('activites','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = user::findAll();
        $activite = activite::find($id);
        return view('activites.edit',compact('activite','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $activite = activite::find($id);
        $activite->statut=$request->input('statut');
        $activite->save();
        return redirect()->route("activites.index")
            ->with('success','activite modifie avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $activite= Activite::find($id);
        $activite->delete();
        return redirect()->route("activites.index")
            ->with('success','sujet supprime avec succes.');
    }
}
