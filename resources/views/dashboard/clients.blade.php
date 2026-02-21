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

    <title>Liste des Clients</title>

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
                <h5 class="card-header">Liste Des Clients</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Date Naissance</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if(isset($clients))
                    @foreach ($clients as $client)
                      <tr>
                        <td><a href="/detailClient?id={{ $client->id }}"><img class="rounded-circle custom-profile-img" width="50" src="assets-0/img/clients/{{ $client->photo }}" alt=""></a> <span>{{ $client->nom }} {{ $client->prenom }}</span></td>
                        <td>{{ $client->date_naissance }}</td>
                        <td>
                            {{ $client->tel }}
                        </td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->adresse }}, {{ $client->ville }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/detailClient?id={{ $client->id }}">
                                <i class="bx bx-edit-alt me-1"></i>Détail
                              </a>
                              <a class="dropdown-item" href="/supprimerClient?id={{ $client->id }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimé ce client ?');">
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
                    @if(isset($clients) && !isset($hasNoPaginate))
                        {{ $clients->links('vendor.pagination.dashPaginator') }}
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
        document.getElementById('a-link-20').classList.add('active');
    </script>
  </body>
</html>
