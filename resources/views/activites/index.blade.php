<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Responsable</th>
            <th>Lieu</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Type</th>
            <th>Cout</th>
            <th>Image</th>
            <th>Statut</th>
            <th>temps restant </th>
        </tr>
    </thead>
    <tbody>
        @foreach($activites as $activite)
        <tr>
            <td>{{ $activite->nom }}</td>
            <td>{{ $activite->description }}</td>
            <td>{{ $activite->users->name }}</td>
            <td>{{ $activite->lieu }}</td>
            <td>{{ $activite->date_debut }}</td>
            <td>{{ $activite->date_fin }}</td>
            <td>{{ $activite->type }}</td>
            <td>{{ $activite->cout }}</td>
            <td>@if(($activite->image)!== "NULL")
                 <img src="{{ $activite->image }}" alt="{{ $activite->image_name }}" width="100px" height="100px">
                 @endif
                </td>
            <td>{{ $activite->statut }}</td>
            <td><button><a href="{{ route('activites.show',$activite->id ) }}" class="btn btn-primary">details</a></button> </td>
            <td>
                <form action="{{ route('activites.destroy',$activite->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
