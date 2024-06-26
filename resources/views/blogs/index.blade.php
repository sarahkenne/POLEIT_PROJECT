@extends('layouts.poleit')

@section('content')
    <div class="container">
        <h1>Liste des articles du blog</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Image</th>
                    <th>Visibilité</th>
                    <th>Utilisateur</th>
                    <th>Tags</th>
                    <th>Catégories</th>
                    <th>Créé le</th>
                    <th>Mis à jour le</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articleblogs as $articleblog)
                    <tr>
                        <td>{{ $articleblog->id }}</td>
                        <td>{{ $articleblog->titre }}</td>
                        <td>{{ $articleblog->contenue }}</td>
                        <td>{{ $articleblog->image }}</td>
                        <td>{{ $articleblog->visibilite ? 'Visible' : 'Invisible' }}</td>
                        <td>{{ $articleblog->users->name }}</td>
                        <td>{{ $articleblog->tags->intitule }}</td>
                        <td>{{ $articleblog->categories->intitule }}</td>
                        <td>{{ $articleblog->created_at }}</td>
                        <td>{{ $articleblog->updated_at }}</td>
                        <td><a href="{{ route('blogs.show', $articleblog->id) }}" class="btn btn-primary">Voir</a></td>
                        
                        <td width = "10px">
                            <form action="{{ route('blogs.destroy',$articleblog->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>  
                        </td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection