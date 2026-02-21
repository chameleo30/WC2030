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

    <title>Liste des Categories</title>

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
                <h5 class="card-header">Liste Des Categories</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <form action="/ajouterCategorie" method="POST">
                            @csrf
                            <tr>
                                <td class="col-md-3"><input name="designation-0" class="form-control" type="text" value="" required>
                                    @error('designation-0')
                                        <div id="defaultFormControlHelp" class="star form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                                <td class="col-md-7"><input name="description-0" class="form-control" type="text" value="" required>
                                    @error('description-0')
                                        <div id="defaultFormControlHelp" class="star form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm ms-auto">Enregistrer</button>
                                </td>
                            </tr>
                        </form>
                    @if(isset($categories))
                    @foreach ($categories as $categorie)
                    <form action="/modifierCategorie?id={{ $categorie->id }}" method="POST">
                        @csrf
                      <tr>
                        <td class="col-md-3"><input id="designation" name="designation" class="form-control" type="text" value="{{ $categorie->designation }}" readonly required></td>
                        <td class="col-md-7"><input id="description" name="description" class="form-control" type="text" value="{{ $categorie->description }}" readonly required></td>
                        <td>
                            <button id="enregistrer" onclick="return confirm('Êtes-vous sûr de vouloir modifié cette categorie ?');" class="btn btn-primary btn-sm ms-auto d-none">Enregistrer</button>
                            <div id="action" class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a id="editer" class="dropdown-item"><i class='bx bx-edit-alt me-1'></i>Modifier</a>

                                    <a class="dropdown-item" href="/supprimerCategorie?id={{ $categorie->id }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimé cette categorie ?');">
                                        <i class="bx bx-trash me-1"></i>Supprimer
                                    </a>
                                </div>
                            </div>
                        </td>
                      </tr>
                    </form>
                    @endforeach
				          @endif
                    <tr></tr>
                    </tbody>
                  </table>
                  <!-- Basic Pagination -->
                    @if(isset($categories) && !isset($hasNoPaginate))
                        {{ $categories->links('vendor.pagination.dashPaginator') }}
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
        document.getElementById('a-link-10').classList.add('active');

        let enregistrer = document.querySelectorAll("button[id='enregistrer']");
        let editer = document.querySelectorAll("a[id='editer']");
        let action = document.querySelectorAll("div[id='action']");
        let designation = document.querySelectorAll("input[id='designation']");
        let description = document.querySelectorAll("input[id='description']");

        for(let i=0;i<editer.length;i++){
            editer[i].addEventListener("click",function(){
                designation[i].removeAttribute("readonly");
                description[i].removeAttribute("readonly");
                enregistrer[i].classList.remove("d-none");
                action[i].classList.add("d-none");
            });
            enregistrer[i].addEventListener("click",function(){
                designation[i].setAttribute("readonly","readonly");
                description[i].setAttribute("readonly","readonly");
                enregistrer[i].classList.add("d-none");
                action[i].classList.remove("d-none");
            });
        }
    </script>
  </body>
</html>
