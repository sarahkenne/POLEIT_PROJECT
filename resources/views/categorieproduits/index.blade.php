@extends('layouts.app1')

@section('title', 'Toutes les catégories')

@section('content')
<h3>Liste des catégories des produits</h3>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Catégories</h1>
        <button class="btn btn-secondary" data-toggle="modal" data-target="#addCategoryModal" style="text-decoration: none"><a href="{{ route('categorieproduits.create')}}">Ajouter une catégorie</a> </button>
    </div>
    <div class="row">
        @foreach($categorieproduits as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->intitule }}</h5>
                        <p class="card-text">{{ Str::limit($category->description, 100) }}</p>
                        <a href="{{ route('categorieproduits.show', $category->id) }}" class="btn btn-primary">Voir les produits</a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editCategoryModal{{ $category->id }}">Modifier</button>
                        <form action="{{ route('categorieproduits.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Category Modal -->
            <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Modifier la catégorie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('categorieproduits.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="intitule">Intitulé</label>
                                    <input type="text" class="form-control" id="intitule" name="intitule" value="{{ $category->intitule }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $category->description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Ajouter une nouvelle catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categorieproduits.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="intitule">Intitulé</label>
                        <input type="text" class="form-control" id="intitule" name="intitule" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
