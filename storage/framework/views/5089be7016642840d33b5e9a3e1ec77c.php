<?php
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- title -->
	<title>Authentification</title>

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
						<p><?php echo e(config('app.exp')); ?></p>
						<h1>Accédez À Votre Compte</h1>
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
                <?php if(session('auth-failed')): ?>
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-danger"><?php echo e(session('auth-failed')); ?></div>
                </div>
                <?php endif; ?>
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
			<div class="row">
				<div class="col-lg-12">
						<div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Se connecter
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="inscription-form">
                                        <form action="/authentifier" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-row d-flex justify-content-between">

                                                <div class="col-lg-6 mb-3">
                                                    <p><input name="email" class="custom-height" type="text" placeholder="Email *" required></p>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <p><input name="password" class="custom-height" type="password" placeholder="Mot de passe *" required></p>
                                                </div>
                                            </div>
                                            <button name="SeConnecter" class="boxed-btn black">Se connecter</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          S'inscrire
						        </button>
						      </h5>
						    </div>
						    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="inscription-form">
                                    <form action="/ajouter_client" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-row d-flex justify-content-between">
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="nom" class="custom-height" type="text" placeholder="Nom *" required value=""></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="prenom" class="custom-height" type="text" placeholder="Prénom *" required value=""></p>
                                            </div>
                                        </div>
                                    
                                        <div class="form-row d-flex justify-content-between">
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="date" class="custom-height" type="date" placeholder="Date de naissance *" required value=""></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p>
                                                    <select name="sexe" class="w-100 custom-height">
                                                        <option value="Homme">Homme</option>
                                                        <option value="Femme">Femme</option>
                                                    </select>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-row d-flex justify-content-between">
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="tel" class="custom-height" type="text" placeholder="Tel *" required value=""></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="email" class="custom-height" type="email" placeholder="Email *" required value=""></p>
                                            </div>
                                        </div>
                                    
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="col-lg-12 mb-3">
                                                <p><textarea name="adresse" class="w-100" id="bill" cols="30" rows="10" placeholder="Adresse *" required></textarea></p>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between">
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="ville" class="custom-height" type="text" placeholder="Ville *" required value=""></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="photo" class="custom-height" type="file" placeholder="Photo"></p>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between">
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password" class="custom-height" type="password" placeholder="Mot de passe *" required value=""></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password_confirmation" class="custom-height" type="password" placeholder="Confirmation de mot de passe *" required value=""></p>
                                            </div>
                                        </div>
                                        <button class="boxed-btn black">S'inscrire</button>
                                        

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

    <script>
        document.getElementById('log-in').classList.add('current-list-item');
    </script>

</body>
</html><?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/log-in.blade.php ENDPATH**/ ?>