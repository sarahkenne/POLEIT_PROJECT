<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = contact::All();
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $contats = new contact();
        $contats->numero_tel =$request->input('numero_tel');
        $contats->nom =$request->input('nom');
        $contats->email =$request->input('email');
        $contats->message =$request->input('message');
        $contats->save();
        return redirect()->route('contacts.index' )
            ->with('success','message envoye');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
      
        $contacts = contact::find($id);

        return view('articles.show',compact('contacts'));
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
        $contacts= contact::find($id);
        $contacts->delete();
        return redirect()->route("contacts.index")
            ->with('success','message supprime avec success.');

    }
}
