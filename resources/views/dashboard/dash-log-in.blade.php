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

    <title>Authentification</title>

    <meta name="description" content="" />

    @include('dashboard.partiels.css_links')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container col-md-6">
                <div class="authentication-wrapper authentication-basic container-p-y">
                  <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card px-sm-6 px-0">
                        <div class="card-body">
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
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mt-12 mb-12">
                          <a href="#" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo demo-2">
                                <img src="assets-0/img/Yalla-Vamos.png" alt="">
                            </span>
                          </a>
                        </div>
                        <!-- /Logo -->
          
                        <form id="formAuthentication" class="mb-6" action="/seconnecter" method="POST">
                            @csrf
                          <div class="mb-6">
                            <label for="email" class="form-label">Username</label>
                            <input
                              type="text"
                              class="form-control"
                              id="email"
                              name="username"
                              placeholder="Entrer votre Username"
                              autofocus />
                          </div>
                          <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                          </div>
                            @if (session('error'))
                                <div class="mb-6 w-100 text-center star form-text">
                                    {{ session('error') }}
                                </div>
                            @endif
                          <div class="mb-6 w-100 text-center">
                            <button class="btn btn-primary w-50" type="submit">Login</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- /Register -->
                  </div>
                </div>
              </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('dashboard.partiels.js_links')
  </body>
</html>
