<table>
    <thead>
        <tr>
            <th>Intitulé</th>
            <th>Description</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->intitule }}</td>
            <td>{{ $category->description }}</td>
            <td><a href="{{ route('categories.show', $category->id) }}">Voir</a></td>
            <td><a href="{{ route('categories.edit', $category->id) }}">Modifier</a></td>
            <td>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>