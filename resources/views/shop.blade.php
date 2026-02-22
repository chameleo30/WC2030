<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- title -->
	<title>Produits</title>
	
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
				@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif
				@if (session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
				@endif
			</div>
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-12">
					<div class="product-filters">
						<ul>
							<li class="active" data-filter="*">Tous</li>
							@if(isset($categories))
								@foreach ($categories as $categorie)
									<li data-filter=".{{ $categorie->id }}">{{ $categorie->designation }}</li>
								@endforeach
							@endif
						</ul>
					</div>
				</div>
			</div>
			<div class="row product-lists">
				@if(isset($produits))
				@foreach ($produits as $produit)
				<div class="col-lg-4 col-md-6 text-center {{ $produit->categories_id }}">
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
				@endif
			</div>
	</div>
	<!-- end products -->
	<div class="w-100 mb-5">
				<div class="pagination-wrap d-flex justify-content-center">
					@if(isset($produits) && !isset($hasNoPaginate))
						{{ $produits->links('vendor.pagination.custom') }}
					@endif
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
		
	@include('partiels.chat')

	@include('partiels.footer')

	@include('partiels.js_links')

	<script>
		document.getElementById('shop').classList.add('current-list-item');
	</script>

</body>

</html>