<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorieproduit;
use App\Models\article;

class CategorieProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorieproduits = categorieproduit::All();
        return view('categorieproduits.index',compact('categorieproduits'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("categorieproduits.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $categorieproduits = new categorieproduit();
        $categorieproduits->intitule =$request->input('intitule');
        $categorieproduits->description =$request->input('description');
        $categorieproduits->save();
        return redirect()->route('categorieproduit.show' , $categorieproduits->id)
            ->with('success','categorie cree avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $articles = article::All();
        $categorieproduits = categorieproduit::find($id);
        return view('categorieproduits.show',compact('categorieproduits', 'articles'));
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
        $categorieproduits= categorieproduit::find($id);
        $categorieproduits->delete();
        return redirect()->route("categorieproduits.index")
            ->with('success','categorie supprime avec succes.');
    }
}
