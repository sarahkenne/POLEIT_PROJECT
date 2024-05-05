<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Responsable</th>
        <th>Lieu</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Type</th>
        <th>Coût</th>
        <th>Image</th>
        <th>Statut</th>
        <th>Créé le</th>
        <th>Mis à jour le</th>
    </tr>
    <tr>
        <td>{{ $activites->id }}</td>
        <td>{{ $activites->nom }}</td>
        <td>{{ $activites->description }}</td>
        <td>{{ $activites->users->name }}</td>
        <td>{{ $activites->lieu }}</td>
        <td>{{ $activites->date_debut }}</td>
        <td>{{ $activites->date_fin }}</td>
        <td>{{ $activites->type }}</td>
        <td>{{ $activites->cout }}</td>
        <td>{{ $activites->image }}</td>
        <td>{{ $activites->statut }}</td>
        <td>{{ $activites->created_at }}</td>
        <td>{{ $activites->updated_at }}</td>
    </tr>
</table>
<bouton><a href="{{ route('activites.index') }}">Retour</a></bouton>
<form action="{{ route('inscriptions.store',$activites->id) }}" method="POST">
    @csrf
    <input type="hidden" name="activites_id" value="{{ $activites->id }}">
    <input type="hidden" name="users_id" value="{{ $activites->users_id }}">
    <button type="submit">S'inscrire</button>
</form>


<form action="{{ route('activites.update',$activites->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="statut" value="0">
    <button type="submit" class="btn btn-danger">desactiver l'activité</button>
</form>
<form action="{{ route('activites.destroy',$activites->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
