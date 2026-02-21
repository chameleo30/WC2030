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

    <?php echo $__env->make('dashboard.partiels.css_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                            <?php if(session('success')): ?>
                            <div class="alert alert-success">
                              <?php echo e(session('success')); ?>

                            </div>
                            <?php endif; ?>
                            <?php if(session('error')): ?>
                              <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                              </div>
                            <?php endif; ?>
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
                            <?php echo csrf_field(); ?>
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
                            <?php if(session('error')): ?>
                                <div class="mb-6 w-100 text-center star form-text">
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>
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
    <?php echo $__env->make('dashboard.partiels.js_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/dashboard/dash-log-in.blade.php ENDPATH**/ ?>