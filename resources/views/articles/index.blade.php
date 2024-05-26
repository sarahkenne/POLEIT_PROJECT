<div>
    <a href="{{ route('paniers.index')}}">panier <span>{{ Cart::count()}}</span> </a>
</div>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Details</th>
            <th>Image</th>
            <th>Categorie Produits ID</th>
            <th>User ID</th>
            <th>Prix</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ $article->nom }}</td>
            <td>{{ $article->details }}</td>
            <td><img src="{{ $article->image }}" alt="Image de l'article" width="100px" height="100px"></td>
            <td>{{ $article->categories->intitule }}</td>
            <td>{{ $article->users->name }}</td>
            <td>{{ $article->getPrice() }}</td>
            <td><a href="{{ route('articles.show', $article->id) }}">Voir</a></td>
            <td>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>