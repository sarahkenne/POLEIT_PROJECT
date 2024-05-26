@extends('layouts.app1')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Enregistrer une activite</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">activite</a></li>
                    <li class="breadcrumb-item active">creer</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('activites.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-12">
                                <div>
                                    <label for="nom" class="form-label">Nom de l'activite :</label>
                                    <input type="text" name="nom" id="nom" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-12">
                                <div>
                                    <label for="description" class="form-label">Description :</label>
                                    <textarea name="description" id="description" class="form-control" required></textarea>
                                </div> 
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="users_id">Responsable :</label>
                                    <select name="users_id" class="form-select mb-3" id="users_id" required>
                                        <option value="">-- Sélectionner un responsable --</option>
                                        @foreach ($users as $users)
                                        
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endforeach
                                        
                                        <!-- Ajoutez ici la logique pour récupérer la liste des utilisateurs -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="lieu" class="form-label">Lieu :</label>
                                    <input type="text" name="lieu" id="lieu" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="date_debut" class="form-label">Date de début :</label>
                                    <input type="date" name="date_debut" class="form-control" id="date_debut">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="date_fin" class="form-label">Date de fin :</label>
                                    <input type="date" name="date_fin" class="form-control" id="date_fin">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="type">Type :</label>
                                    <select name="type" id="type" class="form-select mb-3" required>
                                        <option value="">-- Sélectionner la periode --</option>
                                        <option value="matin">matin</option>
                                        <option value="soir">soir</option>
                                        <option value="toute_journee">toute la journee</option>
                                        <option value="inconnue">inconnue</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <div>
                                        <label for="cout" class="form-label">Coût :</label>
                                        <input type="number" name="cout" class="form-control" id="cout">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div> 
                </form>
            </div>
    <!--end col-->
</div>

@endsection
