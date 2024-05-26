<form action="/contacts" method="POST">
    @csrf

    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
    </div>

    <div>
        <label for="numero_tel">Numéro de téléphone :</label>
        <input type="text" name="numero_tel" id="numero_tel" required>
    </div>

    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="message">Message :</label>
        <textarea name="message" id="message" required></textarea>
    </div>

    <button type="submit">Envoyer</button>
</form>