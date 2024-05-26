<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Numéro de téléphone</th>
            <th>Email</th>
            <th>Message</th>
            <th>Créé le</th>
            <th>Mis à jour le</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->nom }}</td>
            <td>{{ $contact->numero_tel }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->message }}</td>
            <td>{{ $contact->created_at }}</td>
            <td>{{ $contact->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>