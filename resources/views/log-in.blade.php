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
	<title>Authentification</title>

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
                @if (session('auth-failed'))
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-danger">{{ session('auth-failed') }}</div>
                </div>
                @endif
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
                @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('prenom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('sexe')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('tel')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('adresse')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('ville')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
                                            @csrf
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
                                        @csrf
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

	@include('partiels.footer')

	@include('partiels.js_links')

    <script>
        document.getElementById('log-in').classList.add('current-list-item');
    </script>

</body>
</html>