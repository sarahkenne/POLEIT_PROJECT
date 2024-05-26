@extends('layouts.app1')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Ecrire un article de blog </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">article</a></li>
                    <li class="breadcrumb-item active">creer</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-12">
                                <div>
                                    <label for="titre" class="form-label">Titre  :</label>
                                    <input type="text" class="form-control" name="titre" id="titre" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-12">
                                <div>
                                    <label for="contenue" class="form-label">Contenu :</label>
                                    <textarea name="contenue" class="form-control" id="contenue" required></textarea>
                                </div>
                            </div>
                            <div class="col-xxl-5 col-md-11">
                                <div>
                                    <label for="image" class="form-label">Image :</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                            <div class="col-xxl-1 col-md-1">
                                <label for="visibilite" class="form-check-label">Visibilité :</label>
                                <input type="checkbox" name="visibilite" class="form-check-input" id="visibilite" checked>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <div>
                                    <label for="users_id" class="form-label">Utilisateur :</label>
                                    <select name="users_id" class="form-control" id="users_id" required>
                                        <option value="">-- Sélectionner un auteur --</option>
                                        <!-- Ajoutez ici les options pour sélectionner un utilisateur -->
                                        @foreach ($users as $users)
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <div>
                                    <label for="tags_id" class="form-label" >Tags :</label>
                                    <select name="tags_id" id="tags_id" class="form-control" required>
                                        <option value="">-- Sélectionner un tag --</option>
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->intitule}}</option>
                                        @endforeach
                                        <!-- Ajoutez ici les options pour sélectionner un tag -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <div>
                                    <label for="categories_id" class="form-label" >Catégorie :</label>
                                    <select name="categories_id" class="form-control" id="categories_id" required>
                                        <option value="">-- Sélectionner une categorie --</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->intitule}}</option>
                                        @endforeach
                                        <!-- Ajoutez ici les options pour sélectionner une catégorie -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>   
                </form>
            </div>
    <!--end col-->
</div>
@endsection
