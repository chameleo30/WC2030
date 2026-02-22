@php
$total = 0;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>Panier</title>

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
								@if(session('cart'))
								@foreach (session('cart') as $id => $produit)
								@php
            						$total += $produit['prix'] * $produit['quantite']; // Ajouter le prix total de chaque produit
        						@endphp
									<tr class="table-body-row">
										<td class="product-remove"><a href="/supprimer_cart?id_produit={{ $id }}"><i class="far fa-window-close"></i></a></td>
										<td class="product-image"><img src="assets-0/img/products/{{ $produit['photo'] }}" alt=""></td>
										<td class="product-name">{{ $produit['description'] }}</td>
										<td class="product-price">{{ $produit['prix'] }}</td>
										<td class="product-quantity"><input class="update-quantity-cart" data-id="{{ $id }}" data-prix="{{ $produit['prix'] }}" type="number" min="1" value="{{ $produit['quantite'] }}" max="{{ $produit['stock'] }}"></td>
										<td class="product-total" id="total-{{ $id }}">{{ $produit['prix'] * $produit['quantite'] }} dh</td>
									</tr>
								@endforeach
								@endif
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
									<td id="sousTotal">{{ $total }} dh</td>
								</tr>
								@if(session('cart'))
								<tr id="livraison" class="total-data">
									@if($total>=500)
									<td colspan="2">
										<div class="alert alert-success">
											Livraison Gratuite
										</div>
									</td>
									@else
									<td><strong>Livraison: </strong></td>
									<td>50 dh</td>
									@endif
								</tr>
								@endif
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td id="total">
										@if($total==0)
										0
										@elseif($total>=500)
										{{ $total }}
										@else
										{{ $total+50 }}
										@endif
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
	@include('partiels.chat')

	@include('partiels.footer')

	@include('partiels.js_links')

	<script>
		document.getElementById('cart').classList.add('current-list-item');
	</script>

</body>
</html>