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

    <title>{{ $client->nom }} {{ $client->prenom }}</title>

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
            <div class="content-wrapper">
                <!-- Content -->
    
                <div class="container-xxl flex-grow-1 container-p-y">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="nav-align-top">
                        <ul class="nav nav-pills flex-column flex-md-row mb-6">
                          <li class="nav-item">
                            <a class="nav-link" href="/detailClient?id={{ $client->id }}"
                              ><i class="bx bx-sm bx-user me-1_5"></i> Profile</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="/detailCommandes?id={{ $client->id }}"
                              ><i class="bx bx-sm bx-command me-1_5"></i> Commandes</a
                            >
                          </li>
                        </ul>
                      </div>
                      <div class="card mb-6">
                        <!-- Commandes -->
                        <div class="table-responsive text-nowrap">
                            @if($historiques && count($historiques)>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID Commande</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Adresse</th>
                                    <th>Produits</th>
                                    <th>Quantités</th>
                                    <th>Prix</th>
                                    <th>Montant Total</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach($historiques as $historique)
                                              <tr>
                                                  <td>{{ $historique->id }}</td>
                                                  @php $DateHeureAdresse = explode(';', $historique->commandes_date); @endphp
                                                  <td>{{ $DateHeureAdresse[0] }}</td>
                                                  <td>{{ $DateHeureAdresse[1] }}</td>
                                                  <td>{{ $DateHeureAdresse[2] }}</td>
                                                  <td>
                                                      <ul>
                                                          @php $produits = explode(';', $historique->produits_nom); @endphp
                                                          @for($i=0;$i<count($produits)-1;$i++)
                                                          <li>{{ $produits[$i] }}</li>
                                                          @endfor
                                                      </ul>
                                                  </td>
                                                  <td>
                                                      <ul>
                                                          @php $quantites = explode(';', $historique->produits_quantite); @endphp
                                                          @for($i=0;$i<count($quantites)-1;$i++)
                                                          <li>{{ $quantites[$i] }}</li>
                                                          @endfor
                                                      </ul>
                                                  </td>
                                                  <td>
                                                      <ul>
                                                          @php $prices = explode(';', $historique->produits_prix); @endphp
                                                          @for($i=0;$i<count($prices)-1;$i++)
                                                          <li>{{ $prices[$i] }}</li>
                                                          @endfor
                                                      </ul>
                                                  </td>
                                                  <td>{{ $historique->montant_total }} dh</td>
                                              </tr>
                                              @endforeach
                    
                                <tr></tr>
                                </tbody>
                            </table>
                            @else
                                <div id="defaultFormControlHelp" class="star form-text m-4">
                                    <p>Aucun historique disponible.</p>
                                </div>
                            @endif
                        <!-- Basic Pagination -->
                            @if(isset($historiques) && !isset($hasNoPaginate))
                                {{ $historiques->links('vendor.pagination.dashPaginator') }}
                            @endif
                        <!--/ Basic Pagination -->
                        </div>
                        <!-- /Commandes -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / Content -->
    
                <div class="content-backdrop fade"></div>
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
