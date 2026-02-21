<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title><?php echo e($produit->designation); ?></title>

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
						<h1>Voir Plus De Détails</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div id="alert-container"></div>
			<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="assets-0/img/products/<?php echo e($produit->photo); ?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo e($produit->designation); ?></h3>
						<p class="single-product-pricing"><span><?php echo e($produit->unite_mesure); ?></span><?php echo e($produit->prix_vente); ?> dh</p>
						<p><?php echo e($produit->description); ?></p>
						<div class="single-product-form">
							<?php if($produit->quantite_stock<1): ?>
								<div class="alert alert-danger">rupture de stock</div>
							<?php else: ?>
								<button class="cart-btn add-to-cart" data-id="<?php echo e($produit->id); ?>"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</button>
							<?php endif; ?>
							<p><strong>Categories: </strong><?php echo e($categorie->designation); ?></p>
						</div>  
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-4 col-md-6 text-center">
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
			</div>
		</div>
	</div>
	<!-- end more products -->

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
</html><?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/single-product.blade.php ENDPATH**/ ?>