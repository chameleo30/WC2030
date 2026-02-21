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

    <?php echo $__env->make('dashboard.partiels.css_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
            <?php echo $__env->make('dashboard.partiels.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php echo $__env->make('dashboard.partiels.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid py-4">
                <div class="row">
                  <div class="col-md-12">
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
                    <form class="card" method="Post" action="/modifierProduit?id=<?php echo e($produit->id); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
                              <input name="designation" class="form-control form-control-lg" type="text" value="<?php echo e($produit->designation); ?>" required>
                                <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Catégorie<span class="star">*</span></label>
                              <select name="categorie" class="form-select form-select-lg" required>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($categorie->id == $produit->categories_id): ?>
                                        <option value="<?php echo e($categorie->designation); ?>" selected><?php echo e($categorie->designation); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($categorie->designation); ?>"><?php echo e($categorie->designation); ?></option>   
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                                <?php $__errorArgs = ['categorie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Photo<span class="star">*</span></label>
                              <input name="photo" class="form-control form-control-lg" type="file" value="">
                              <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Prix de Vente</label><span class="star">*</span>
                              <input name="prix" class="form-control form-control-lg" type="text" value="<?php echo e($produit->prix_vente); ?>" required>
                              <?php $__errorArgs = ['prix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Unité Mesure</label><span class="star">*</span>
                              <input name="unite" class="form-control form-control-lg" type="text" value="<?php echo e($produit->unite_mesure); ?>" required>
                              <?php $__errorArgs = ['unite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Stock<span class="star">*</span></label>
                              <input name="stock" class="form-control form-control-lg" type="number" value="<?php echo e($produit->quantite_stock); ?>" min="0" required>
                              <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>                          
                          <div class="col-md-12 mt-2">
                            <div class="form-group">
                              <label class="form-control-label">Description<span class="star">*</span></label>
                              <input name="description" class="form-control form-control-lg" type="text" value="<?php echo e($produit->description); ?>" required>
                              <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div id="defaultFormControlHelp" class="star form-text">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            <?php echo $__env->make('dashboard.partiels.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <?php echo $__env->make('dashboard.partiels.js_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        document.getElementById('a-link-00').classList.add('open');
        document.getElementById('a-link-00').classList.add('active');
        document.getElementById('a-link-01').classList.add('active');
    </script>
  </body>
</html>
<?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/dashboard/editProductForm.blade.php ENDPATH**/ ?>