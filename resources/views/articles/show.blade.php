<table>
    <tr>
        <th>Nom</th>
        <th>Détails</th>
        <th>Image</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Utilisateur</th>
        <th></th>
    </tr>
    <tr>
        <td>{{ $articles->nom }}</td>
        <td>{{ $articles->details }}</td>
        <td><img src="{{ $articles->image }}" alt="Image de l'article" width="100px" height="100px"></td>
        <td>{{ $articles->categories->intitule }}</td>
        <td>{{ $articles->getPrice() }}</td>
        <td>{{ $articles->users->name }}</td>
        <td>
            <form action="{{ route('paniers.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $articles->id }}">
                <input type="hidden" name="nom" value="{{ $articles->nom}}">
                <input type="hidden" name="prix" value="{{ $articles->prix }}">
                <button type="submit">Ajouter au panier</button>
            </form>
        </td>
    </tr>
</table>