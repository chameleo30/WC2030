<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Modifier un Produit</title>

    <meta name="description" content="" />

    @include('dashboard.partiels.css_links')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
            @include('dashboard.partiels.menu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('dashboard.partiels.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid py-4">
                <div class="row">
                  <div class="col-md-12">
                    <div id="alert-container">
                      @if (session('success'))
                      <div class="alert alert-success">
                        {{ session('success') }}
                      </div>
                      @endif
                      @if (session('error'))
                        <div class="alert alert-danger">
                          {{ session('error') }}
                        </div>
                      @endif
                    </div>
                    <form class="card" method="Post" action="/modifierProduit?id={{ $produit->id }}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-header pb-0 mb-4">
                        <div class="d-flex align-items-center">
                          <h5 class="mb-0">Modifier un Produit</h5>
                          <button class="btn btn-primary btn-sm ms-auto">Enregistrer</button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Designation</label><span class="star">*</span>
                              <input name="designation" class="form-control form-control-lg" type="text" value="{{ $produit->designation }}" required>
                                @error('designation')
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Catégorie<span class="star">*</span></label>
                              <select name="categorie" class="form-select form-select-lg" required>
                                @foreach($categories as $categorie)
                                    @if($categorie->id == $produit->categories_id)
                                        <option value="{{ $categorie->designation }}" selected>{{ $categorie->designation }}</option>
                                    @else
                                        <option value="{{ $categorie->designation }}">{{ $categorie->designation }}</option>   
                                    @endif
                                @endforeach
                              </select>
                                @error('categorie')
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Photo<span class="star">*</span></label>
                              <input name="photo" class="form-control form-control-lg" type="file" value="">
                              @error('photo')
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Prix de Vente</label><span class="star">*</span>
                              <input name="prix" class="form-control form-control-lg" type="text" value="{{ $produit->prix_vente }}" required>
                              @error('prix')
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Unité Mesure</label><span class="star">*</span>
                              <input name="unite" class="form-control form-control-lg" type="text" value="{{ $produit->unite_mesure }}" required>
                              @error('unite')
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Stock<span class="star">*</span></label>
                              <input name="stock" class="form-control form-control-lg" type="number" value="{{ $produit->quantite_stock }}" min="0" required>
                              @error('stock')
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>                          
                          <div class="col-md-12 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Description<span class="star">*</span></label>
                              <input name="description" class="form-control form-control-lg" type="text" value="{{ $produit->description }}" required>
                              @error('description')
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('dashboard.partiels.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('dashboard.partiels.js_links')
    <script>
        document.getElementById('a-link-00').classList.add('open');
        document.getElementById('a-link-00').classList.add('active');
        document.getElementById('a-link-01').classList.add('active');
    </script>
  </body>
</html>
