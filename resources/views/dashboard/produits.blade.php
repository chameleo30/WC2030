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

    <title>Liste des Produits</title>

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

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Striped Rows -->
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
              <div class="card">
                <h5 class="card-header">Liste Des Produits</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Produit</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Unité</th>
                        <th>Stock</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if(isset($produits))
                    @foreach ($produits as $produit)
                      <tr>
                        <td><a href="/afficher_produit?id_produit={{ $produit->id }}"><img width="50" src="assets-0/img/products/{{ $produit->photo }}" alt=""></a> <span>{{ $produit->designation }}</span></td>
                        <td>{{ $produit->categorie }}</td>
                        <td>
                            {{ $produit->prix_vente }} dh
                        </td>
                        <td>{{ $produit->unite_mesure }}</td>
                        @if($produit->quantite_stock>=50)
                        <td><span class="badge bg-label-success me-1">{{ $produit->quantite_stock }}</span></td>
                        @elseif($produit->quantite_stock>=10)
                        <td><span class="badge bg-label-warning me-1">{{ $produit->quantite_stock }}</span></td>
                        @else
                        <td><span class="badge bg-label-danger me-1">{{ $produit->quantite_stock }}</span></td>
                        @endif
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/editProductForm?id={{ $produit->id }}">
                                <i class="bx bx-edit-alt me-1"></i>Modifier
                              </a>
                              <a class="dropdown-item" href="/supprimerProduit?id={{ $produit->id }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimé ce produit ?');">
                                <i class="bx bx-trash me-1"></i>Supprimer
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
				          @endif
                    <tr></tr>
                    </tbody>
                  </table>
                  <!-- Basic Pagination -->
                    @if(isset($produits) && !isset($hasNoPaginate))
                        {{ $produits->links('vendor.pagination.dashPaginator') }}
                    @endif
                  <!--/ Basic Pagination -->
                </div>
              </div>
              <!--/ Striped Rows -->

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
