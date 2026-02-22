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
	<title>Paiement</title>

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
			@csrf
			
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
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						@if(!session('client'))
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
											@error('nom')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
										</p>
						        		<p><input name="nom" type="text" placeholder="Nom" required></p>
										<p>
											@error('prenom')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
										</p>
										<p><input name="prenom" type="text" placeholder="Prénom" required></p>
										<p>
											@error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
										</p>
						        		<p><input name="email" type="email" placeholder="Email" required></p>
										<p>
											@error('tel')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
										</p>
						        		<p><input name="tel" type="tel" placeholder="Tel" required></p>
						        </div>
						      </div>
						    </div>
						  </div>
						@endif
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
												@if(session('client'))
												@error('adresse')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            	@enderror
                                                <p><textarea name="adresse" class="w-100" id="bill" cols="30" rows="10" placeholder="Adresse">{{ session('client')->adresse }}</textarea></p>
												@else
												@error('adresse')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            	@enderror
                                                <p><textarea name="adresse" class="w-100" id="bill" cols="30" rows="10" placeholder="Adresse"></textarea></p>
												@endif
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
								@if(session('cart'))
								@foreach (session('cart') as $id => $produit)
								@php
            						$total += $produit['prix'] * $produit['quantite']; // Ajouter le prix total de chaque produit
        						@endphp
									<tr>
										<td>{{ $produit['description'] }}</td>
										<td>{{ $produit['prix'] * $produit['quantite'] }} dh</td>
									</tr>
								@endforeach
								@endif
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td><strong>Subtotal</strong></td>
									<td>{{ $total }} dh</td>
								</tr>
								@if(session('cart'))
								<tr>
									@if($total>=500)
									<td colspan="2">
										<div class="alert alert-success">
											Livraison Gratuite
										</div>
									</td>
									@else
									<td><strong>Livraison</strong></td>
									<td>50 dh</td>
									@endif
									
								</tr>
								@endif
								<tr>
									<td><strong>Total</strong></td>
									@if($total==0)
									<td>0 dh</td>
									@elseif($total>=500)
									<td>{{ $total }} dh</td>
									@else
									<td>{{ $total+50 }} dh</td>
									@endif
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
	@include('partiels.chat')

	@include('partiels.footer')

	@include('partiels.js_links')

	<script>
		document.getElementById('checkout').classList.add('current-list-item');
	</script>

</body>
</html>