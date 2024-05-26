@extends('layouts.app1')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Créer une catégorie</h4>
        </div>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="intitule" class="form-label">Intitulé</label>
        <input type="text" name="intitule" id="intitule" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description " class="form-label" >Description</label>
        <input type="text" name="description" id="description" class="form-control">
    </div>
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Créer</button>
    </div>
</form>
@endsection