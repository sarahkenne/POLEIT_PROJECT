<form action="{{ route('produits.store') }}" method="POST">
    @csrf

    <div>
        <label for="articles_id">Article  :</label>
        <select name="articles_id" id="articles_id">
            <option value="">-- Sélectionner une article --</option>
            @foreach ($articles as $article)
            <option value="{{ $article->id }}">{{ $article->nom }}</option>
            @endforeach
        </select>
    </div>


    <div>
        <label for="quandite">Quantité:</label>
        <input type="number" name="quandite" id="quandite">
    </div>
    <input hidden type="numer" name="etat " value="1" >

    <button type="submit">Ajouter</button>
</form>