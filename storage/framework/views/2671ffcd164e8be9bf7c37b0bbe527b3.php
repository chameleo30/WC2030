<?php
$total=0
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>profile</title>

	<?php echo $__env->make('partiels.css_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<?php echo $__env->make('partiels.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Mon Compte</p>
						<h1>Bienvenue, <?php echo e(ucwords(session('client')->nom)); ?> !</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="mt-150 mb-150">
		<div class="container">
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
			<div class="row">
				<div class="col-lg-12">
                    

						<div class="accordion" id="accordionExample">
                            
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Information Personnel 
						        </button>
						      </h5>
						    </div>
						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="inscription-form">
                        <form action="update_profile" method="POST" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                            <div class="form-row d-flex justify-content-between">
                              <div class="col-lg-6 mb-3">
                                <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                                <div class="col-lg-6 mb-3">
                                    <p><input name="nom" class="custom-height" type="text" placeholder="Nom *" value="<?php echo e(session('client')->nom); ?>" required></p>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p><input name="prenom" class="custom-height" type="text" placeholder="Prénom *" value="<?php echo e(session('client')->prenom); ?>" required></p>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                              <div class="col-lg-6 mb-3">
                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <?php $__errorArgs = ['sexe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                                <div class="col-lg-6 mb-3">
                                    <p><input name="date" class="custom-height" type="date" placeholder="Date de naissance *" value="<?php echo e(session('client')->date_naissance); ?>" required></p>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p>
                                        <select name="sexe" class="w-100 custom-height">
                                            <?php if(session('client')->sexe == "Homme"): ?>{
                                              <option selected value="Homme">Homme</option>
                                              <option value="Femme">Femme</option>
                                            }<?php elseif(session('client')->sexe == "Femme"): ?>{
                                              <option value="Homme">Homme</option>
                                              <option selected value="Femme">Femme</option>
                                            }
                                            <?php endif; ?>
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                            <div class="col-lg-6 mb-3">
                              <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                                <div class="col-lg-6 mb-3">
                                    <p><input name="photo" class="custom-height" type="file" placeholder="Photo"></p>
                                </div>
                            </div>
                            
                            <button class="boxed-btn black">Enregistrer</button>
                        </form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Information De Contact
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="inscription-form">
                                    <form action="update_contact" method="POST">
                                      <?php echo csrf_field(); ?>
                                      <div class="form-row d-flex justify-content-between">
                                        <div class="col-lg-6 mb-3">
                                          <?php $__errorArgs = ['tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                              <div class="alert alert-danger"><?php echo e($message); ?></div>
                                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                      </div>
                                      <div class="col-lg-6 mb-3">
                                          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                              <div class="alert alert-danger"><?php echo e($message); ?></div>
                                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                      </div>
                                        <div class="col-lg-6 mb-3">
                                            <p><input name="tel" class="custom-height" type="text" placeholder="Tel *" value="<?php echo e(session('client')->tel); ?>" required></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <p><input name="email" class="custom-height" type="text" placeholder="Email *" readonly value="<?php echo e(session('client')->email); ?>" required></p>
                                        </div>
                                    </div>
                                        <div class="form-row d-flex justify-content-between">
                                          <div class="col-lg-12 mb-3">
                                            <?php $__errorArgs = ['adresse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                            <div class="col-lg-12 mb-3">
                                                <p><textarea name="adresse" class="w-100" id="bill" cols="30" rows="10" placeholder="Adresse *" required><?php echo e(session('client')->adresse); ?></textarea></p>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between">
                                          <div class="col-lg-6 mb-3">
                                            <?php $__errorArgs = ['ville'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between">
                                          <div class="col-lg-6 mb-3">
                                            <p><input name="ville" class="custom-height" type="text" placeholder="Ville *" value="<?php echo e(session('client')->ville); ?>" required></p>
                                          </div>
                                        </div>
                                        <button class="boxed-btn black">Enregistrer</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Securité
                                </button>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="inscription-form">
                                    <form action="update_password" method="POST">
                                      <?php echo csrf_field(); ?>
                                        <div class="form-row d-flex justify-content-between">
                                            <div class="col-lg-6 mb-3">
                                              <?php $__errorArgs = ['password_old'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password_old" class="custom-height" type="password" placeholder="Mot de passe actuel *" required></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password" class="custom-height" type="password" placeholder="Nouveau mot de passe *" required></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password_confirmation" class="custom-height" type="password" placeholder="Confirmation du mot de passe *" required></p>
                                            </div>
                                        </div>
                                        <button class="boxed-btn black">Enregistrer</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  Historique
                                </button>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="inscription-form">
                                    <form action="index.html">
                                      <?php if(session('historiques')): ?>
                                      <div class="container mt-5">
                                        <h1 class="page-title">Historique des Commandes</h1>
                                        <table class="table table-striped mt-4">
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
                                            <tbody>
                                              <!-- Exemple d'une commande -->
                
                                              <?php $__currentLoopData = session('historiques'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $historique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                  <td><?php echo e($id); ?></td>
                                                  <?php $DateHeureAdresse = explode(';', $historique['date']); ?>
                                                  <td><?php echo e($DateHeureAdresse[0]); ?></td>
                                                  <td><?php echo e($DateHeureAdresse[1]); ?></td>
                                                  <td><?php echo e($DateHeureAdresse[2]); ?></td>
                                                  <td>
                                                      <ul>
                                                          <?php $produits = explode(';', $historique['nom']); ?>
                                                          <?php for($i=0;$i<count($produits)-1;$i++): ?>
                                                          <li><?php echo e($produits[$i]); ?></li>
                                                          <?php endfor; ?>
                                                      </ul>
                                                  </td>
                                                  <td>
                                                      <ul>
                                                          <?php $quantites = explode(';', $historique['quantite']); ?>
                                                          <?php for($i=0;$i<count($quantites)-1;$i++): ?>
                                                          <li><?php echo e($quantites[$i]); ?></li>
                                                          <?php endfor; ?>
                                                      </ul>
                                                  </td>
                                                  <td>
                                                      <ul>
                                                          <?php $prices = explode(';', $historique['prix']); ?>
                                                          <?php for($i=0;$i<count($prices)-1;$i++): ?>
                                                          <li><?php echo e($prices[$i]); ?></li>
                                                          <?php endfor; ?>
                                                      </ul>
                                                  </td>
                                                  <td><?php echo e($historique['total']); ?> dh</td>
                                              </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              <!-- Répétez les lignes pour chaque commande dans l'historique -->
                                          </tbody>
                                        </table>
                                      </div>
                                      <?php else: ?>
                                      <div class="alert alert-danger">
                                        <p>Aucun historique disponible.</p>
                                      </div>
                                      <?php endif; ?>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<?php echo $__env->make('partiels.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->make('partiels.js_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/profile.blade.php ENDPATH**/ ?>