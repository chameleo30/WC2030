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
	<title>Panier</title>

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
						<h1>Votre Panier</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
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
			<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
				<div class="row">
					<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Image</th>
									<th class="product-name">Description</th>
									<th class="product-price">Prix</th>
									<th class="product-quantity">Quantité</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody id="tbody-cart">
								<?php if(session('cart')): ?>
								<?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
            						$total += $produit['prix'] * $produit['quantite']; // Ajouter le prix total de chaque produit
        						?>
									<tr class="table-body-row">
										<td class="product-remove"><a href="/supprimer_cart?id_produit=<?php echo e($id); ?>"><i class="far fa-window-close"></i></a></td>
										<td class="product-image"><img src="assets-0/img/products/<?php echo e($produit['photo']); ?>" alt=""></td>
										<td class="product-name"><?php echo e($produit['description']); ?></td>
										<td class="product-price"><?php echo e($produit['prix']); ?></td>
										<td class="product-quantity"><input class="update-quantity-cart" data-id="<?php echo e($id); ?>" data-prix="<?php echo e($produit['prix']); ?>" type="number" min="1" value="<?php echo e($produit['quantite']); ?>" max="<?php echo e($produit['stock']); ?>"></td>
										<td class="product-total" id="total-<?php echo e($id); ?>"><?php echo e($produit['prix'] * $produit['quantite']); ?> dh</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
						</table>
						<div class="cart-buttons">
							<button type="reset" id="clear-cart" class="boxed-btn black right">Vider le panier</button>
						</div>
					</div>
				</div>
					<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Prix</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td id="sousTotal"><?php echo e($total); ?> dh</td>
								</tr>
								<?php if(session('cart')): ?>
								<tr id="livraison" class="total-data">
									<?php if($total>=500): ?>
									<td colspan="2">
										<div class="alert alert-success">
											Livraison Gratuite
										</div>
									</td>
									<?php else: ?>
									<td><strong>Livraison: </strong></td>
									<td>50 dh</td>
									<?php endif; ?>
								</tr>
								<?php endif; ?>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td id="total">
										<?php if($total==0): ?>
										0
										<?php elseif($total>=500): ?>
										<?php echo e($total); ?>

										<?php else: ?>
										<?php echo e($total+50); ?>

										<?php endif; ?>
										 dh
									</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<button name="PasserLaCommande" type="reset" class="boxed-btn black check-out">Passer la commande</button>
						</div>
					</div>
				</div>
				
				</div>
				

				
		</div>
	</div>
	<!-- end cart -->

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
		document.getElementById('cart').classList.add('current-list-item');
	</script>

</body>
</html><?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/cart.blade.php ENDPATH**/ ?>