@extends('layouts.app1')

@section('content')
    
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Products</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Boutique</a></li>
                    <li class="breadcrumb-item active">Articles</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex mb-3">
                    <div class="flex-grow-1">
                        <h5 class="fs-16">Filtre</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="#" class="link-secondary text-decoration-underline" id="clearall">Clear All</a>
                    </div>
                </div>

                <div class="filter-choices-input">
                    <input class="form-control" data-choices data-choices-removeItem type="text" id="filter-choices-input" value="categorie" />
                </div>
            </div>

            <div class="accordion accordion-flush filter-accordion">

                <div class="card-body border-bottom">
                    <div>
                        <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Categories</p>
                        <ul class="list-unstyled mb-0 filter-list">
                            @foreach($categories as $categorie)    
                            <li>
                                <a href="#" class="d-flex py-1 align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0 listname">{{ $categorie->intitule }}</h5>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-9 col-lg-8">
        <div>
            <div class="card">
                <div class="card-header border-0">
                    <div class="row g-4">
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('articles.create')}}" class="btn btn-primary" id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Ajouter un produits</a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control" id="searchProductList" placeholder="Search Products...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                        All <span class="badge bg-secondary align-middle rounded-pill ms-1">12</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <div id="selection-element">
                                <div class="my-n1 d-flex align-items-center text-muted">
                                    Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card header -->
                <div class="card-body">

                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="productnav-all" role="tabpanel">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Article </th>
                                    <th scope="col">prix</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                  <tr>
                                    <td><br><a href="{{ route('articles.show' , $article->id )}}"> <img src="{{ $article->image }}" alt="Image de l'article" width="50px" height="50px"></br></a></td>
                                    <th scope="row"><a href="{{ route('articles.show' , $article->id )}}">{{ $article->nom }} </a></th>
                                    <td>{{ $article->getPrice() }}</td>
                                    <td><a href="{{ route('articles.show', $article->id) }}">Voir</a></td>
                                  </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane" id="productnav-published" role="tabpanel">
                            <div id="table-product-list-published" class="table-card gridjs-border-none"></div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane" id="productnav-draft" role="tabpanel">
                            <div class="py-4 text-center">
                                
                                
                            </div>
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
