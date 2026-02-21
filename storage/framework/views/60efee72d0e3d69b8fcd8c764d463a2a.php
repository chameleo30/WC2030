<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- title -->
	<title>Produits</title>
	
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
						<h1>Découvrez Nos Produits</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-100">
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
				<div class="col-md-12">
					<div class="product-filters">
						<ul>
							<li class="active" data-filter="*">Tous</li>
							<?php if(isset($categories)): ?>
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li data-filter=".<?php echo e($categorie->id); ?>"><?php echo e($categorie->designation); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row product-lists">
				<?php if(isset($produits)): ?>
				<?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-4 col-md-6 text-center <?php echo e($produit->categories_id); ?>">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/afficher_produit?id_produit=<?php echo e($produit->id); ?>"><img src="assets-0/img/products/<?php echo e($produit->photo); ?>" alt=""></a>
						</div>
						<h3><?php echo e($produit->designation); ?></h3>
						<p class="product-price"><span><?php echo e($produit->unite_mesure); ?></span> <?php echo e($produit->prix_vente); ?> dh </p>
						<button class="cart-btn add-to-cart" data-id="<?php echo e($produit->id); ?>"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</button>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</div>
	</div>
	<!-- end products -->
	<div class="w-100 mb-5">
				<div class="pagination-wrap d-flex justify-content-center">
					<?php if(isset($produits) && !isset($hasNoPaginate)): ?>
						<?php echo e($produits->links('vendor.pagination.custom')); ?>

					<?php endif; ?>
				</div>
			</div>
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
		document.getElementById('shop').classList.add('current-list-item');
	</script>

</body>

</html><?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/shop.blade.php ENDPATH**/ ?>