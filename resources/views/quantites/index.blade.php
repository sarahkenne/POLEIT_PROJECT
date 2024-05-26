@extends('layouts.app1')

@section('content')
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Article ID</th>
            <th>Quantité</th>
            <th>Créé le</th>
            <th>Mis à jour le</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articlesWithSum as $item)
            <tr>
                <td>{{ $item['article']->nom }}</td> 
                <td>{{ $item['sum'] }}</td>
                <td>{{ $item['article']->created_at }}</td> <!-- Ajouter cette ligne pour afficher la date de création -->
                <td>{{ $item['article']->updated_at }}</td> <!-- Ajouter cette ligne pour afficher la date de mise à jour -->
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
