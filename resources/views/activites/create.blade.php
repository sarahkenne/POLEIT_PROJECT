<form action="{{ route('activites.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="nom">Nom de l'activite :</label>
        <input type="text" name="nom" id="nom" required>
    </div>

    <div>
        <label for="description">Description :</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <div>
        <label for="users_id">Responsable :</label>
        <select name="users_id" id="users_id" required>
            <option value="">-- Sélectionner un responsable --</option>
            @foreach ($users as $users)
            
            <option value="{{ $users->id }}">{{ $users->name }}</option>
            @endforeach
            
            <!-- Ajoutez ici la logique pour récupérer la liste des utilisateurs -->
        </select>
    </div>

    <div>
        <label for="lieu">Lieu :</label>
        <input type="text" name="lieu" id="lieu" required>
    </div>

    <div>
        <label for="date_debut">Date de début :</label>
        <input type="date" name="date_debut" id="date_debut">
    </div>

    <div>
        <label for="date_fin">Date de fin :</label>
        <input type="date" name="date_fin" id="date_fin">
    </div>

    <div>
        <label for="type">Type :</label>
        <select name="type" id="type" required>
            <option value="">-- Sélectionner la periode --</option>
            <option value="matin">matin</option>
            <option value="soir">soir</option>
            <option value="toute_journee">toute la journee</option>
            <option value="inconnue">inconnue</option>
        </select>
    </div>

    <div>
        <label for="cout">Coût :</label>
        <input type="number" name="cout" id="cout">
    </div>

    <div>
        <label for="image">Image :</label>
        <input type="file" name="image" id="image">
    </div>

    <div>
        <label for="statut">Statut :</label>
        <input type="checkbox" name="statut" id="statut">
    </div>

    <button type="submit">Créer</button>
</form>