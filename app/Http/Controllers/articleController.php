<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\article;
use App\Models\categorieproduit;

use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = user::All();
        $articles = article::All();
        return view('articles.index',compact('users','articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = user::All();
        $categorieproduits = categorieproduit::All();
        return view('articles.create',compact('users','categorieproduits'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $articles = new article();
        $articles->users_id =$request->input('users_id');
        $articles->nom =$request->input('nom');
        $articles->details =$request->input('details');
        $articles->prix =$request->input('prix');
        $articles->categorieproduits_id =$request->input('categorieproduits_id');
        $articles->image=$image;
        $articles->save();
        return redirect()->route('articles.show' , $articles->id)
            ->with('success','article cree avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $users = user::All();
        $articles = article::find($id);
        $categorieproduits = categorieproduit::find($id);
        return view('articles.show',compact('articles','users','categorieproduits'));
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
        $articles= article::find($id);
        $articles->delete();
        return redirect()->route("articles.index")
            ->with('success','article supprime avec succes.');
    }
}
