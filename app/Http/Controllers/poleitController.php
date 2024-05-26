<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inscriptionActivite;
use App\Models\activite;
use App\Models\user;

class poleitController extends Controller
{
    //
    public function saveparticipant(Request $request, $id)
    {
        //
        $activite = new activite();
        $activite->users_id =$request->input('users_id');
        $activite->nom=$request->input('nom');
        $activite->lieu=$request->input('lieu');
        $activite->date_debut=$request->input('date_debut');
        $activite->date_fin=$request->input('date_fin');
        $activite->type=$request->input('type');
        $activite->cout=$request->input('cout');
        $activite->description=$request->input('description');
       
     #   $activite->image_name=$image_name;
        $activite->statut=true;
        $activite->save();
        return redirect()->route("activites.index")
            ->with('success','activite modifie avec succes.');
    }

}
