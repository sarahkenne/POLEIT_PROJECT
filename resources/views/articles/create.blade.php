<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
    </div>

    <div>
        <label for="details">Détails :</label>
        <textarea name="details" id="details" rows="4"></textarea>
    </div>

    <div>
        <label for="image">Image :</label>
        <input type="file" name="image" id="image">
    </div>

    <div>
        <label for="categorieproduits_id">Catégorie :</label>
        <select name="categorieproduits_id" id="categorieproduits_id">
            <option value="">-- Sélectionner une categorie --</option>
            @foreach ($categorieproduits as $categorieproduit)
            <option value="{{ $categorieproduit->id }}">{{ $categorieproduit->intitule }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="users_id">Utilisateur :</label>
        <select name="users_id" id="users_id">
            <option value="">-- Sélectionner un utilisateur --</option>
            @foreach ($users as $users)
            <option value="{{ $users->id }}">{{ $users->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="prix">Prix :</label>
        <input type="number" name="prix" id="prix">
    </div>

    <button type="submit">Enregistrer</button>
</form>