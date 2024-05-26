<?php

namespace App\Http\Controllers;
use App\Models\articleblog;
use App\Models\User;
use App\Models\tag;
use App\Models\categorie;

use Illuminate\Http\Request;

class ArticleBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = user::All();
        $articleblogs = articleblog::All();
        return view('blogs.index',compact('users','articleblogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = user::All();
        $tags = tag::all();
        $categories = categorie::all();
        return view("blogs.create", compact('users','tags','categories'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $image = $request->file('image');
       // $image_name = $image->getClientOriginalName();
        if (!is_null($image)) {
            // La valeur de l'input existe, attribuer cette valeur à la variable
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $image = '/images/'.$imageName;
        } else {
            // La valeur de l'input n'existe pas, attribuer une valeur par défaut (par exemple, null)
            $image = "NULL";
        }

        $articleblogs = new articleblog();
        $articleblogs->users_id =$request->input('users_id');
        $articleblogs->titre =$request->input('titre');
        $articleblogs->contenue =$request->input('contenue');
        $articleblogs->tags_id =$request->input('tags_id');
        $articleblogs->categories_id =$request->input('categories_id');
        $articleblogs->image=$image;
        $articleblogs->visibilite=true;
        $articleblogs->save();
        return redirect()->route('blogs.show' , $articleblogs->id)
            ->with('success','article cree avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $users = user::All();
        $articleblogs = articleblog::find($id);
        return view('blogs.show',compact('articleblogs','users'));
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
        $articleblogs= articleblog::find($id);
        $articleblogs->delete();
        return redirect()->route("blogs.index")
            ->with('success','article supprime avec succes.');
    }
}
