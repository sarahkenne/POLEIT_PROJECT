@extends('layouts.app1')

@section('title', 'Détails de la catégorie')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $categories->intitule }}</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Retour à toutes les catégories</a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $categories->intitule }}</h5>
            <p class="card-text">{{ $categories->description }}</p>
        </div>
    </div>

    <h3 class="mt-5">Produits de la catégorie</h3>
    <div class="row mt-3">
        @foreach($categories->blog as $blog)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->nom }}</h5>
                        <p class="card-text">{{ Str::limit($blog->details, 100) }}</p>
                        <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
