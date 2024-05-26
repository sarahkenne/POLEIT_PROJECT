<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\article;
use App\Models\quandite;

class quantiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::with('quantites')->get();

        // Initialiser un tableau pour stocker les sommes des produits par article
        $articlesWithSum = [];

        foreach ($articles as $article) {
            $sum = 0;
            foreach ($article->quantites as $quandite) {
                $sum += $quandite->quandite; // Assurez-vous que 'amount' est le nom de la colonne que vous voulez additionner
            }
            $articlesWithSum[] = [
                'article' => $article,
                'sum' => $sum
            ];
        }
        $users = user::All();
        $articles = article::All();
        $quandites = quandite::All();
        return view('quantites.index',compact('users','articles','quandites','articlesWithSum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = user::All();
        $articles = article::All();
        return view("quantites.create", compact('users','articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $quandites = new quandite();
        $quandites->articles_id =$request->input('articles_id');
        $quandites->quandite =$request->input('quandite');
        $quandites->etat = 1;
        $quandites->save();
        return redirect()->route('quantites.show' , $quandites->id)
            ->with('success','article cree avec succes.');
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
    }
}
