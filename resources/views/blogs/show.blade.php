<!-- /c:/wamp64/www/POLEIT_PROJECT/resources/views/blogs/index.blade.php -->
<div class="container">
    <h1> l'article    {{ $articleblogs->titre }} </h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenu</th>
                <th>Image</th>
                <th>Visibilité</th>
                <th>Utilisateur</th>
                <th>Tags</th>
                <th>Catégories</th>
                <th>Créé le</th>
                <th>Mis à jour le</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $articleblogs->id }}</td>
                 
                    <td>{{ $articleblogs->contenue }}</td>
                    <td>{{ $articleblogs->image }}</td>
                    <td>{{ $articleblogs->visibilite ? 'Visible' : 'Invisible' }}</td>
                    <td>{{ $articleblogs->users->name }}</td>
                    <td>{{ $articleblogs->tags->intitule }}</td>
                    <td>{{ $articleblogs->categories->intitule}}</td>
                    <td>{{ $articleblogs->created_at }}</td>
                    <td>{{ $articleblogs->updated_at }}</td>
                </tr>
            
        </tbody>
    </table>
</div>