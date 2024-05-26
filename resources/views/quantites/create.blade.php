@extends('layouts.app1')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Ajouter une quantité d'un produit </h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('produits.store') }}" method="POST">
                    @csrf
                    
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="articles_id" class="form-label">Article  :</label>
                                <select name="articles_id" class="form-control" id="articles_id">
                                    <option value="">-- Sélectionner une article --</option>
                                    @foreach ($articles as $article)
                                    <option value="{{ $article->id }}">{{ $article->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="quandite" class="form-label">Quantité:</label>
                                <input type="number" name="quandite" class="form-control" id="quandite">
                            </div>
                        </div>
                     
                    <input hidden type="numer" name="etat " value="1" >

                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection