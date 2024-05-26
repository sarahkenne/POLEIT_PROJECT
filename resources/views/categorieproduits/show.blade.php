@extends('layouts.app1')

@section('title', 'Détails de la catégorie')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $categorieproduits->intitule }}</h1>
        <a href="{{ route('categorieproduits.index') }}" class="btn btn-primary">Retour à toutes les catégories</a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $categorieproduits->intitule }}</h5>
            <p class="card-text">{{ $categorieproduits->description }}</p>
        </div>
    </div>

    <h3 class="mt-5">Produits de la catégorie</h3>
    <div class="row mt-3">
        @foreach($categorieproduits->articles as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nom }}</h5>
                        <p class="card-text">{{ Str::limit($product->details, 100) }}</p>
                        <a href="{{ route('articles.show', $product->id) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
