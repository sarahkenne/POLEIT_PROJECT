@extends('layouts.app1')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Creer un produit </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Boutique</a></li>
                    <li class="breadcrumb-item active">creer un produit</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{ route('articles.store') }}" id="createproduct-form" autocomplete="off" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du produit  :</label>
                        <input type="text" name="nom" class="form-control" id="nom"  placeholder="Enter le nom du produit" required>
                    </div>
                    
                    <div>
                        <label for="details" class="form-label">Détails :</label>
                        <textarea name="details" class="form-control" id="details" rows="4"></textarea> 
                    </div>
                    <div>
                        <label for="categorieproduits_id" class="form-label">Catégorie :</label>
                        <select name="categorieproduits_id" class="form-control" id="categorieproduits_id">
                            <option value="">-- Sélectionner une categorie --</option>
                            @foreach ($categorieproduits as $categorieproduit)
                            <option value="{{ $categorieproduit->id }}">{{ $categorieproduit->intitule }}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div>
                        <label for="users_id" class="form-label">Utilisateur :</label>
                        <select name="users_id" id="users_id" class="form-control">
                            <option value="">-- Sélectionner un utilisateur --</option>
                            @foreach ($users as $users)
                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div>
                        <label for="prix" class="form-label">Prix :</label>
                        <input type="number" name="prix" class="form-control" id="prix">
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="fs-14 mb-1">Product Image</h5>
                        <p class="text-muted">Add Product main Image.</p>
                        <div class="text-center">
                            <div class="position-relative d-inline-block">
                                <div class="position-absolute top-100 start-100 translate-middle">
                                    <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                <i class="ri-image-fill"></i>
                                            </div>
                                        </div>
                                    </label>
                                    <input class="form-control d-none" value="" name="image" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div class="avatar-lg">
                                    <div class="avatar-title bg-light rounded">
                                        <img src="#" id="product-img" class="avatar-md h-auto" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
     
            <div class="text-end mb-3">
                <button type="submit" class="btn btn-primary w-sm">Submit</button>
            </div>
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->

</form>
@endsection