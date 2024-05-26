
    <table>
        <thead>
            <tr>
         
                <th>Article ID</th>
                <th>Quantité</th>
                <th>Créé le</th>
                <th>Mis à jour le</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articlesWithSum as $item)
                    <tr>
                        
                        <td>{{ $item['article']->nom }}</td> <!-- Assurez-vous que 'name' est une colonne de votre table 'articles' -->
                        <td>{{ $item['sum'] }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
