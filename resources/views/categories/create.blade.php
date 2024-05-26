<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="intitule">Intitulé</label>
        <input type="text" name="intitule" id="intitule" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>