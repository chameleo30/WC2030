<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>{{ $produit->designation }}</title>

	@include('partiels.css_links')

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	@include('partiels.menu')
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>{{ config('app.exp') }}</p>
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
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="assets-0/img/products/{{ $produit->photo }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $produit->designation }}</h3>
						<p class="single-product-pricing"><span>{{ $produit->unite_mesure }}</span>{{ $produit->prix_vente }} dh</p>
						<p>{{ $produit->description }}</p>
						<div class="single-product-form">
							@if($produit->quantite_stock<1)
								<div class="alert alert-danger">rupture de stock</div>
							@else
								<button class="cart-btn add-to-cart" data-id="{{ $produit->id }}"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</button>
							@endif
							<p><strong>Categories: </strong>{{ $categorie->designation }}</p>
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
				@foreach ($produits as $produit)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/afficher_produit?id_produit={{ $produit->id }}"><img src="assets-0/img/products/{{ $produit->photo }}" alt=""></a>
						</div>
						<h3>{{ $produit->designation }}</h3>
						<p class="product-price"><span>{{ $produit->unite_mesure }}</span> {{ $produit->prix_vente }} dh </p>
						<button class="cart-btn add-to-cart" data-id="{{ $produit->id }}"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</button>
					</div>
				</div>
				@endforeach
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
	@include('partiels.chat')

	@include('partiels.footer')

	@include('partiels.js_links')

	<script>
		document.getElementById('shop').classList.add('current-list-item');
	</script>

</body>
</html>