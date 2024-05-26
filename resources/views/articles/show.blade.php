@extends('layouts.app1')

@section('title', 'Détails du produit')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div id="productCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $articles->image }}" class="d-block w-100" alt="{{ $articles->nom }}">
                    </div>
                    <!-- Ajoutez d'autres images du produit ici -->
                </div>
                <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="display-4">{{ $articles->nom }}</h1>
            <p class="lead">{{ $articles->details }}</p>
            <h2 class="text-primary">{{ $articles->getPrice() }}</h2>
            <form action="{{ route('paniers.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $articles->id }}">
                <input type="hidden" name="nom" value="{{ $articles->nom}}">
                <input type="hidden" name="prix" value="{{ $articles->prix }}">
                <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>
@endsection
