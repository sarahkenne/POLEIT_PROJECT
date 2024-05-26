<?php

namespace App\Http\Controllers;

use App\Models\articleblog;
use Illuminate\Http\Request;
use App\Models\categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = categorie::All();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $categories = new categorie();
        $categories->intitule =$request->input('intitule');
        $categories->description =$request->input('description');
        $categories->save();
        return redirect()->route('categories.show' , $categories->id)
            ->with('success','categorie cree avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $blogs = articleblog::All();
        $categories = categorie::find($id);
        return view('categories.show',compact('categories','blogs'));
    
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
        $categories= categorie::find($id);
        $categories->delete();
        return redirect()->route("categories.index")
            ->with('success','categorie supprime avec succes.');
    }
}
