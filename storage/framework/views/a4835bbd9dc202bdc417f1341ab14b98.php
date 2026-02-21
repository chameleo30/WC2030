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
	<title>Paiement</title>

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
						<h1>Vérifier La Commande</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<form action="/ajouter_commande" method="post">
			<?php echo csrf_field(); ?>
			
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
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						<?php if(!session('client')): ?>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Information De Contact
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="inscription-form">
										<p>
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
										</p>
						        		<p><input name="nom" type="text" placeholder="Nom" required></p>
										<p>
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
										</p>
										<p><input name="prenom" type="text" placeholder="Prénom" required></p>
										<p>
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
										</p>
						        		<p><input name="email" type="email" placeholder="Email" required></p>
										<p>
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
										</p>
						        		<p><input name="tel" type="tel" placeholder="Tel" required></p>
						        </div>
						      </div>
						    </div>
						  </div>
						<?php endif; ?>
						<div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Adresse De Livraison
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="inscription-form">
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="col-lg-12 mb-3">
												<?php if(session('client')): ?>
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
                                                <p><textarea name="adresse" class="w-100" id="bill" cols="30" rows="10" placeholder="Adresse"><?php echo e(session('client')->adresse); ?></textarea></p>
												<?php else: ?>
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
                                                <p><textarea name="adresse" class="w-100" id="bill" cols="30" rows="10" placeholder="Adresse"></textarea></p>
												<?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                              </div>
                            </div>
                          </div>
						  <!--
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						-->
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Détails de votre commande</th>
									<th>Prix</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Produit</td>
									<td>Total</td>
								</tr>
								<?php if(session('cart')): ?>
								<?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
            						$total += $produit['prix'] * $produit['quantite']; // Ajouter le prix total de chaque produit
        						?>
									<tr>
										<td><?php echo e($produit['description']); ?></td>
										<td><?php echo e($produit['prix'] * $produit['quantite']); ?> dh</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td><strong>Subtotal</strong></td>
									<td><?php echo e($total); ?> dh</td>
								</tr>
								<?php if(session('cart')): ?>
								<tr>
									<?php if($total>=500): ?>
									<td colspan="2">
										<div class="alert alert-success">
											Livraison Gratuite
										</div>
									</td>
									<?php else: ?>
									<td><strong>Livraison</strong></td>
									<td>50 dh</td>
									<?php endif; ?>
									
								</tr>
								<?php endif; ?>
								<tr>
									<td><strong>Total</strong></td>
									<?php if($total==0): ?>
									<td>0 dh</td>
									<?php elseif($total>=500): ?>
									<td><?php echo e($total); ?> dh</td>
									<?php else: ?>
									<td><?php echo e($total+50); ?> dh</td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
						<button name="Terminer" class="boxed-btn mt-4">Terminer</button>
					</div>
				</div>
			</div>
		</div>
	</form>
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
		document.getElementById('checkout').classList.add('current-list-item');
	</script>

</body>
</html><?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/checkout.blade.php ENDPATH**/ ?>