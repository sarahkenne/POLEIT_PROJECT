<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" required>
    </div>

    <div>
        <label for="contenue">Contenu :</label>
        <textarea name="contenue" id="contenue" required></textarea>
    </div>

    <div>
        <label for="image">Image :</label>
        <input type="file" name="image" id="image">
    </div>

    <div>
        <label for="visibilite">Visibilité :</label>
        <input type="checkbox" name="visibilite" id="visibilite">
    </div>

    <div>
        <label for="users_id">Utilisateur :</label>
        <select name="users_id" id="users_id" required>
            <option value="">-- Sélectionner un auteur --</option>
            <!-- Ajoutez ici les options pour sélectionner un utilisateur -->
            @foreach ($users as $users)
            <option value="{{ $users->id }}">{{ $users->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="tags_id">Tags :</label>
        <select name="tags_id" id="tags_id" required>
            <option value="">-- Sélectionner un tag --</option>
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->intitule}}</option>
            @endforeach
            <!-- Ajoutez ici les options pour sélectionner un tag -->
        </select>
    </div>

    <div>
        <label for="categories_id">Catégorie :</label>
        <select name="categories_id" id="categories_id" required>
            <option value="">-- Sélectionner une categorie --</option>
            @foreach($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->intitule}}</option>
            @endforeach
            <!-- Ajoutez ici les options pour sélectionner une catégorie -->
        </select>
    </div>

    <button type="submit">Créer l'article</button>
</form>