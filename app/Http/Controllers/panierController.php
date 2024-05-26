<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use Gloudemans\Shoppingcart\Facades\Cart;



class panierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('paniers.index');
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
     
        Cart::add($request->id,$request->nom,1,$request->prix)
            ->associate('App\Models\article');
        return redirect()->route('articles.index')->with('success','Article ajouté au panier');

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
    public function destroy(string $rowId)
    {
        //
        Cart::remove($rowId);
        return back()->with('sucess','le produit a ete supprime');


    }
    public function dest()
    {
        Cart::destroy(); // Supprime tous les produits du panier

        return redirect()->route('articles.index')->with('success', 'Panier vidé avec succès');
    }
}
