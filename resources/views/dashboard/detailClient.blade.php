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
                            <a class="nav-link active" href="/detailClient?id={{ $client->id }}"
                              ><i class="bx bx-sm bx-user me-1_5"></i> Profile</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/detailCommandes?id={{ $client->id }}"
                              ><i class="bx bx-sm bx-command me-1_5"></i> Commandes</a
                            >
                          </li>
                        </ul>
                      </div>
                      <div class="card mb-6">
                        <!-- Account -->
                        <div class="card-body">
                          <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                            <img
                              src="assets-0/img/clients/{{ $client->photo }}"
                              alt="user-avatar"
                              class="d-block w-px-100 h-px-100 rounded" />
                          </div>
                        </div>
                        <div class="card-body pt-4">
                          <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label for="firstName" class="form-label">Nom</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  value="{{ $client->nom }}" readonly/>
                              </div>
                              <div class="col-md-6">
                                <label for="lastName" class="form-label">Prénom</label>
                                <input class="form-control" type="text" name="lastName" id="lastName" value="{{ $client->prenom }}" readonly/>
                              </div>
                              <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  value="{{ $client->email }}" readonly/>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label" for="phoneNumber">Tel</label>
                                  <div class="input-group input-group-merge">
                                      <span class="input-group-text">MAR (+212)</span>
                                      <input
                                      type="text"
                                      class="form-control"
                                      value="{{ $client->tel }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="organization" class="form-label">Date Naissance</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $client->date_naissance }}" readonly/>
                                </div>
                              <div class="col-md-6">
                                <label for="address" class="form-label">sexe</label>
                                <input type="text" class="form-control" value="{{ $client->sexe }}" readonly/>
                              </div>
                              <div class="col-md-12">
                                <label for="currency" class="form-label">Adresse</label>
                                <textarea class="form-control" cols="30" rows="5" readonly>{{ $client->adresse }}, {{ $client->ville }}</textarea>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /Account -->
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
