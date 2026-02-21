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

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Striped Rows -->
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
                    <?php if(isset($produits)): ?>
                    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><a href="/afficher_produit?id_produit=<?php echo e($produit->id); ?>"><img width="50" src="assets-0/img/products/<?php echo e($produit->photo); ?>" alt=""></a> <span><?php echo e($produit->designation); ?></span></td>
                        <td><?php echo e($produit->categorie); ?></td>
                        <td>
                            <?php echo e($produit->prix_vente); ?> dh
                        </td>
                        <td><?php echo e($produit->unite_mesure); ?></td>
                        <?php if($produit->quantite_stock>=50): ?>
                        <td><span class="badge bg-label-success me-1"><?php echo e($produit->quantite_stock); ?></span></td>
                        <?php elseif($produit->quantite_stock>=10): ?>
                        <td><span class="badge bg-label-warning me-1"><?php echo e($produit->quantite_stock); ?></span></td>
                        <?php else: ?>
                        <td><span class="badge bg-label-danger me-1"><?php echo e($produit->quantite_stock); ?></span></td>
                        <?php endif; ?>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/editProductForm?id=<?php echo e($produit->id); ?>">
                                <i class="bx bx-edit-alt me-1"></i>Modifier
                              </a>
                              <a class="dropdown-item" href="/supprimerProduit?id=<?php echo e($produit->id); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimé ce produit ?');">
                                <i class="bx bx-trash me-1"></i>Supprimer
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				          <?php endif; ?>
                    <tr></tr>
                    </tbody>
                  </table>
                  <!-- Basic Pagination -->
                    <?php if(isset($produits) && !isset($hasNoPaginate)): ?>
                        <?php echo e($produits->links('vendor.pagination.dashPaginator')); ?>

                    <?php endif; ?>
                  <!--/ Basic Pagination -->
                </div>
              </div>
              <!--/ Striped Rows -->

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
<?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/dashboard/produits.blade.php ENDPATH**/ ?>